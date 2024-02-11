<?php

//koneksi database
$conn = mysqli_connect('localhost', 'root', '', 'latihanphp');

//ambil data dari tabel data / query data
$result = mysqli_query($conn, "SELECT * FROM data");
if (!$result) {
    echo mysqli_error($conn);
}

//ambil data (fetch) data dari object result
//mysqli_fetch_row() //mengembalikan array numerik
//mysqli_fetch_assoc() //mengembalikan array associative
//mysqli_fetch_array() //mengembalikan array numerik dan associative
//mysqli_fetch_object() //mengembalikan object

// $data = mysqli_fetch_assoc($result);

function showData($result)
{
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>

<body>
    <div>
        <h1>Daftar Mahasiswa</h1>

        <table class="border-4">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Npm</th>
                <th>Prodi</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($rows = showData($result) as $row) : ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['nama'] ?></td>
                    <td><?php echo $row['npm'] ?></td>
                    <td><?php echo $row['jurusan'] ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>