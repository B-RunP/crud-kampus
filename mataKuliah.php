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
    <h1>Mata Kuliah</h1>
    <table border="1">
        <tr>
            <th>no</th>
            <th>ID Mata Kuliah</th>
            <th>Nama Mata Kuliah</th>
            <th>Jumlah SKS</th>
            <th>Semester</th>
            <th>nidn</th>
            <th>aksi</th>
        </tr>
        <?php

            $mataKuliah = getData("SELECT * FROM mata_kuliah");
            $i = 1;
            foreach ($mataKuliah as $matkul) {
                echo "<tr>";
                echo "<td>".$i++."</td>";
                echo "<td>".$matkul['id_matkul']."</td>";
                echo "<td>".$matkul['nama_matkul']."</td>";
                echo "<td>".$matkul['jml_sks']."</td>";
                echo "<td>".$matkul['semester']."</td>";
                echo "<td>".$matkul['nidn']."</td>";
                echo "<td>
                    <a href='ubahMatkul.php?id_matkul=".$matkul['id_matkul']."'>Edit</a>
                    <a href='hapusMatkul.php?id_matkul=".$matkul['id_matkul']."'>Hapus</a>
                </td>";
                echo "</tr>";
            }
        ?>
    </table>
    <br>
    <a href='index.php'>Kembali ke index</a>
    <br>
    <br>
    <a href='tambahMatkul.php'>Tambah Mata Kuliah</a>
</body>
</html>