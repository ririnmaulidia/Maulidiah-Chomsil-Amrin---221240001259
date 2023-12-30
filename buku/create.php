<?php
include 'koneksi.php';

$result = $conn->query("SELECT kategori_id, nama_kategori FROM kategori");
$categories = [];
while ($row = $result->fetch_assoc()) {
    $categories[$row['kategori_id']] = $row['nama_kategori'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$buku_id = $_POST['buku_id'];
	$judul = $_POST['judul'];
	$pengarang = $_POST['pengarang'];
	$penerbit = $_POST['penerbit'];
	$tahun_terbit = $_POST['tahun_terbit'];
	$sinopsis = $_POST['sinopsis'];
	$kategori_id = $_POST['kategori_id'];

 if (!array_key_exists($kategori_id, $categories)) {
        echo "Error: Invalid Kategori ID";
        exit;
    }
    
	$sql = "INSERT INTO buku (buku_id, judul, pengarang, penerbit, tahun_terbit, sinopsis, kategori_id) VALUES ('$buku_id','$judul','$pengarang', '$penerbit', '$tahun_terbit', '$sinopsis', '$kategori_id')";

	if ($conn->query($sql) === TRUE) {
		header("Location: index.php"); // Redirect ke tampilan Read setelah berhasil tambah data
		exit;

	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}

?>
<form action="create.php" method="POST">
	Buku ID: <input type="text" name="buku_id"><br>
	Judul: <input type="text" name="judul"><br>
	Pengarang: <input type="text" name="pengarang"><br>
	Penerbit: <input type="text" name="penerbit"><br>
	Tahun Terbit: <input type="text" name="tahun_terbit"><br>
	Sinopsis: <input type="text" name="sinopsis"><br>
	Kategori ID:  <select name="kategori_id">
        <?php foreach ($categories as $id => $name) : ?>
            <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
        <?php endforeach; ?>
    </select><br>
	<input type="submit" value="Tambah">
</form>

