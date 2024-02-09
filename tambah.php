<?php 
require 'functions.php';

if(isset($_POST["tambah"]) ) {
	if(tambah($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			  </script>";
	} else {
		echo "<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'index.php';
			  </script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Data Mahasiswa</title>
	<style>
		ul li { list-style: none; }
	</style>
</head>
<body>
	<h1>Tambah Data Mahasiswa</h1>
	<form action="" method="post">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama">
			</li>
			<li>
				<label for="npm">NPM : </label>
				<input type="text" name="npm" id="npm">
			</li>
			<li>
				<label for="jurusan">Jurusan : </label>
				<input type="text" name="jurusan" id="jurusan">
			</li>
			
			<li>
				<button type="submit" name="tambah">Tambah Data!</button>
			</li>
		</ul>
	</form>
</body>
</html>