<?php
$conn = mysqli_connect('localhost', 'root', '', 'latihanphp');

function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function hapus($id)
{
	global $conn;
	mysqli_query($conn, "delete from data where id = $id");

	return mysqli_affected_rows($conn);
}


function tambah($data)
{
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$npm = htmlspecialchars($data["npm"]);
	$jurusan = htmlspecialchars($data["jurusan"]);

	$sql = "INSERT INTO data
				VALUES
			('', '$nama', '$npm', '$jurusan')";

	mysqli_query($conn, $sql);
	return mysqli_affected_rows($conn);
}


function ubah($data)
{
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$npm = htmlspecialchars($data["npm"]);
	$jurusan = htmlspecialchars($data["jurusan"]);

	$sql = "UPDATE data SET
				nama = '$nama',
				npm = '$npm',
				jurusan = '$jurusan'
			WHERE
				id = $id
			";

	mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);
}


function cari($keyword)
{
	$query = "select * from data where
				nama like '%$keyword%' or
				npm like '%$keyword%' or
				jurusan like '%$keyword%'
			";
	return query($query);
}


function registrasi($data)
{
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	//cek username sudah ada atau belum
	$result = mysqli_query($conn, "select username from user where username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('username sudah terdaftar!');
			</script>";
		return false;
	}

	//cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
			</script>";
		return false;
	}

	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan userbaru ke database
	mysqli_query($conn, "insert into user values('', '$username', '$password')");

	return mysqli_affected_rows($conn);
}
