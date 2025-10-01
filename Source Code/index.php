<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM tb_user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
} else {
    header("Location: login.php");
}

$link = mysqli_connect("localhost", "root", "", "db_terbangBerkelas");
$sql_ambilNama = "SELECT name FROM tb_user WHERE email = '".$_SESSION['emailSekarang']."';";
$hasilNama = mysqli_query($link, $sql_ambilNama);
$kolomNama= mysqli_fetch_assoc($hasilNama);
$_SESSION['namaUser'] = $kolomNama['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/Logo1.png" type="image/x-icon"size="46x46">
    <title>Terbang Berkelas</title>
    <link rel="stylesheet" href="css/style-main.css">
</head>

<body>
    <header class="main">
        <nav>
            <a href="#" class="logo">
                <img src="images/Logo2.png" alt="TerbangBerkelas" width="75%">
            </a>

            <ul class="menu">
                <li><a href="#" class="aktif">Home</a></li>
                
                <?php if (isset($user)): ?>
                <li><a href="booking.php?rekomen=0">Booking</a></li>
                <li><a href="reschedule.php">Reschedule</a></li>
                <li><a href="rating.php">Rating</a></li>
                <li><a href="logout.php">Log Out dari <?php echo $_SESSION['namaUser']; ?>?</a></li>
        
                <?php else: ?>
                <li><a href="login.php">Booking</a></li>
                <li><a href="login.php">Reschedule & Refund</a></li>
                <li><a href="login.php">Rating</a></li>
                <li><a href="login.php">Login</a></li>
        
                <?php endif; ?>
            </ul>
        </nav>

        <div class="main-heading">
            <h1>Anti Ribet dengan Terbang Berkelas</h1>
            <p><strong>Halo <?php echo $_SESSION['namaUser']; ?>, selamat datang!</strong><br>Mau kenalan sama developer Terbang Berkelas yang ganteng-ganteng? klik tombol di bawah ini</p>
            <a class="main-btn" href="https://www.instagram.com/elanhakim/" target="_blank">Contact</a>
        </div>
    </header>

    <section class="fitur">

        <div class="rekomendasi">
        <?php if (isset($user)): ?>
        <div class="slides">
                <div class="slide">
                    <a href="booking.php?rekomen=1"><img src="images/jakarta.png" alt="Seoul"></a>
                </div>
                <div class="slide">
                    <a href="booking.php?rekomen=2"><img src="images/bali.png" alt="Paris"></a>
                </div>
                <div class="slide">
                    <a href="booking.php?rekomen=3"><img src="images/jogja.png" alt="New York"></a>
                </div>
                <div class="navigation">
                    <a class = "prev" onclick = "plusSlides(-1)">&#10094;</a>
                    <a class = "next" onclick = "plusSlides(-1)">&#10095;</a>
                </div>
            </div>
        
        <?php else: ?>
            <div class="slides">
                <div class="slide">
                    <a href="login.php"><img src="images/jakarta.png" alt="Seoul"></a>
                </div>
                <div class="slide">
                    <a href="login.php"><img src="images/bali.png" alt="Paris"></a>
                </div>
                <div class="slide">
                    <a href="login.php"><img src="images/jogja.png" alt="New York"></a>
                </div>
                <div class="navigation">
                    <a class = "prev" onclick = "plusSlides(-1)">&#10094;</a>
                    <a class = "next" onclick = "plusSlides(-1)">&#10095;</a>
                </div>
            </div>
        
        <?php endif; ?>

            <script>
                var slideIndex = 1;
                showSlides(slideIndex);

                function plusSlides(n) {
                    showSlides(slideIndex += n);
                }

                function showSlides(n) {
                    var i;
                    var slides = document.getElementsByClassName("slide");
                    if (n > slides.length)
                    {
                    slideIndex = 1;
                    }
                    if (n < 1)
                    {
                    slideIndex = slides.length
                    }
                    for (i = 0; i < slides.length; i++)
                    {
                    slides[i].style.display = "none";
                    }
                    slides[slideIndex-1].style.display = "block";
                }
            </script>
        </div>

        <div class="rating" onclick="location.href='rating.php'" style="cursor:pointer;">
            <div class="container-rating">
                <div class="logo-rating">
                    <img src="images/star.png" alt="star">
                </div>
                <div class="teks-rating">
                    <h1>Bagaimana Penerbangan Anda?</h1>
                    <p>Bagaimana pengalaman anda selama penerbangan? Beri kami penilaian di sini.</p>
                </div>
            </div>
        </div>
    </section>
    <footer id="contact">
        <div class="container-footer">
            <div class="biodata">
                <a href="https://www.instagram.com/elanhakim/">
                    <img src="images/elan.jpg" alt="Elan">
                </a>
                <a href="https://www.instagram.com/elanhakim/">
                    <h1>Elan Abdul Hakim</h1>
                </a>
            </div>

            <div class="biodata">
                <a href="https://www.instagram.com/affaruqq/">
                    <img src="images/faruq.jpg" alt="Faruq">
                </a>
                <a href="https://www.instagram.com/affaruqq/">
                    <h1>Abdullah Farauk</h1>
                </a>
            </div>

            <div class="biodata">
                <a href="https://www.instagram.com/k.wimbassa/">
                    <img src="images/kiki.jpeg" alt="Kiki">
                </a>
                <a href="https://www.instagram.com/k.wimbassa/">
                    <h1>Muhamad Dwirizqy Wimbassa</h1>
                </a>
            </div>
        </div>
    </footer>
</body>
</html>