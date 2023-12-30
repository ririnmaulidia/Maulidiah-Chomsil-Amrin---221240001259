<?php
include 'koneksi.php';

$sql = "SELECT buku.*, kategori.* FROM buku LEFT JOIN kategori ON buku.kategori_id=kategori.kategori_id";
$result = $conn->query($sql);

echo "<a href='create.php'>Tambah Buku</a>";
if ($result->num_rows > 0) {
	echo "<table border='1'>";
	echo "<tr><th>Buku ID</th><th>Judul</th><th>Pengarang</th><th>Penerbit</th><th>Tahun Terbit</th><th>Sinopsis</th><th>Nama Kategori</th><th>Action</th></tr>";
	while ($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td>".$row["buku_id"]."</td>";
		echo "<td>".$row["judul"]."</td>";
		echo "<td>".$row["pengarang"]."</td>";
		echo "<td>".$row["penerbit"]."</td>";
		echo "<td>".$row["tahun_terbit"]."</td>";
		echo "<td>".$row["sinopsis"]."</td>";
		echo "<td>".$row["nama_kategori"]."</td>";
		echo "<td><a href='update.php?id=".$row["buku_id"]."'>Edit</a> | <a href='delete.php?id=".$row["buku_id"]."'>Hapus</a></td>";
		echo "</tr>";
	}
 	echo "</table>";
} else {
	echo "Tidak ada data buku.";
}

$conn->close();
?>

