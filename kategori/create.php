<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kategori_id = $_POST['kategori_id'];
    $nama_kategori = $_POST['nama_kategori'];
    

    // Modify your SQL query to include the 'tanggal_pengembalian' column
    $sql = "INSERT INTO Kategori (nama_kategori)
            VALUES ('$kategori_id','$nama_kategori')";

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
    Kategori ID: <input type="text" name="kategori_id"><br>
    Nama Kategori: <input type="text" name="nama_kategori"><br>
     <input type="submit" value="Tambah">
</form>
