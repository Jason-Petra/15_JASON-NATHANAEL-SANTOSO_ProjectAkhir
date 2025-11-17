<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap'] ?? '');
    $username = mysqli_real_escape_string($koneksi, $_POST['username'] ?? '');
    $email = mysqli_real_escape_string($koneksi, $_POST['email'] ?? '');
    $password = mysqli_real_escape_string($koneksi, $_POST['password'] ?? '');
    $age = !empty($_POST['age']) ? (int)$_POST['age'] : 'NULL'; 
    $asal_sekolah = mysqli_real_escape_string($koneksi, $_POST['asal_sekolah'] ?? '');
    $notelp = mysqli_real_escape_string($koneksi, $_POST['notelp'] ?? '');
    $jenjang = mysqli_real_escape_string($koneksi, $_POST['jenjang'] ?? '');
    $kota = mysqli_real_escape_string($koneksi, $_POST['kota'] ?? '');

    $check_query = "SELECT username FROM data WHERE username = '$username'";
    $check_result = mysqli_query($koneksi, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['register_message'] = "error|Gagal: Username {$username} sudah digunakan. Silakan coba username lain.";
        header("Location: register.php");
        exit();
    }
    
    $query_insert = "INSERT INTO data (nama_lengkap, username, email, password, age, asal_sekolah, notelp, jenjang, kota) 
                     VALUES (
                        '$nama_lengkap', 
                        '$username', 
                        '$email', 
                        '$password', 
                        {$age},
                        '$asal_sekolah',
                        '$notelp',
                        '$jenjang',
                        '$kota'
                     )";

    if (mysqli_query($koneksi, $query_insert)) {
        $_SESSION['register_message'] = "success|Registrasi berhasil! Silakan Login dengan username Anda.";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['register_message'] = "error|Gagal mendaftar. Error: " . mysqli_error($koneksi);
        header("Location: register.php");
        exit();
    }

} else {
    header("Location: register.php");
    exit();
}
?>