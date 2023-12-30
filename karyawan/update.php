<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM Karyawan WHERE karyawan_id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
    <form action="update_process.php" method="POST">
        ID Karyawan: <input type="text" name="karyawan_id" value="<?php echo $row['karyawan_id']; ?>"><br>
        Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br>
        Jabatan: <input type="text" name="jabatan" value="<?php echo $row['jabatan']; ?>"><br>
        Email: <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
       Telepon: <input type="text" name="telepon" value="<?php echo $row['telepon']; ?>"><br>
        <input type="hidden" name="id" value="<?php echo $row['karyawan_id']; ?>">
        <input type="submit" value="Update">
    </form>
<?php
} else {
    echo "Data tidak ditemukan.";
}

$conn->close();
?>
