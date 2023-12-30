<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $buku_id = $_POST['buku_id'];
    $sinopsis = $_POST['sinopsis'];
    $kategori_id = $_POST['kategori_id'];

    // Check if the connection is established
    if ($conn) {
        // Perbaiki query
       $sql = "UPDATE katalog SET buku_id = '$buku_id', sinopsis = '$sinopsis', kategori_id = '$kategori_id' WHERE katalog_id = '$id'";



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
