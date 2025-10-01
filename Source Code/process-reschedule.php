<?php

session_start();

$link = mysqli_connect("localhost", "root", "", "db_terbangberkelas");
$tanggalKeberangkatan = $_POST['tanggalKeberangkatan'];
$sqlUpdateTanggal = "UPDATE tb_booking SET tgl_keberangkatan ='".$tanggalKeberangkatan."' WHERE kode_booking = '".$_SESSION["kode_booking"]."'";
mysqli_query($link, $sqlUpdateTanggal);
echo $tanggalKeberangkatan;

header('Location: reschedule-success.php');