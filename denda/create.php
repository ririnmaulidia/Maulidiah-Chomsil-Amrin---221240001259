<?php
include 'koneksi.php';

// Pastikan $conn sudah dideklarasikan sebelum digunakan
if (!$conn) {
    echo "Koneksi database gagal.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $denda_id = $_POST['denda_id'];
    $peminjaman_id = $_POST['peminjaman_id'];
    $jumlah_denda = $_POST['jumlah_denda'];

    $sql = "INSERT INTO denda (denda_id, peminjaman_id, jumlah_denda)
            VALUES ('$denda_id','$peminjaman_id','$jumlah_denda')";

    if ($conn->query($sql) === TRUE) {
        header("Location: read.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<form action="create.php" method="POST">
    Denda ID: <input type="text" name="denda_id"><br>
    Peminjaman ID: <input type="text" name="peminjaman_id"><br>
    Jumlah Denda: <input type="number" step="10.2" name="jumlah_denda"><br>
    <input type="submit" value="Tambah">
</form>
