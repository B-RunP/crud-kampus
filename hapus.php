<?php

    session_start();

    if( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
    }

    require 'functions.php';

    $nidn = $_GET["nidn"];

    if(hapusDosen($nidn) > 0) {
        echo "
            <script>
                alert('data berhasil dihapus');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal dihapus');
                document.location.href = 'index.php';
            </script>
        ";
    }
?>