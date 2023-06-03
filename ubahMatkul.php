<?php

    session_start();

    if( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
    }

    require 'functions.php';

    $idMatkul = $_GET["id_matkul"];

    // query data berdasarkan nidn
    $matkul = getData("SELECT * FROM mata_kuliah WHERE id_matkul = $idMatkul")[0];

    if(isset($_POST["submit"])){
        var_dump($_POST);
        if(ubahMatkul($_POST) > 0) {
            echo "
                <script>
                    alert('Data berhasil diubah');
                    document.location.href = 'mataKuliah.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal diubah');
                    document.location.href = 'mataKuliah.php';
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah dosen</title>
</head>
<body>
    <h1>Tambah Mata Kuliah</h1>
    <form method="post">
        <label for="id_matkul">ID Mata kuliah</label>
        <input type="number" id="id_matkul" name="id_matkul" value="<?= $matkul["id_matkul"]; ?>"/>
        <br/>
        <br/>
        <label for="nama_matkul">Nama Matkul</label>
        <input type="text" id="nama_matkul" name="nama_matkul" value="<?= $matkul["nama_matkul"]; ?>"/>
        <br/>
        <br/>
        <label for="jml_sks">Jumlah SKS</label>
        <input type="text" id="jml_sks" name="jml_sks" value="<?= $matkul["jml_sks"]; ?>"/>
        <br/>
        <br/>
        <label for="semester">Semester</label>
        <input type="text" id="semester" name="semester" value="<?= $matkul["semester"]; ?>"/>
        <br/>
        <br/>
        <label for="nidn">NIDN</label>
        <select id="nidn" name="nidn">
            <?php
                $nidn = getData("SELECT * FROM dosen");
                foreach ($nidn as $no) {
                    $selected = ($no['nidn'] == $matkul['nidn']) ? "selected" : "";
                    echo "<option $selected>".$no['nidn']."</option>";
                }
            ?>
        </select>
        <button type="submit" name="submit">Tambah Mata Kuliah</button>
    </form>
</body>
</html>