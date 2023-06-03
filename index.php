<?php
    session_start();

    if( !isset($_SESSION["login"])) {
       header("Location: login.php");
       exit;
    }

    require 'functions.php';
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kampus</title>
</head>
<body>

    <a href="logout.php">Logout</a>
    <h1>Data dosen</h1>
    <table border="1">
        <tr>
            <th>no</th>
            <th>nidn</th>
            <th>nama dosen</th>
            <th>alamat</th>
            <th>tanggal lahir</th>
            <th>jenis kelamin</th>
            <th>aksi</th>
        </tr>
        <?php

            $dataDosen = getData("SELECT * FROM dosen");
            $i = 1;
            foreach ($dataDosen as $dosen) {
                echo "<tr>";
                echo "<td>".$i++."</td>";
                echo "<td>".$dosen['nidn']."</td>";
                echo "<td>".$dosen['nama_dosen']."</td>";
                echo "<td>".$dosen['alamat']."</td>";
                echo "<td>".$dosen['tgl_lahir']."</td>";
                echo "<td>".$dosen['jns_kelamin']."</td>";
                echo "<td>
                    <a href='ubah.php?nidn=".$dosen['nidn']."'>Edit</a>
                    <a href='hapus.php?nidn=".$dosen['nidn']."'>Hapus</a>
                </td>";
                echo "</tr>";
            }
        ?>
    </table>
    <br>
    <a href='tambah.php'>Tambah data dosen</a>
    <br>
    <br>
    <a href='mataKuliah.php'>Mata Kuliah</a>
</body>
</html>