<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $buku_id = $_POST['buku_id'];
    $sinopsis = $_POST['sinopsis'];
    $kategori_id = $_POST['kategori_id'];
    

    $sql = "INSERT INTO katalog (buku_id, sinopsis, kategori_id)
        VALUES ('$buku_id', '$sinopsis', '$kategori_id')";


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
    ID Buku : <input type="text" name="buku_id"><br>
    Sinopsis: <input type="text" name="sinopsis"><br>
    ID Kategori: <input type="text" name="kategori_id"><br>
    <input type="submit" value="Tambah">
</form>
