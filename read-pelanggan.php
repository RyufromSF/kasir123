<!DOCTYPE html>
<html lang="en">
<head>
    <title>Read Pelanggan</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background: url('img/paper-blue.png');
    background-size: 100%;
}

div {
    max-width: 800px;
    margin: 20px auto;
}

h1 {
    text-align: center;
}

button {
    padding: 8px 16px;
    cursor: pointer;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: white;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f5f5f5;
}

form {
    display: inline-block;
    margin: 0;
}

    </style>
</head>
<body>
    <?php include "menu.php"; ?>

    <?php

    require "koneksi.php";

    $id = $_GET["id"];

    $sql = "SELECT * FROM pelanggan WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);

    $pelanggan = mysqli_fetch_array($query);
    ?>

    <div>
        <form action="update-pelanggan.php" method="POST">
        <h1>Lihat Pelanggan</h1>
        <input type="hidden" name="id" value="<?= $id ?>">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?= $pelanggan["nama"] ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"value="<?= $pelanggan["alamat"] ?>"></td>
            </tr>
            <tr>
                <td>No. Telepon</td>
                <td><input type="text" name="no_telepon" value="<?= $pelanggan["no_telepon"] ?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">SIMPAN</button>
                    <button type="reset">RESET</button>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>