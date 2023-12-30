<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM katalog WHERE katalog_id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
    <form action="update_process.php" method="POST">
    ID Katalog : <input type="text" name="katalog_id" value="<?php echo $row['katalog_id']; ?>"><br>
    ID Buku: <input type="text" name="buku_id" value="<?php echo $row['buku_id']; ?>"><br>
    Sinopsis: <input type="text" name="sinopsis" value="<?php echo $row ['sinopsis']; ?>"><br>
    ID Kategori: <input type="text" name="kategori_id"value= "<?php echo $row ['kategori_id']; ?>"><br>
    <input type="hidden" name="id" value="<?php echo $row['katalog_id']; ?>">
    <input type="submit" value="Update">
</form>

<?php
} else {
    echo "Data tidak ditemukan.";
}

$conn->close();
?>
