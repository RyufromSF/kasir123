<!DOCTYPE html>
<html lang="en">
<head>
    <title>Barang</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-image: url("img/paper-blue.png"); /* Sesuaikan path jika diperlukan */
    background-size: cover;
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

    $sql = "SELECT * FROM barang";
    $query = mysqli_query($koneksi, $sql);
    ?>

    <div>
        <h1>Data Barang</h1>
        <form action="new-barang.php" method="GET">
            <button type="submit">Tambah</button>
        </form>
        <form action="cetakbar.php" method="GET">
        <button type="submit">Print</button>
        </form>
        <table border="1">
            <tr>
                <td>No.</td>
                <td>Nama</td>
                <td>Kategori</td>
                <td>Stok</td>
                <td>Harga</td>
                <td>Tanggal buat</td>
                <td>Tanggal ubah</td>
                <th colspan="2">Aksi</th>
            </tr>
            
            <?php $i = 1; ?>
            <?php while ($barang = mysqli_fetch_array($query)) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $barang["nama"] ?></td>
                    <td><?= $barang["kategori"] ?></td>
                    <td><?= $barang["stok"] ?></td>
                    <td><?= $barang["harga"] ?></td>
                    <td><?= $barang["created_at"] ?></td>
                    <td><?= $barang["updated_at"] ?></td>
                    <td>
                        <form action="read-barang.php" method="GET">
                            <input type="hidden" name="id" value="<?= $barang["id"] ?>">
                            <button type="submit">Lihat</button>
                        </form>
                    </td>
                    <td>
                    <form action="delete-barang.php" method="POST" onsubmit="return konfirmasi(this)">
                            <input type="hidden" name="id" value='<?= $barang["id"] ?>'>
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endwhile ?>
        </table>
    </div>
    <script>
            function konfirmasi(form) {
            formData = new FormData(form);
            id = formData.get("id");
            return confirm(`Hapus barang '${id}'?`);
        }

            function printData() {
            window.print();
        }
    </script>
<br>
<br>
    <?php include "footer.php" ; ?>
</body>
</html>