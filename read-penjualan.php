<!DOCTYPE html>
<html>

<head>
    <title>Read Penjualan</title>
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

    $sql = "SELECT penjualan.id, barang.nama as nama_barang, penjualan.jumlah, penjualan.total_harga, user.username, penjualan.created_at FROM barang JOIN penjualan on barang.id = penjualan.id_barang JOIN user ON user.id = penjualan.id_staff WHERE penjualan.id = '$id'";
    $query = mysqli_query($koneksi, $sql);
    $penjualan = mysqli_fetch_array($query);
    ?>

    <div>
        <h1>Lihat Penjualan</h1>
        <table>
            <tr>
                <td>Nama barang</td>
                <td><input readonly type="text" value="<?= $penjualan["nama_barang"] ?>"></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td><input readonly type="text" value="<?= $penjualan["jumlah"] ?>"></td>
            </tr>
            <tr>
                <td>Total harga</td>
                <td><input readonly type="text" value="<?= $penjualan["total_harga"] ?>"></td>
            </tr>
            <tr>
                <td>Diinput oleh</td>
                <td><input readonly type="text" value="<?= $penjualan["username"] ?>"></td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td><input readonly type="text" value="<?= $penjualan["created_at"] ?>"></td>
            </tr>
        </table>
    </div>
</body>

</html>