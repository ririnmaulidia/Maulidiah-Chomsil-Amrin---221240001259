<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $lokasi_id = $_POST['buku_id'];
    $buku_id = $_POST['buku_id'];
    $nama_lokasi = $_POST['nama_lokasi'];
    // Check if the connection is established
    if ($conn) {
        $sql = "UPDATE lokasi_fisik_buku SET lokasi_id = '$lokasi_id', buku_id = '$buku_id', nama_lokasi = '$nama_lokasi' WHERE lokasi_id = '$id'";

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