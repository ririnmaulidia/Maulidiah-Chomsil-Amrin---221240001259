<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $denda_id = $_POST['denda_id'];
    $peminjaman_id = $_POST['peminjaman_id'];
    $jumlah_denda = $_POST['jumlah_denda'];

    // Check if the connection is established
    if ($conn) {
        // Correct the column name in the query
        $sql = "UPDATE denda SET peminjaman_id = '$peminjaman_id', jumlah_denda = '$jumlah_denda' WHERE denda_id = '$denda_id'";

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
