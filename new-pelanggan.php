<!DOCTYPE html>
<html lang="en">
<head>
    <title>New Pelanggan</title>
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
    if ($_SESSION["level"] != "admin" && $_SESSION["level"] != "keuangan") {    
        echo "Anda tidak dapat menghapus data ini";
        exit;
    }
    ?>
    <div>
        <form action="create-pelanggan.php" method="POST">
            <h1>Tambah Pelanggan</h1>
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat"></td>
                </tr>
                <tr>
                <tr>
                    <td>No. Telepon</td>
                    <td><input type="text" name="no_telepon"></td>
                </tr>
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