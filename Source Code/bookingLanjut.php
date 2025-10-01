<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM tb_user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

$_SESSION['asal']= $_POST['darix'];
$_SESSION['tujuan'] = $_POST['kex'];
$_SESSION['tanggalKeberangkatan'] = $_POST['tanggalKeberangkatanx'];
$_SESSION['jumlahPenumpang'] = $_POST['inputjumlahx'];
$_SESSION['kelas'] = $_POST['kelasx'];
$_SESSION['listMaskapai'] = array('Lion Air', 'Sriwijaya Air', 'Kikiw Air', 'Garuda Indonesia', 'Citilink', 'Rukiko', 'Lanlink');
$_SESSION['waktuKeberangkatan'] = sprintf('%02d:%02d', rand(6, 23), rand(0, 5) * 10);
switch ($_SESSION['kelas']) {
    case "Ekonomi":
        $_SESSION['harga'] = rand(400,1500) * 1000;
        break;
    case "Premium Ekonomi":
        $_SESSION['harga'] = rand(1000, 2500) * 1000;
        break;
    case "Bisnis":
        $_SESSION['harga'] = rand(1500, 4000) * 1000;
        break;
    case "First":
        $_SESSION['harga'] = rand(4000, 10000) *1000;
        break;
    default: $_SESSION['harga'] = rand(400,1500) * 1000;
}
$_SESSION['pilihMaskapai'] = rand(0, count($_SESSION['listMaskapai']) - 1);
$_SESSION['maskapai'] = $_SESSION['listMaskapai'][$_SESSION['pilihMaskapai']];
$_SESSION['formatHarga'] = number_format($_SESSION['harga'], "0", ",", ".");
$_SESSION['totalHargadb'] = $_SESSION['jumlahPenumpang'] * $_SESSION['harga'];
$_SESSION['totalHarga'] = number_format($_SESSION['totalHargadb'],"0", ",", ".");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/Logo1.png" type="image/x-icon"size="46x46">
    <title>Booking</title>
    <link rel="stylesheet" href="css/style-bookingLanjut.css">
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
    <form method="post" action="akhirBooking.php">
        <div class="kotak">
            <div id="pemesan">
                <h2>Data Pemesan</h2>
                <p>Isi sesuai dengan identitas pemesan tiket.</p>
                <input type="text" id="" name="namaPemesan" class="inputPemesan" placeholder="Nama Lengkap"  required><br>
                <input type="text" id="" name="emailPemesan" class="inputPemesan" placeholder="Alamat Email"  required><br>
                <input type="tel" id="" name="noPemesan" class="inputPemesan" placeholder="Nomor Telepon. Format (08xxxxxxxxxx)" required>
            </div>
            <div id="penerbangan">
                <h2>Penerbangan</h2>
                <?php
                echo '<h3>'.$_SESSION['asal'].' 🡺 '.$_SESSION['tujuan'].'</h3>';
                echo '<p id="namaMaskapai">'.$_SESSION['maskapai'].' ✈︎</p>';
                echo '<label for="Detail Keberangkatan">'.$_SESSION['tanggalKeberangkatan'].' • '.$_SESSION['waktuKeberangkatan'].' • '.$_SESSION['kelas'].'</label>';
                ?>
                <h3>Kebijakan Tiket</h3>
                <p>☑ Bisa Reschedule<br></p>
                <hr>
                <div id="totalPembayaran">
                    <div id="kiriPembayaran">
                        <h3>Total Pembayaran</h3>
                    </div>
                    <div>
                        <?php
                        echo '<p class="kecil">'.$_SESSION['jumlahPenumpang'].' Tiket X IDR '.$_SESSION['formatHarga'].'</p>';
                        echo '<p id="hargatotal">IDR '.$_SESSION['totalHarga'].'</p>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="penumpang">
            <h2>Data Penumpang</h2>
            <?php
            for ($i=1; $i <= $_SESSION['jumlahPenumpang']; $i++) { 
                echo '<div>';
                echo    '<h4>Penumpang '.$i.'</h4>';
                echo    '<input type="text" id="" name="nikPenumpang'.$i.'" class="" placeholder="NIK"  required><br>';
                echo    '<input type="text" id="" class="kelang" name="namaPenumpang'.$i.'" class="" placeholder="Nama Lengkap"  required><br>';
                echo '</div>';
            }
            ?>
        </div>
        <div id="tombols">
            <button id="mundur" class="tombolBawah" name="" onclick="location.href='booking.php';">Kembali</button></a>
            <button class="tombolBawah" name="" type="submit">Dapatkan Kode Booking!</button>
        </div>
    </form>
</body>
</html>