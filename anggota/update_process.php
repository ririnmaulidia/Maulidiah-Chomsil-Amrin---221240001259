<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    // Check if the connection is established
    if ($conn) {
        $sql = "UPDATE anggota SET nama = '$nama', alamat = '$alamat', email = '$email', telepon = '$telepon' WHERE anggota_id = '$id'";

        if ($conn->query($sql) === TRUE) {
            header("Location: read.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Connection failed.";
    }
}
?>
