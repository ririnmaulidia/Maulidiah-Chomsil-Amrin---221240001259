<?php 
include 'koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav {
            background-color: #444;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            margin: 0 5px;
        }

        section {
            padding: 20px;
        }
    </style>
</head>
<body>

<header>
    <h1>Perpustakaan</h1>
</header>

<nav>
    <a href="buku/read.php">Buku</a>
    <a href="anggota/read.php">Anggota</a>
    <a href="denda/read.php">Denda</a>
    <a href="karyawan/read.php">Karyawan</a>
    <a href="katalog/read.php">Katalog</a>
    <a href="kategori/read.php">Kategori</a>
    <a href="lokasi_fisik_buku/read.php">Lokasi Fisik Buku</a>
    <a href="peminjaman/read.php">Peminjaman</a>
    <a href="pengembalian/read.php">Pengembalian</a>
    <a href="login.php">Log Out</a>
</nav>

<?php
include 'dashboard.php';
?>

</body>
</html>
