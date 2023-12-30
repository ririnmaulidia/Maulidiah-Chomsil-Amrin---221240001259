<?php
include 'koneksi.php';

$sql = "SELECT peminjaman.peminjaman_id, buku.judul, anggota.nama, peminjaman.tanggal_peminjaman, peminjaman.tanggal_kembali, peminjaman.status FROM `peminjaman` INNER JOIN `buku` ON peminjaman.buku_id=buku.buku_id INNER JOIN `anggota` ON peminjaman.anggota_id=anggota.anggota_id";
$result = $conn->query($sql);

echo "<a href='create.php'>Tambah peminjaman</a>";

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Peminjaman ID</th><th>Judul Buku</th><th>Nama Anggota </th><th>Tanggal Peminjaman</th><th>Tanggal kembali</th><th>Status</th><th>Action</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["peminjaman_id"]."</td>";
        echo "<td>".$row["judul"]."</td>";
        echo "<td>".$row["nama"]."</td>";
        echo "<td>".$row["tanggal_peminjaman"]."</td>";
        echo "<td>".$row["tanggal_kembali"]."</td>";
        echo "<td>".$row["status"]."</td>";
        echo "<td><a href='update.php?id=".$row["peminjaman_id"]."'>Edit</a> | <a href='delete.php?id=".$row["peminjaman_id"]."'>Hapus</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data peminjaman.";
}

$conn->close();
?>


