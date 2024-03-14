<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('img/login.png');
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

    </style>
</head>
<body>
<?php

require "koneksi.php";

$username = $_POST["username"]; 
$password = $_POST["password"];

$sql = "SELECT * FROM user WHERE username = '$username'";
$query = mysqli_query($koneksi, $sql);
$jumlah_user = mysqli_num_rows($query);

if ($jumlah_user == 1) {
    $user = mysqli_fetch_array($query);
    $password_benar = password_verify($password, $user["password"]);

    if ($password_benar) {
        session_start();

        $_SESSION["id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["level"] = $user["level"];

        header("location: home.php");
    } else {
        echo "Username atau password tidak valid. <a href='login.php'>Kembali ke halaman login</a>";
    }
} else {
    echo "Username tidak ditemukan. <a href='login.php'>Kembali ke halaman login</a>";
}
?>
<br>
<h1><link rel="stylesheet" href=""></h1>

        </table>
    </form>
</body>
</html>