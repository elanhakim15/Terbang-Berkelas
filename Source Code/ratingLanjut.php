<?php

    session_start();
    $conn = mysqli_connect("localhost", "root", "", "db_terbangBerkelas");
    $_SESSION['kodeBuk'] = $_POST['kode_booking'];
    $sql_cekKodeBooking = "SELECT * from tb_booking WHERE kode_booking = '".$_SESSION['kodeBuk']."'";
    $hasilCek = mysqli_query($conn, $sql_cekKodeBooking);
?>


<!DOCTYPE html>
<html lang="en">
<?php if(mysqli_num_rows($hasilCek) > 0): ?>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/Logo1.png" type="image/x-icon" size="46x46" />
    <title>Terbang Berkelas</title>
    <link rel="stylesheet" href="css/style-ratingLanjut.css" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>

  <body>
    <header>
      <nav>
        <a href="#" class="logo">
          <img src="images/Logo2.png" alt="TerbangBerkelas" width="75%" />
        </a>

        <ul class="menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="booking.php?rekomen=0">Booking</a></li>
          <li><a href="reschedule.php">Reschedule</a></li>
          <li><a href="rating.php" class="aktif">Rating</a></li>
          <li><a href="logout.php">Log Out dari <?php echo $_SESSION['namaUser']; ?>?</a></li>
        </ul>
      </nav>
    </header>

    <section class="fitur">
      <?php
      $sql_ambilDataTanggal = "SELECT tgl_keberangkatan FROM tb_booking WHERE kode_booking = '".$_SESSION["kodeBuk"]."'";
      $hasilDataTanggal = mysqli_query($conn, $sql_ambilDataTanggal);
      $valueDataTanggal = mysqli_fetch_assoc($hasilDataTanggal);
      $tanggal = $valueDataTanggal['tgl_keberangkatan'];
      $selisih_hari = round((strtotime($tanggal) - time()) / (60 * 60 * 24));
      ?>
      <div class="container">
        <?php if ($selisih_hari < 1 ): ?>
        <form method="post" action="rating-success.php">
          <div class="star">
            <div><h1>Rating</h1></div>
            <div class="star-widget">
              <input type="radio" name="rate" id="rate-1" value="5" />
              <label for="rate-1" class="fas fa-star"></label>
              <input type="radio" name="rate" id="rate-2" value="4" />
              <label for="rate-2" class="fas fa-star"></label>
              <input type="radio" name="rate" id="rate-3" value="3" />
              <label for="rate-3" class="fas fa-star"></label>
              <input type="radio" name="rate" id="rate-4" value="2" />
              <label for="rate-4" class="fas fa-star"></label>
              <input type="radio" name="rate" id="rate-5" value="1" />
              <label for="rate-5" class="fas fa-star"></label>
            </div>
          </div>

          <div class="comments">
            <h1>Beri Tahu Kami Lebih Banyak</h1>
            <textarea
              name="comments"
              id="comments"
              cols="50"
              rows="10"
            ></textarea>
          </div>

          <div class="bt-submit">
            <button type="submit" name="submit">Kirim</button>
          </div>
        </form>
      </div>
    </section>
        <footer id="contact">
          <div class="container-footer">
            <div class="biodata">
              <a href="https://www.instagram.com/elanhakim/">
                <img src="images/elan.jpg" alt="Elan" />
              </a>
              <a href="https://www.instagram.com/elanhakim/">
                <h1>Elan Abdul Hakim</h1>
              </a>
            </div>

            <div class="biodata">
              <a href="https://www.instagram.com/affaruqq/">
                <img src="images/faruq.jpg" alt="Faruq" />
              </a>
              <a href="https://www.instagram.com/affaruqq/">
                <h1>Abdullah Farauk</h1>
              </a>
            </div>

            <div class="biodata">
              <a href="https://www.instagram.com/k.wimbassa/">
                <img src="images/kiki.jpeg" alt="Kiki" />
              </a>
              <a href="https://www.instagram.com/k.wimbassa/">
                <h1>Muhamad Dwirizqy Wimbassa</h1>
              </a>
            </div>
          </div>
        </footer>

        <?php else: ?>
        <h1>
          Rating hanya dapat dilakukan setelah penerbangan,
          <a href="booking.php">Ayo terbang berkelas!</a>
        </h1>

        <?php endif; ?>
      
  </body>
</html>
<?php else: header('Location: ratingGagal.php') ?>
<?php endif; ?>