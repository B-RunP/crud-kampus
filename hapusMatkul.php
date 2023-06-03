<?php

    session_start();

    if( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
    }

    require 'functions.php';

    $idMatkul = $_GET["id_matkul"];

    if(hapusMatkul($idMatkul) > 0) {
        echo "
            <script>
                alert('Transaksi berhasil dihapus');
                document.location.href = 'mataKuliah.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Transaksi gagal dihapus');
                document.location.href = 'mataKuliah.php';
            </script>
        ";
    }
?>