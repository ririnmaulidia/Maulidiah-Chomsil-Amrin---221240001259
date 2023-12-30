<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM pengembalian WHERE pengembalian_id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
?>
	<form action="update_process.php" method="POST">
		Pengembalian ID: <input type="text" name="pengembalian_id" value="<?php echo $row['pengembalian_id']; ?>"><br>
		Peminjaman ID: <input type="text" name="peminjaman_id" value="<?php echo $row['peminjaman_id']; ?>"><br>
		Tanggal Pengembalian: <input type="date" name="tanggal_pengembalian" value="<?php echo $row['tanggal_pengembalian']; ?>"><br>
		Denda: <input type="number" step= "10.2" name="denda" value="<?php echo $row['denda']; ?>"><br>
		Status Pengembalian:
    <select name="status_pengembalian">
        <option value="dikembalikan">Dikembalikan</option>
        <option value="terlambat">Terlambat</option>
    </select><br>
		<input type="hidden" name="id" value="<?php echo $row['peminjaman_id']; ?>">
		<input type="submit" value="Update">
	</form>
<?php
} else {
	echo "Data tidak ditemukan.";
}

$conn->close();

?>

