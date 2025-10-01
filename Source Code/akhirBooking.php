<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM tb_user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
$_SESSION['namaPemesan'] = $_POST['namaPemesan'];
$_SESSION['emailPemesan'] = $_POST['emailPemesan'];
$_SESSION['noPemesan'] = $_POST['noPemesan'];
$_SESSION['kodeBooking']= substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/Logo1.png" type="image/x-icon"size="46x46">
    <title>Booking</title>
    <link rel="stylesheet" href="css/style-akhirBooking.css">
</head>

<body>
    <header class="main">
        <nav>
            <a href="#" class="logo">
                <img src="images/Logo2.png" alt="TerbangBerkelas" width="75%">
            </a>

            <ul class="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="booking.php?rekomen=0" class="aktif">Booking</a></li>
                <li><a href="reschedule.php">Reschedule</a></li>
                <li><a href="rating.php">Rating</a></li>
                <li><a href="logout.php">Log Out dari <?php echo $_SESSION['namaUser']; ?>?</a></li>
            </ul>
        </nav>
    </header>
    <form method="post" action="index.php">
        <div class="kotak">
            <h1 id="terimaKasih">Terima Kasih telah Memesan!</h1>
            <h2 id="berikut">Berikut merupakan kode booking anda: <?php echo $_SESSION['kodeBooking']; ?></h2>
            <?php

            $link = mysqli_connect("localhost", "root", "", "db_terbangberkelas");

            $sql_ambilId = "SELECT id FROM tb_user WHERE email = '".$_SESSION['emailSekarang']."';";
            $hasilId = mysqli_query($link, $sql_ambilId);
            $kolomId = mysqli_fetch_assoc($hasilId);
            $id = $kolomId['id'];

            $sql_pesanan = "INSERT INTO `tb_pesanan`(`id_pesanan`, `nama_pemesan`, `email_pemesan`, `tlp_pemesan`, `jumlah_penumpang`, `id`)
                        VALUES ('','".$_SESSION['namaPemesan']."','".$_SESSION['emailPemesan']."','".$_SESSION['noPemesan']."','".$_SESSION['jumlahPenumpang']."', '".$id."')";

            mysqli_query($link, $sql_pesanan);

            $sql_ambilIdPesanan = "SELECT MAX(id_pesanan) FROM tb_pesanan;";
            $hasilIdPesanan = mysqli_query($link, $sql_ambilIdPesanan);
            $kolomIdPesanan = mysqli_fetch_assoc($hasilIdPesanan);
            $id_pesanan = $kolomIdPesanan['MAX(id_pesanan)'];

            for ($i=1; $i <= $_SESSION['jumlahPenumpang']; $i++) {
                $_SESSION['nikPenumpang'.$i] = $_POST['nikPenumpang'.$i];
                $_SESSION['namaPenumpang'.$i] = $_POST['namaPenumpang'.$i];
                $sql_penumpang = "INSERT INTO `tb_penumpang`(`id_pesanan`, `nik_penumpang`, `nama_penumpang`)
                                    VALUES ('".$id_pesanan."','".$_SESSION['nikPenumpang'.$i]."','".$_SESSION['namaPenumpang'.$i]."');";
                
                mysqli_query($link, $sql_penumpang);
            }

            $sql_booking = "INSERT INTO `tb_booking`(`kode_booking`, `asal_penerbangan`, `tujuan_penerbangan`,
                        `maskapai`, `jumlah_penumpang`, `kelas`, `tgl_keberangkatan`, `wkt_keberangkatan`,
                        `harga_tiket`, `total_harga`, `id_pesanan`)
                        VALUES ('".$_SESSION['kodeBooking']."','".$_SESSION['asal']."','".$_SESSION['tujuan']."',
                        '".$_SESSION['maskapai']."','".$_SESSION['jumlahPenumpang']."','".$_SESSION['kelas']."',
                        '".$_SESSION['tanggalKeberangkatan']."','".$_SESSION['waktuKeberangkatan']."','".$_SESSION['harga']."','".$_SESSION['totalHargadb']."','".$id_pesanan."')";
        
            mysqli_query($link, $sql_booking);
            ?>
            <div id="tombolSelesai">
                <button id="kembali" type="submit">Selesaikan pesanan!</button>    
            </div>
        </div>
    </form>
    
</body>
</html>