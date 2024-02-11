<?php
require 'functions.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM data WHERE 
            nama LIKE '%$keyword%' OR
            npm LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'
            ";
$mahasiswa = query($query);

?>

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