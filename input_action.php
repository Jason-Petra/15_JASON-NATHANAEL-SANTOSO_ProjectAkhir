<?php
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $penulis = mysqli_real_escape_string($koneksi, $_POST['penulis']);
    $tahun_terbit = !empty($_POST['tahun_terbit']) ? (int)$_POST['tahun_terbit'] : 'NULL'; 
    $sinopsis = mysqli_real_escape_string($koneksi, $_POST['sinopsis']);
    
    $penerbit = mysqli_real_escape_string($koneksi, $_POST['penerbit'] ?? '');
    $stok_buku = !empty($_POST['stok_buku']) ? (int)$_POST['stok_buku'] : 0; 

    $query_insert = "INSERT INTO buku (judul, penulis, tahun_terbit, sinopsis, penerbit, stok_buku) 
                     VALUES ('$judul', '$penulis', {$tahun_terbit}, '$sinopsis', '$penerbit', {$stok_buku})";

    if (mysqli_query($koneksi, $query_insert)) {
        $_SESSION['input_message'] = "success|Buku {$judul} oleh {$penulis} berhasil diinput!";
    } else {
        $_SESSION['input_message'] = "error|Gagal menginput data buku. Error: " . mysqli_error($koneksi);
    }
    
    header("Location: input_data.php");
    exit();
} else {
    header("Location: input_data.php");
    exit();
}
?>