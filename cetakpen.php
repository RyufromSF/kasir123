<?php 

require "koneksi.php";

$sql = "SELECT penjualan.id, barang.nama as nama_barang, penjualan.jumlah, penjualan.total_harga, user.username, penjualan.created_at FROM barang JOIN penjualan on barang.id = penjualan.id_barang JOIN user ON user.id = penjualan.id_staff ORDER BY penjualan.created_at DESC";
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
    border: 3px solid #113;
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
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Diinput oleh</th>
                <th>Waktu</th>
            </tr>
            
            <?php $i = 1; ?>
            <?php while ($penjualan = mysqli_fetch_array($query)) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $penjualan["nama_barang"] ?></td>
                    <td><?= $penjualan["jumlah"] ?></td>
                    <td><?= $penjualan["total_harga"] ?></td>
                    <td><?= $penjualan["username"] ?></td>
                    <td><?= $penjualan["created_at"] ?></td>
                </tr>
                <?php $i++; ?>
            <?php endwhile ?>
        </table>
        <h4>@Toko Ryu</h4>
    </div>
    <script>
    // Fungsi ini akan dijalankan saat halaman selesai dimuat
    window.onload = function() {
        printData(); // Panggil fungsi printData
    };

    function printData() {
        window.print();
    }
    </script>