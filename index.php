<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

//pagination
//konfigurasi
$jumlahDataPerHalaman = 2;
$jumlahData = count(query("select * from data"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$mahasiswa = query("select * from data limit $awalData, $jumlahDataPerHalaman");

if (isset($_POST["cari"])) {
	$mahasiswa = cari($_POST["keyword"]);
}


?>
<!DOCTYPE html>
<html>

<head>
	<title>Halaman Administrator</title>
</head>

<body>
	<a href="logout.php">Logout</a>
	<h1>Halaman Administrator</h1>

	<a href="tambah.php">Tambah data Mahasiswa</a>
	<br><br>
	<form action="" method="post">
		<input type="text" name="keyword" size="30" autofocus placeholder="Cari data.." autocomplete="off" id="keyword">
		<button type="submit" name="cari" id="tombol-cari">Cari</button>
		<br><br>
	</form>

	<!-- navigasi -->
	<?php if ($halamanAktif > 1) : ?>
		<a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
	<?php endif; ?>

	<?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
		<?php if ($i == $halamanAktif) : ?>
			<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>

		<?php else : ?>
			<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>


		<?php endif; ?>
	<?php endfor; ?>
	<?php if ($halamanAktif < $jumlahHalaman) : ?>
		<a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
	<?php endif; ?>

	<br>
	<div id="container">

		<table border="1" cellspacing="0" cellpadding="5">
			<tr>
				<th>No</th>
				<th>Aksi</th>
				<th>Nama</th>
				<th>NPM</th>
				<th>Jurusan</th>

			</tr>
			<?php $i = 1; ?>
			<?php foreach ($mahasiswa as $row) { ?>
				<tr>
					<td><?= $i; ?></td>
					<td>
						<a href="ubah.php?id=<?php echo $row["id"]; ?>">ubah</a>
						|
						<a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin?')">hapus</a>
					</td>
					</td>
					<td><?= $row["nama"]; ?></td>
					<td><?= $row["npm"]; ?></td>
					<td><?= $row["jurusan"]; ?></td>
				</tr>
				<?php $i++; ?>
			<?php } ?>
		</table>
	</div>
	<script src="script.js"></script>
</body>

</html>