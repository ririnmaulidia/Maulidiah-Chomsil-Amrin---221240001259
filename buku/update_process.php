<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $buku_id = $_POST['buku_id'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $sinopsis = $_POST['sinopsis'];
    $kategori_id = $_POST['kategori_id'];

    // periksa koneksi apakah berhasil, jika tidak akan menampilkan pesan "Koneksi Gagal"
if ($conn) {
    $sql = "UPDATE buku SET buku_id = '$buku_id', judul = '$judul', pengarang = '$pengarang', penerbit = '$penerbit', tahun_terbit = '$tahun_terbit', sinopsis = '$sinopsis', kategori_id = '$kategori_id' WHERE buku_id = '$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: read.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
    
    } else {
        echo "Koneksi Gagal.";
    }
    
}

?>

