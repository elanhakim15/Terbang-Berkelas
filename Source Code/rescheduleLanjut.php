<?php

session_start();
$link = mysqli_connect("localhost", "root", "", "db_terbangberkelas");
if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM tb_user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

$_SESSION['kode_booking'] = $_POST['kode_booking'];
$sql_cekKodeBooking = "SELECT * from tb_booking WHERE kode_booking = '".$_SESSION['kode_booking']."'";
$hasilCek = mysqli_query($link, $sql_cekKodeBooking);
?>


<!DOCTYPE html>
<html>
<?php if(mysqli_num_rows($hasilCek) > 0): ?>
<head>
    <title>Reschedule</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style-rescheduleDanRating.css">
    <link rel="icon" href="images/Logo1.png" type="image/x-icon"size="46x46">
</head>
    <body>
        <header class="main">
            <nav>
                <a href="#" class="logo">
                    <img src="images/Logo2.png" alt="TerbangBerkelas" width="75%">
                </a>
                <ul class="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="booking.php?rekomen=0">Booking</a></li>
                    <li><a href="reschedule.php" class="aktif">Reschedule</a></li>
                    <li><a href="rating.php">Rating</a></li>
                    <li><a href="logout.php">Log Out dari <?php echo $_SESSION['namaUser']; ?>?</a></li>
                </ul>
            </nav>
        </header>
            <div id="form-int">
                <h2>Reschedule</h2>
                <?php
                $sql_ambilDataAsal = "SELECT asal_penerbangan FROM tb_booking WHERE kode_booking = '".$_SESSION["kode_booking"]."'";
                $hasilDataAsal = mysqli_query($link, $sql_ambilDataAsal);
                $valueDataAsal = mysqli_fetch_assoc($hasilDataAsal);
                $asal = $valueDataAsal['asal_penerbangan'];

                $sql_ambilDataTujuan = "SELECT tujuan_penerbangan FROM tb_booking WHERE kode_booking = '".$_SESSION["kode_booking"]."'";
                $hasilDataTujuan = mysqli_query($link, $sql_ambilDataTujuan);
                $valueDataTujuan = mysqli_fetch_assoc($hasilDataTujuan);
                $tujuan = $valueDataTujuan['tujuan_penerbangan'];

                $sql_ambilMaskapai = "SELECT maskapai FROM tb_booking WHERE kode_booking = '".$_SESSION["kode_booking"]."'";
                $hasilMaskapai = mysqli_query($link, $sql_ambilMaskapai);
                $valueMaskapai = mysqli_fetch_assoc($hasilMaskapai);
                $maskapai = $valueMaskapai['maskapai'];

                $sql_ambilJumlahPenumpang = "SELECT jumlah_penumpang FROM tb_booking WHERE kode_booking = '".$_SESSION["kode_booking"]."'";
                $hasilJumlahPenumpang = mysqli_query($link, $sql_ambilJumlahPenumpang);
                $valueJumlahPenumpang = mysqli_fetch_assoc($hasilJumlahPenumpang);
                $jumlahPenumpang = $valueJumlahPenumpang['jumlah_penumpang'];

                $sql_ambilKelas = "SELECT kelas FROM tb_booking WHERE kode_booking = '".$_SESSION["kode_booking"]."'";
                $hasilKelas = mysqli_query($link, $sql_ambilKelas);
                $valueKelas = mysqli_fetch_assoc($hasilKelas);
                $kelas = $valueKelas['kelas'];

                $sql_ambilDataTanggal = "SELECT tgl_keberangkatan FROM tb_booking WHERE kode_booking = '".$_SESSION["kode_booking"]."'";
                $hasilDataTanggal = mysqli_query($link, $sql_ambilDataTanggal);
                $valueDataTanggal = mysqli_fetch_assoc($hasilDataTanggal);
                $tanggal = $valueDataTanggal['tgl_keberangkatan'];

                $sql_ambilWaktu = "SELECT wkt_keberangkatan FROM tb_booking WHERE kode_booking = '".$_SESSION["kode_booking"]."'";
                $hasilWaktu = mysqli_query($link, $sql_ambilWaktu);
                $valueWaktu = mysqli_fetch_assoc($hasilWaktu);
                $waktu = $valueWaktu['wkt_keberangkatan'];

                echo ("<p style='color: white;'>DATA ANDA SEBAGAI BERIKUT</p>");   
                echo ("<p style='color: white;'>Kode Booking: " . $_SESSION["kode_booking"] . "</p>");
                echo ("<p style='color: white;'>Asal Penerbangan: " . $asal . "</p>");
                echo ("<p style='color: white;'>Tujuan Penerbangan: " . $tujuan . "</p>");
                echo ("<p style='color: white;'>Maskapai: " . $maskapai . "</p>");
                echo ("<p style='color: white;'>Jumlah Penumpang: " . $jumlahPenumpang . "</p>");
                echo ("<p style='color: white;'>Kelas: " . $kelas . "</p>");
                echo ("<p style='color: white;'>Tanggal Keberangkatan: " . $tanggal . "</p>");
                
                ?>
                <form method="post" action="process-reschedule.php">
                    <div class="info">
                        
                        <?php
                        $_SESSION['tanggal_hari_ini'] = date('Y-m-d');
                        $_SESSION['selisih_hari'] = round((strtotime($tanggal) - strtotime($_SESSION['tanggal_hari_ini'])) / (60 * 60 * 24));
                        ?>

                        <?php if ($_SESSION['selisih_hari'] <= 3): ?>
                            <h3>Maaf, reschedule tidak dapat digunakan karena sudah H-3 atau melewati H-3 keberangkatan</h3>

                        <?php else: ?>                            
                        <label for="Tanggal Keberangkatan">Reschedule Tanggal Keberangkatan</label>
                        <input type="date" id="tanggalKeberangkatan" name="tanggalKeberangkatan" min="<?php echo date('Y-m-d', strtotime($tanggal . ' +1 day'));?>" required>

                    </div>

                        <button>Reschedule</button>

                        <?php endif; ?>
                </form>
            </div>
            
    </body>
</html>
<?php else: header('Location: rescheduleGagal.php') ?>
<?php endif; ?>