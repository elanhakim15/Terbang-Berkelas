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
<html>
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

                <form method="post" action="rescheduleLanjut.php">
                    
                    <div id="first-info" class="info">
                        <label for="kode_booking">Kode Booking</label>
                        <input type="text" name="kode_booking" id="kode_booking">
                    </div>
        
                    <button>Reschedule</button>
                </form>
            </div>
    </body>
</html>








