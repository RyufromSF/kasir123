<?php 

require "koneksi.php";

$sql = "SELECT * FROM barang";
$query = mysqli_query($koneksi, $sql);
?>

<div>
    <style>
        div {
    max-width: 800px;
    margin: 20px auto;
}
h1 {
    text-align: center;
}
        table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: white;
}
table, th, td {
    border: 2px solid #113;
}

th, td {
    padding: 10px;
    text-align: left;
}
h4 {
    text-align: end; /* Untuk menengahkan teks */
        }
    </style>
        <table border="1">
            <tr>
                <td>No.</td>
                <td>Nama</td>
                <td>Kategori</td>
                <td>Stok</td>
                <td>Harga</td>
                <td>Tanggal buat</td>
                <td>Tanggal ubah</td>
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
                </tr>
                <?php $i++; ?>
            <?php endwhile ?>
        </table>
        <h4>@toko_Ryu</h4>
    </div>
    <script>
    window.onload = function() {
        printData(); // Panggil fungsi printData
    };

    function printData() {
        window.print();
    }
    </script>