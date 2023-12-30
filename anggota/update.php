<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id === null) {
    echo "ID tidak ditemukan.";
    exit;
}

$id = mysqli_real_escape_string($conn, $id);
$sql = "SELECT * FROM anggota WHERE anggota_id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
?>
	<form action="update_process.php" method="POST">
		Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br>
		Alamat: <input type="text" name="alamat" value="<?php echo $row['alamat'];
		?>"><br>
		Email: <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
		Telepon: <input type="text" name="telepon" value="<?php echo
	$row['telepon']; ?>"><br>
		<input type="hidden" name="id" value="<?php echo $row['anggota_id']; ?>">
		<input type="submit" value="Update">
	</form>
<?php
} else {
	echo "Data tidak ditemukan.";
}

$conn->close();

?>