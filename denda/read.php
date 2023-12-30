<?php
include 'koneksi.php';

$sql = "SELECT * FROM denda";
$result = $conn->query($sql);

echo "<a href='create.php'>Tambah Denda</a>";
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Denda ID</th><th>Peminjaman ID</th><th>Jumlah Denda</th><th>Action</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["denda_id"]."</td>";
        echo "<td>".$row["peminjaman_id"]."</td>";
        echo "<td>".$row["jumlah_denda"]."</td>";
        echo "<td><a href='update.php?id=".$row["denda_id"]."'>Edit</a> | <a href='delete.php?id=".$row["denda_id"]."'>Hapus</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data denda.";
}

$conn->close();
?>
