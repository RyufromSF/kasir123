<!DOCTYPE html>
<html lang="en">
<head>
    <title>New Barang</title>
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
    margin: 20px auto; /* Menengahkan tabel dengan nilai auto pada margin-left dan margin-right */
    background-color: white;
}

/* ... (kode CSS yang lain tetap sama) */


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
    if ($_SESSION["level"] != "admin" && $_SESSION["level"] != "logistik") {
        echo "Anda tidak dapat mengakses halaman ini";
        exit;
    }
    ?>

    
    <div>
        <form action="create-barang.php" method="POST">
            <h1>Tambah Barang</h1>
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <select name="kategori">
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="number" min="0" name="stok"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="number" min="0" name="harga"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit">TAMBAH</button>
                        <button type="reset">RESET</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>