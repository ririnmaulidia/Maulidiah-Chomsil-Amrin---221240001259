<?php
include 'koneksi.php';

$sql = "SELECT * FROM katalog";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Buku ID</th><th>Sinopsis</th><th>Kategori ID</th><th>Action</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["katalog_id"]."</td>";

        // Check if the key "buku" exists in the $row array
        echo "<td>".(isset($row["buku_id"]) ? $row["buku_id"] : "")."</td>";

        echo "<td>".$row["sinopsis"]."</td>";
        echo "<td>".$row["kategori_id"]."</td>";
        echo "<td><a href='update.php?id=".$row["katalog_id"]."'>Edit</a> | <a href='delete.php?id=".$row["katalog_id"]."'>Hapus</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data katalog.";
}

$conn->close();
?>
