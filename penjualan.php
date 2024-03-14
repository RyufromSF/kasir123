<!DOCTYPE html>
<html>

<head>
    <title>Penjualan</title>
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

    $sql = "SELECT penjualan.id, barang.nama as nama_barang, penjualan.jumlah, penjualan.total_harga, penjualan.id_staff, penjualan.created_at, user.username, pelanggan.nama as nama_pelanggan
        FROM penjualan
        JOIN barang ON penjualan.id_barang = barang.id
        JOIN user ON penjualan.id_staff = user.id
        JOIN pelanggan ON penjualan.id_pelanggan = pelanggan.id
        ORDER BY penjualan.created_at DESC";
    $query = mysqli_query($koneksi, $sql);
    ?>

    <div>
        <h1>Data Penjualan</h1>
        <form action="new-penjualan.php" method="GET">
            <button type="submit">Tambah</button>
        </form>
        <form action="cetakpen.php" method="GET">
        <button type="submit">Print</button>
        </form>
        <table border="1">
            <tr>
                <td>No.</td>
                <td>Nama Barang</td>
                <td>Jumlah</td>
                <td>Total Harga</td>
                <td>Diinput oleh</td>
                <td>Nama Pelanggan</td>
                <td>Waktu</td>
                <th colspan="2">Aksi</th>
            </tr>
            <?php $i = 1; ?>
            <?php while ($penjualan = mysqli_fetch_array($query)) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $penjualan["nama_barang"] ?></td>
                    <td><?= $penjualan["jumlah"] ?></td>
                    <td><?= $penjualan["total_harga"] ?></td>
                    <td><?= $penjualan["username"] ?></td>
                    <td><?= $penjualan["nama_pelanggan"] ?></td>
                    <td><?= $penjualan["created_at"] ?></td>
                    <td>
                        <form action="read-penjualan.php" method="GET">
                            <input type="hidden" name="id" value='<?= $penjualan["id"] ?>'>
                            <button type="submit">Lihat</button>
                        </form>
                    </td>
                    <td>
                        <form action="delete-penjualan.php" method="POST" onsubmit="return konfirmasi(this)">
                            <input type="hidden" name="id" value='<?= $penjualan["id"] ?>'>
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endwhile ?>
        </table>
    </div>
<br>
<br>
    <?php include "footer.php" ; ?>
    <script>
        function konfirmasi(form) {
            formData = new FormData(form);
            id = formData.get("id");
            return confirm(`Hapus penjualan '${id}'?`);
        }
    </script>
</body>

</html>