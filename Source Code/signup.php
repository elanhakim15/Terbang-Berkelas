<!DOCTYPE html>
<html>
  <head>
    <title>Registrasi</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="css/style-loginregis.css" />
    <link rel="icon" href="images/Logo1.png" type="image/x-icon"size="46x46">
  </head>
  <body>

    <header class="main">
      <nav>
        <a href="#" class="logo">
          <img src="images/Logo2.png" alt="TerbangBerkelas" width="75%" />
        </a>

        <ul class="menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="login.php">Booking</a></li>
          <li><a href="login.php">Reschedule & Refund</a></li>
          <li><a href="login.php">Rating</a></li>
          <li><a href="login.php" class="aktif">Login</a></li>
        </ul>
      </nav>
    </header>
    
    <div id="form-int">
      <h2>Sign Up</h2>
      <form action="process-signup.php" method="post" id="signup">
        <div id="first-info" class="info">
          <label for="name">Username</label>
          <input type="text" id="name" name="name" required>
        </div>

        <div class="info">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>

        <div class="info">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Registrasi</button>
      </form>
    </div>
  </body>
</html>
