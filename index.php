<?php
require 'functions.php';
$mahasiswa = query("select * from data");

if(isset($_POST["cari"]) ) {
	$mahasiswa = cari($_POST["keyword"]);
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Administrator</title>
</head>
<body>

<h1>Halaman Administrator</h1>

<a href="tambah.php">Tambah data Mahasiswa</a>
<br><br>
<form action="" method="post">
<input type="text" name="keyword" size="30" autofocus placeholder="Cari data.." autocomplete="off">
<button type="submit" name="cari">Cari</button>
<br><br>
</form>

<table border="1" cellspacing="0" cellpadding="5">
	<tr>
		<th>No</th>
		<th>Aksi</th> 
		<th>Nama</th>
		<th>NPM</th>
		<th>Jurusan</th>
		
	</tr>
	<?php $i = 1; ?>
	<?php foreach( $mahasiswa as $row ) { ?>
	<tr>
		<td><?= $i; ?></td>
		<td><a href="ubah.php?id=<?php echo $row["id"]; ?>">ubah</a> | <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin?')">hapus</a></td>
		</td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["npm"]; ?></td>
		<td><?= $row["jurusan"]; ?></td>
	</tr>
	<?php $i++; ?>
	<?php } ?>
</table>


</body>
</html>