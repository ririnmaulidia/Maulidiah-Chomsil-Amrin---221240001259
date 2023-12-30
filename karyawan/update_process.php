<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    // Check if the connection is established
    if ($conn) {
        // Perbaiki query
        $sql = "UPDATE Karyawan SET nama = '$nama', jabatan = '$jabatan', email = '$email', telepon = '$telepon' WHERE karyawan_id = '$id'";

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
