<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-image: url("img/paper-blue.png"); /* Sesuaikan path jika diperlukan */
    background-size: cover;
        }
.wrapper {
   max-width: 1170px;
   padding-left: 15px;
   padding-right: 15px;
   margin: 0 auto;
}
.card {
   display: flex;
   text-align: center;
   justify-content: space-between;
}
.card-item {
   flex-basis: 32%;
   position: relative;
}

.card-circle {
   width: 146px;
   height: 146px;
   border-radius: 100%;
   box-shadow: 0 1px 6px rgba(0,0,0,0.1);
   margin: 0 auto;
}

.card-text {
   background: #fff;
   border-radius: 20px;
   box-shadow: 0 1px 6px rgba(0,0,0,0.1);
   padding: 80px 20px 20px;
   margin-top: -73px;
}

.card img {
   position: absolute;
   top: 0;
   left: 0;
   right: 0;
   margin: 0 auto;
   width: 146px;
   height: 146px;
}
button {
    padding: 6px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
    text-decoration: none;
}
button:hover {
    background-color: #0056b3;
}
        /* Gaya CSS untuk footer */
        footer {
            background-color: #3897ec;
            text-align: center;
            bottom: 0;
            left: 0;
            width: 100%;
        }
h1 {
   text-align: center;
}

    </style>
</head>
<header>
<?php include "menu.php" ; ?>
<br>
<br>
<h1>Selamat Datang, <?= $_SESSION["username"] ?>!</h1>
<h1>level: <?= $_SESSION["level"] ?></h1>
<br>
<br>
<div class="wrapper">
   <div class="card">
   <?php if ($_SESSION["level"] == "admin") : ?>
      <div class="card-item">
         <div class="card-circle"></div>
         <img src="img\user.png" alt="Icon">
         <div class="card-text">
            <h3>USER</h3>
            <p>Cek akun karyawan </p>
            <button><a href="user.php" style="text-decoration: none; color: white;">GO</a></button>
         </div>
      </div>
      <?php endif; ?>
      <div class="card-item">
         <div class="card-circle"></div>
         <img src="img\barang.png" alt="Icon">
         <div class="card-text">
            <h3>BARANG</h3>
            <p>Cek barang dari toko</p>
            <button><a href="barang.php" style="text-decoration: none; color: white;"">GO</a></button>
         </div>
      </div>
      <div class="card-item">
      <?php if ($_SESSION["level"] == "admin" || $_SESSION["level"] == "keuangan") : ?>
         <div class="card-circle"></div>
         <img src="img\pelanggan.png" alt="Icon">
         <div class="card-text">
            <h3>PELANGGAN</h3>
            <p>Cek pelanggan toko</p>
            <button><a href="pelanggan.php" style="text-decoration: none; color: white ;">GO</a></button>
         </div>
        <?php endif ?>
      </div>
   </div>
</div>
</header>
<br>
<br>
<br>
<br>
<br>
<br>

<?php include "footer.php" ; ?>
<body>
</body>
</html>