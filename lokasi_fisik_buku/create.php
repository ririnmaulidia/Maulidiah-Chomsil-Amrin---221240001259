<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$lokasi_id = $_POST['lokasi_id'];
	$buku_id = $_POST['buku_id'];
	$nama_lokasi = $_POST['nama_lokasi'];

$sql = "INSERT INTO lokasi_fisik_buku (lokasi_id, buku_id, nama_lokasi) VALUES ('$lokasi_id','$buku_id','$nama_lokasi')";

	if ($conn->query($sql) === TRUE) {
	header("Location: read.php"); // Redirect ke tampilan Read setelah berhasil tambah data
	exit;
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}

?>
<form action="create.php" method="POST">
	Lokasi ID: <input type="text" name="lokasi_id"><br>
	Buku ID: <input type="text" name="buku_id"><br>
	Nama Lokasi: <input type="text" name="nama_lokasi"><br>
	<input type="submit" value="Tambah">
</form>