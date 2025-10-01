<?php
session_start();
include('signup.php');
//Keluar jika nama belum diinput user jika kosong (empty)
if (empty($_POST["name"])) {
    echo "<p style='color: red; text-align: center;'>Name is required</p>";
}

//Keluar jika password belum diinput user jika kosong (empty)
else if (empty($_POST["password"])) {
    echo "<p style='color: red; text-align: center;'>Password must not empty</p>";
}

//Agar user memasukkan email yang valid
else if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    echo "<p style='color: red; text-align: center;'>Email is required</p>";
}
 
//Password hash digunakan agar password dapat tersimpan dengan aman
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO tb_user (name, email, password_hash)
        VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["name"],
                  $_POST["email"],
                  $password_hash);
                  
if ($stmt->execute()) {

    header("Location: signup-success.php");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        echo "<p style='color: red; text-align: center;'>or email already taken</p>";
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
?>







