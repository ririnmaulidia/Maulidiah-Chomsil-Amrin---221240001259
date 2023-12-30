<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    // Modify your SQL query to include the 'tanggal_pengembalian' column
    $sql = "INSERT INTO Karyawan (nama, jabatan, email, telepon)
            VALUES ('$nama', '$jabatan', '$email', '$telepon')";

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
    Nama : <input type="text" name="nama"><br>
    Jabatan: <input type="text" name="jabatan"><br>
    Email: <input type="text" name="email"><br>
    Telepon : <input type="text" name="telepon">
    <input type="submit" value="Tambah">
</form>
