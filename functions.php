<?php
$host = "localhost";
$username = "root";
$password = "Natsudragnel157_";
$database = "kampus";
    
// Fungsi untuk melakukan koneksi ke database
function koneksi()
{
    global $host, $username, $password, $database;
    $koneksi = mysqli_connect($host, $username, $password, $database);
    
    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
    }
    
    return $koneksi;
}

// Fungsi untuk mendapatkan data dosen dari tabel
function getData($query)
{
    $koneksi = koneksi();
    $result = mysqli_query($koneksi, $query);

    $dataDosen = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $dataDosen[] = $row;
    }

    mysqli_close($koneksi);

    return $dataDosen;
}

function tambahDosen($data) {
    $koneksi = koneksi();

    $nidn = htmlspecialchars($data["nidn"]);
    $nama_dosen = htmlspecialchars($data["nama_dosen"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
    $jns_kelamin = htmlspecialchars($data["jns_kelamin"]);

    $query = "INSERT INTO dosen VALUES ('$nidn', '$nama_dosen', '$alamat', '$tgl_lahir', '$jns_kelamin')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function ubahDosen($data) {
    $koneksi = koneksi();

    $nidn = htmlspecialchars($data["nidn"]);
    $nama_dosen = htmlspecialchars($data["nama_dosen"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
    $jns_kelamin = htmlspecialchars($data["jns_kelamin"]);

    $query = "UPDATE dosen SET nidn = '$nidn', nama_dosen = '$nama_dosen', alamat = '$alamat', tgl_lahir = '$tgl_lahir', jns_kelamin =  '$jns_kelamin' WHERE nidn = '$nidn'";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapusDosen($data) {
    $koneksi = koneksi();

    mysqli_query($koneksi, "DELETE FROM dosen WHERE nidn = '$data'");

    return mysqli_affected_rows($koneksi);
}

function tambahMatkul($data) {
    $koneksi = koneksi();

    $id_matkul = htmlspecialchars($data["id_matkul"]);
    $nama_matkul = htmlspecialchars($data["nama_matkul"]);
    $jml_sks = htmlspecialchars($data["jml_sks"]);
    $semester = htmlspecialchars($data["semester"]);
    $nidn = htmlspecialchars($data["nidn"]);

    $query = "INSERT INTO mata_kuliah VALUES ('$id_matkul', '$nama_matkul', '$jml_sks', '$semester', '$nidn')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function ubahMatkul($data) {
    $koneksi = koneksi();

    $id_matkul = htmlspecialchars($data["id_matkul"]);
    $nama_matkul = htmlspecialchars($data["nama_matkul"]);
    $jml_sks = htmlspecialchars($data["jml_sks"]);
    $semester = htmlspecialchars($data["semester"]);
    $nidn = htmlspecialchars($data["nidn"]);

    $query = "UPDATE mata_kuliah SET id_matkul = '$id_matkul', nama_matkul = '$nama_matkul', jml_sks = '$jml_sks', semester = '$semester', nidn = '$nidn' WHERE id_matkul = '$id_matkul'";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapusMatkul($data) {
    $koneksi = koneksi();

    mysqli_query($koneksi, "DELETE FROM mata_kuliah WHERE id_matkul = '$data'");

    return mysqli_affected_rows($koneksi);
}

function registrasi($data) {
    $koneksi = koneksi();

    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($koneksi, "SELECT username FROM users WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah dipakai');
        </script>";
        return false;
    }

    // confirm password
    if($password !== $password2 ){
        echo "<script>
                alert('Password tidak sesuai');
        </script>";

        return false;
    }


    // password enkripsi
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($koneksi, "INSERT INTO users VALUES('$username', '$password')");

    return mysqli_affected_rows($koneksi);
    
}



?>