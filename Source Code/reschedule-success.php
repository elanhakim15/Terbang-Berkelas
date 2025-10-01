<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM tb_user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-rescheduleDanRating.css">
    <link rel="icon" href="images/Logo1.png" type="image/x-icon"size="46x46">
    <title>Berhasil Reschedule</title>
</head>

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

<body>

    <div id="form-berhasil">
        <h2>SELAMAT</h2>
        <p>Reschedule penerbangan anda berhasil dilakukan</p>

        <?php
        $link = mysqli_connect("localhost", "root", "", "db_terbangberkelas");

        $sql_ambilDataBooking = "SELECT kode_booking FROM tb_booking WHERE kode_booking = '".$_SESSION["kode_booking"]."'";
        $hasilDataBooking = mysqli_query($link, $sql_ambilDataBooking);
        $valueDataBooking = mysqli_fetch_assoc($hasilDataBooking);
        $kode = $valueDataBooking['kode_booking'];

        $sql_ambilDataTanggal = "SELECT tgl_keberangkatan FROM tb_booking WHERE kode_booking = '".$_SESSION["kode_booking"]."'";
        $hasilDataTanggal = mysqli_query($link, $sql_ambilDataTanggal);
        $valueDataTanggal = mysqli_fetch_assoc($hasilDataTanggal);
        $tanggal = $valueDataTanggal['tgl_keberangkatan'];

        $sql_ambilWaktu = "SELECT wkt_keberangkatan FROM tb_booking WHERE kode_booking = '".$_SESSION["kode_booking"]."'";
        $hasilWaktu = mysqli_query($link, $sql_ambilWaktu);
        $valueWaktu = mysqli_fetch_assoc($hasilWaktu);
        $waktu = $valueWaktu['wkt_keberangkatan'];

        ?>

        <p>KODE BOOKING ANDA: <?php echo $kode; ?></p>
        <p>Reschedule penerbangan sebagai berikut:</p>
        <p>Tanggal Penerbangan yang telah diubah <?php echo $tanggal; ?></p>
        <p>Waktu Penerbangan anda pada pukul <?php echo $waktu; ?> WIB</p>
    </div>
    
</body>
</html>