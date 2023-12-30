<?php
include 'koneksi.php';

$sql = "SELECT * FROM lokasi_fisik_buku";
$result = $conn->query($sql);

echo "<a href='create.php'>Tambah Lokasi</a>";

if ($result->num_rows > 0) {
	echo "<table border='1'>";
	echo "<tr><th>Lokasi ID</th><th>Buku ID</th><th>Nama Lokasi</th><th>Action</th></tr>";
	while ($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td>".$row["lokasi_id"]."</td>";
		echo "<td>".$row["buku_id"]."</td>";
		echo "<td>".$row["nama_lokasi"]."</td>";
		echo "<td><a href='update.php?id=".$row["lokasi_id"]."'>Edit</a> | <a href='delete.php?id=".$row["lokasi_id"]."'>Hapus</a></td>";
		echo "</tr>";
	}
 	echo "</table>";
} else {
	echo "Tidak ada data lokasi yang tercantum.";
}

$conn->close();
?>