<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM denda WHERE denda_id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
?>
	<form action="update_process.php" method="POST">
		Denda ID: <input type="text" name="denda_id" value="<?php echo $row['denda_id']; ?>"><br>
		Peminjaman ID: <input type="text" name="peminjaman_id" value="<?php echo $row['peminjaman_id']; ?>"><br>
		Jumlah Denda: <input type="number" step= "10.2" name="jumlah_denda" value="<?php echo $row['jumlah_denda']; ?>"><br>
		<input type="hidden" name="id" value="<?php echo $row['denda_id']; ?>">
		<input type="submit" value="Update">
	</form>
<?php
} else {
	echo "Data tidak ditemukan.";
}

$conn->close();

?>

