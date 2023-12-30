<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peminjaman_id = $_POST['peminjaman_id'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $denda = $_POST['denda'];
    $status_pengembalian = $_POST['status_pengembalian'];

    // Modify your SQL query to include the 'tanggal_pengembalian' column
    $sql = "INSERT INTO Pengembalian (peminjaman_id, tanggal_pengembalian, denda, status_pengembalian)
            VALUES ('$peminjaman_id', '$tanggal_pengembalian', '$denda', '$status_pengembalian')";

    if ($conn->query($sql) === TRUE) {
        header("Location: read.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<form action="create.php" method="POST">
    Peminjaman ID: <input type="text" name="peminjaman_id"><br>
    Denda: <input type="number" name="denda"><br>
    Tanggal Pengembalian: <input type="date" name="tanggal_pengembalian"><br>
    Status Pengembalian:
    <select name="status_pengembalian">
        <option value="dikembalikan">Dikembalikan</option>
        <option value="terlambat">Terlambat</option>
    </select><br>
    <input type="submit" value="Tambah">
</form>

