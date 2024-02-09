<?php 
require 'functions.php';

$id = $_GET["id"];
$data = query("SELECT * FROM data WHERE id = $id")[0];


if( isset($_POST["ubah"]) ) {
	if( ubah($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			  </script>";
	} else {
		echo "<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php';
			  </script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ubah Data Mahasiswa</title>
	<style>
		ul li { list-style: none; }
	</style>
</head>
<body>
	<h1>Ubah Data Mahasiswa</h1>
	<form action="" method="post">
		<input type="hidden" name="id" value="<?php echo $data["id"]; ?>">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" value="<?php echo $data["nama"]; ?>">
			</li>
			<li>
				<label for="npm">npm : </label>
				<input type="text" name="npm" id="npm" value="<?php echo $data["npm"]; ?>">
			</li>
			<li>
				<label for="jurusan">jurusan : </label>
				<input type="text" name="jurusan" id="jurusan" value="<?php echo $data["jurusan"]; ?>">
			</li>
			
			<li>
				<button type="submit" name="ubah">Ubah Data!</button>
			</li>
		</ul>
	</form>
</body>
</html>