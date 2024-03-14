<?php

require "koneksi.php";

$id = $_POST["id"];
$nama = $_POST["nama"];
$kategori = $_POST["kategori"];
$stok = $_POST["stok"];
$harga = $_POST["harga"];

$sql = "UPDATE barang SET nama = '$nama', kategori = '$kategori', stok = '$stok', harga = '$harga' WHERE id = '$id'";
mysqli_query($koneksi, $sql);

if (mysqli_error($koneksi)) {
    echo mysqli_error($koneksi);
} else {
    header("location: barang.php");
}