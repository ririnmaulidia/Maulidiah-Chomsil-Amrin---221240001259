<?php
// Include your database connection file (koneksi.php)
include 'koneksi.php';

// Sample query to get counts from each table
$query_buku = "SELECT COUNT(*) AS total_buku FROM buku";
$query_kategori = "SELECT COUNT(*) AS total_kategori FROM kategori";
$query_peminjaman = "SELECT COUNT(*) AS total_peminjaman FROM peminjaman";
$query_members = "SELECT COUNT(*) AS total_members FROM anggota";

$result_buku = $conn->query($query_buku);
$result_kategori = $conn->query($query_kategori);
$result_peminjaman = $conn->query($query_peminjaman);
$result_members = $conn->query($query_members);

// Fetch counts
$row_buku = $result_buku->fetch_assoc();
$row_kategori = $result_kategori->fetch_assoc();
$row_peminjaman = $result_peminjaman->fetch_assoc();
$row_members = $result_members->fetch_assoc();


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard Perpustakaan</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background-color: #f4f4f4;
}

h1 {
    color: #333;
}

div {
    margin-top: 20px;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    background-color: #fff;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
}

th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

/* Optional: Add hover effect to table rows */
tr:hover {
    background-color: #f5f5f5;
}

/* Optional: Style for the navigation bar */
nav {
    background-color: #333;
    color: #fff;
    padding: 10px;
}

nav a {
    color: #fff;
    text-decoration: none;
    padding: 10px;
}

nav a:hover {
    background-color: #555;
}
    </style>
</head>
<body>

    <h1>Dashboard Perpustakaan</h1>

<div>
    <ul>
        <li>Total Buku: <?php echo $row_buku['total_buku']; ?></li>
    </ul>
</div>

<div>
    <ul>
        <li>Total Kategori: <?php echo $row_kategori['total_kategori']; ?></li>
    </ul>
</div>

<div>
    <ul>
        <li>Total Peminjam: <?php echo $row_peminjaman['total_peminjaman']; ?></li>
    </ul>
</div>

<div>
    <ul>
        <li>Total Members: <?php echo $row_members['total_members']; ?></li>
    </ul>
</div>

<!-- You can add more sections or features to your dashboard -->

</body>
</html>

