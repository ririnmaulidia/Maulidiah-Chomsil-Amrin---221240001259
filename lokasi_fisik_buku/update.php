<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM lokasi_fisik_buku WHERE lokasi_id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
?>
	<form action="update_process.php" method="POST">
		Lokasi ID: <input type="text" name="lokasi_id" value="<?php echo $row['lokasi_id']; ?>"><br>
		Buku ID: <input type="text" name="buku_id" value="<?php echo $row['buku_id']; ?>"><br>
		Nama Lokasi: <input type="text" name="nama_lokasi" value="<?php echo $row['nama_lokasi']; ?>"><br>
		<input type="hidden" name="id" value="<?php echo $row['lokasi_id']; ?>">
		<input type="submit" value="Update">
	</form>
<?php

} else {
	echo "Data tidak ditemukan.";
}

$conn->close();

?>

