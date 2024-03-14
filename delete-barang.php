<?php

require "koneksi.php";

session_start();

if ($_SESSION["level"] != "admin" && $_SESSION["level"] != "logistik") {
    // jika di sesi ini levelnya bukan admin atau bukan logistik, akses ditolak
    echo "Anda tidak dapat menghapus barang";
    exit;
}

$id = $_POST["id"];

$sql = "DELETE FROM barang WHERE id = '$id'";
mysqli_query($koneksi, $sql);

if (mysqli_error($koneksi)) {
    echo mysqli_error($koneksi);
} else {
    header("location: barang.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url('img/paper-blue.png');
            background-repeat: no-repeat;
            background-size: cover;
            font-size: 0px;
        }
    </style>
</head>
<body>
    <h1>tidak bisa</h1>
</body>
</html>