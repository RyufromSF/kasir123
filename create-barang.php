<?php

require "koneksi.php";

$nama = $_POST["nama"];
$kategori = $_POST["kategori"];
$stok = $_POST["stok"];
$harga = $_POST["harga"];

$sql = "INSERT INTO barang (nama, kategori, stok, harga) VALUES ('$nama', '$kategori', '$stok', '$harga')";
mysqli_query($koneksi, $sql);

if (mysqli_error($koneksi)) {
    echo mysqli_error($koneksi);
} else {
    header("location: barang.php");
}