<?php
    session_start();

    if( !isset($_SESSION["login"])) {
       header("Location: login.php");
       exit;
    }

    require 'functions.php';

    $nidn = $_GET["nidn"];

    // query data berdasarkan nidn
    $dosen = getData("SELECT * FROM dosen WHERE nidn = $nidn")[0];

    if(isset($_POST["submit"])){
        if(ubahDosen($_POST) > 0) {
            echo "
                <script>
                    alert('Data berhasil ubah');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal ubah');
                    document.location.href = 'index.php';
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
    <h1>Edit dosen</h1>
    <form method="post">
        <label for="nidn">NIDN</label>
        <input type="number" id="nidn" name="nidn" value="<?= $dosen["nidn"]; ?>" />
        <br/>
        <br/>
        <label for="nama_dosen">Nama Dosen</label>
        <input type="text" id="nama_dosen" name="nama_dosen" value="<?= $dosen["nama_dosen"]; ?>" />
        <br/>
        <br/>
        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" name="alamat" value="<?= $dosen["alamat"]; ?>" />
        <br/>
        <br/>
        <label for="tgl_lahir">Tanggal Lahir</label>
        <input type="date" id="tgl_lahir" name="tgl_lahir" value="<?= $dosen["tgl_lahir"]; ?>" />
        <br/>
        <br/>
        <label for="jns_kelamin">Jenis Kelamin</label>
        <select id="jns_kelamain" name="jns_kelamin">
            <option value="Laki - laki" <?php if ($dosen["jns_kelamin"] == "Laki - laki") echo "selected"; ?>>Laki - laki</option>
            <option value="Perempuan" <?php if ($dosen["jns_kelamin"] == "Perempuan") echo "selected"; ?>>Perempuan</option>
        </select>
        <button type="submit" name="submit">Edit dosen</button>
    </form>
</body>
</html>