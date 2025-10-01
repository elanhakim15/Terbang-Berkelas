<?php

session_start();

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $_SESSION['emailSekarang'] = $_POST["email"];
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM tb_user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style-loginregis.css">
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
                    <li><a href="login.php">Booking</a></li>
                    <li><a href="login.php">Reschedule</a></li>
                    <li><a href="login.php">Rating</a></li>
                    <li><a href="Login.php" class="aktif">Login</a></li>
                </ul>
            </nav>
        </header>
    
            <?php if ($is_invalid): ?>
                <em>Invalid login</em>
            <?php endif; ?>

            <div id="form-int">
                <h2>Login</h2>
                
                <form method="post">
                    <div id="first-info" class="info">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"
                            value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                    </div>
                    
                    <div id="last-info" class="info">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                    </div>
        
                    <button>Log in</button>
                </form>
                <p>If you don't have any account yet, register <a href="signup.php">Here!</a></p>
            </div>
    </body>
</html>








