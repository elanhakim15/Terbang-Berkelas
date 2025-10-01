<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM tb_user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

$rekomen = $_GET['rekomen'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/Logo1.png" type="image/x-icon"size="46x46">
    <title>Booking</title>
    <link rel="stylesheet" href="css/style-booking.css">
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
    <div class="kotak">
        <h2 id="booking">Booking? Yuk isi dulu!</h1>
        <form method="post" action="bookingLanjut.php">
            <div class="bersebelahan">
                <label id="slebewdari" for="Dari">Dari</label>
                <?php
                switch ($rekomen) {
                    case '1': ?>
                <select id="dari" name="darix">
                    <option value="Jakarta (CGK)">Jakarta (JKTC)</option>
                    <option value="Medan (KNO)">Medan (KNO)</option>
                    <option value="Makassar (UPG)">Makassar (UPG)</option>
                    <option value="Yogyakarta (JOG)">Yogyakarta (JOG)</option>
                    <option value="Denpasar Bali (KNO)">Denpasar Bali (DPS)</option>
                    <option value="Padang (PDG)">Padang (PDG)</option>
                    <option value="Bengkulu (BKS)">Bengkulu (BKS)</option>
                    <option value="Palembang (PLM)" selected>Palembang (PLM)</option>
                </select>
                <label for="Ke">Ke</label>
                <select id="Ke" name="kex">
                    <option value="Jakarta (CGK)" selected>Jakarta (JKTC)</option>
                    <option value="Medan (KNO)">Medan (KNO)</option>
                    <option value="Makassar (UPG)">Makassar (UPG)</option>
                    <option value="Yogyakarta (JOG)">Yogyakarta (JOG)</option>
                    <option value="Denpasar Bali (KNO)">Denpasar Bali (DPS)</option>
                    <option value="Padang (PDG)">Padang (PDG)</option>
                    <option value="Bengkulu (BKS)">Bengkulu (BKS)</option>
                    <option value="Palembang (PLM)">Palembang (PLM)</option>
                </select>
                <?php break;
                    case '2':
                ?>
                <select id="dari" name="darix">
                    <option value="Jakarta (CGK)">Jakarta (JKTC)</option>
                    <option value="Medan (KNO)">Medan (KNO)</option>
                    <option value="Makassar (UPG)">Makassar (UPG)</option>
                    <option value="Yogyakarta (JOG)">Yogyakarta (JOG)</option>
                    <option value="Denpasar Bali (KNO)">Denpasar Bali (DPS)</option>
                    <option value="Padang (PDG)">Padang (PDG)</option>
                    <option value="Bengkulu (BKS)">Bengkulu (BKS)</option>
                    <option value="Palembang (PLM)" selected>Palembang (PLM)</option>
                </select>
                <label for="Ke">Ke</label>
                <select id="Ke" name="kex">
                    <option value="Jakarta (CGK)">Jakarta (JKTC)</option>
                    <option value="Medan (KNO)">Medan (KNO)</option>
                    <option value="Makassar (UPG)">Makassar (UPG)</option>
                    <option value="Yogyakarta (JOG)">Yogyakarta (JOG)</option>
                    <option value="Denpasar Bali (KNO)" selected>Denpasar Bali (DPS)</option>
                    <option value="Padang (PDG)">Padang (PDG)</option>
                    <option value="Bengkulu (BKS)">Bengkulu (BKS)</option>
                    <option value="Palembang (PLM)">Palembang (PLM)</option>
                </select>
                <?php break;
                    case '3':
                ?>
                <select id="dari" name="darix">
                    <option value="Jakarta (CGK)">Jakarta (JKTC)</option>
                    <option value="Medan (KNO)">Medan (KNO)</option>
                    <option value="Makassar (UPG)">Makassar (UPG)</option>
                    <option value="Yogyakarta (JOG)">Yogyakarta (JOG)</option>
                    <option value="Denpasar Bali (KNO)">Denpasar Bali (DPS)</option>
                    <option value="Padang (PDG)">Padang (PDG)</option>
                    <option value="Bengkulu (BKS)">Bengkulu (BKS)</option>
                    <option value="Palembang (PLM)" selected>Palembang (PLM)</option>
                </select>
                <label for="Ke">Ke</label>
                <select id="Ke" name="kex">
                    <option value="Jakarta (CGK)">Jakarta (JKTC)</option>
                    <option value="Medan (KNO)">Medan (KNO)</option>
                    <option value="Makassar (UPG)">Makassar (UPG)</option>
                    <option value="Yogyakarta (JOG)" selected>Yogyakarta (JOG)</option>
                    <option value="Denpasar Bali (KNO)">Denpasar Bali (DPS)</option>
                    <option value="Padang (PDG)">Padang (PDG)</option>
                    <option value="Bengkulu (BKS)">Bengkulu (BKS)</option>
                    <option value="Palembang (PLM)">Palembang (PLM)</option>
                </select>
                <?php break;
                    default:
                ?>
                <select id="dari" name="darix">
                    <option value="Jakarta (CGK)">Jakarta (JKTC)</option>
                    <option value="Medan (KNO)">Medan (KNO)</option>
                    <option value="Makassar (UPG)">Makassar (UPG)</option>
                    <option value="Yogyakarta (JOG)">Yogyakarta (JOG)</option>
                    <option value="Denpasar Bali (KNO)">Denpasar Bali (DPS)</option>
                    <option value="Padang (PDG)">Padang (PDG)</option>
                    <option value="Bengkulu (BKS)">Bengkulu (BKS)</option>
                    <option value="Palembang (PLM)" selected>Palembang (PLM)</option>
                </select>
                <label for="Ke">Ke</label>
                <select id="Ke" name="kex">
                    <option value="Jakarta (CGK)">Jakarta (JKTC)</option>
                    <option value="Medan (KNO)">Medan (KNO)</option>
                    <option value="Makassar (UPG)">Makassar (UPG)</option>
                    <option value="Yogyakarta (JOG)">Yogyakarta (JOG)</option>
                    <option value="Denpasar Bali (KNO)">Denpasar Bali (DPS)</option>
                    <option value="Padang (PDG)">Padang (PDG)</option>
                    <option value="Bengkulu (BKS)" selected>Bengkulu (BKS)</option>
                    <option value="Palembang (PLM)">Palembang (PLM)</option>
                </select>
                <?php break;
                }
                ?>
            </div>
            <div id="TanggalKeberangkatan">
                <label for="Tanggal Keberangkatan">Tanggal Keberangkatan</label>
                <input type="date" id="tanggalKeberangkatan" name="tanggalKeberangkatanx" min="<?php echo date('Y-m-d', strtotime('+1 day')) ; ?>" required>
            </div>
            <div class="bersebelahan" id="jumlahdankelas">
                <label for="Jumlah Tiket">Jumlah Tiket</label>
                <input id="inputjumlah" name="inputjumlahx" type="number" min="1" max="8" value="1" required>
                <label id="kelaskabin" for="Kelas Kabin">Kelas</label>
                <select id="kelas" name="kelasx">
                    <option value="Ekonomi" selected>Ekonomi</option>
                    <option value="Premium Ekonomi">Premium Ekonomi</option>
                    <option value="Bisnis">Bisnis</option>
                    <option value="First">First</option>
                </select>
            </div>
            <button type="submit" id="cariPenerbangan">Cari Penerbangan!</button>
        </form>
    </div>
</body>

</html>