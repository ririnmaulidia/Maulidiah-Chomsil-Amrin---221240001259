<?php
include 'koneksi.php';

$sql = "SELECT * FROM Kategori"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nama Kategori</th><th>Action</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["kategori_id"]."</td>";
        echo "<td>".$row["nama_kategori"]."</td>";
        echo "<td><a href='update.php?id=".$row["kategori_id"]."'>Edit</a> | <a href='delete.php?id=".$row["kategori_id"]."'>Hapus</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data kategori.";
}

$conn->close();
?>
