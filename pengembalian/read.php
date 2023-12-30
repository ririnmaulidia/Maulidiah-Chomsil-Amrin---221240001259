<?php
include 'koneksi.php';

$sql = "SELECT * FROM pengembalian";
$result = $conn->query($sql);

echo "<a href='create.php'>Tambah Pengembalian</a>";

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Pengembalian ID</th><th>Peminjaman ID</th><th>Tanggal Pengembalian</th><th>Denda</th><th>Status</th><th>Action</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["pengembalian_id"]."</td>";
        echo "<td>".$row["peminjaman_id"]."</td>";
        echo "<td>".$row["tanggal_pengembalian"]."</td>";
        echo "<td>".$row["denda"]."</td>";
        echo "<td>".$row["status_pengembalian"]."</td>";
        echo "<td><a href='update.php?id=".$row["pengembalian_id"]."'>Edit</a> | <a href='delete.php?id=".$row["pengembalian_id"]."'>Hapus</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data pengembalian.";
}

$conn->close();
?>
