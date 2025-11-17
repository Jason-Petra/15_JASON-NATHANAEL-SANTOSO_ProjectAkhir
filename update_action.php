<?php
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id_buku = mysqli_real_escape_string($koneksi, $_POST['id_buku']);
    
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $penulis = mysqli_real_escape_string($koneksi, $_POST['penulis']);
    $tahun_terbit = !empty($_POST['tahun_terbit']) ? (int)$_POST['tahun_terbit'] : 'NULL'; 
    $sinopsis = mysqli_real_escape_string($koneksi, $_POST['sinopsis']);
    
    $penerbit = mysqli_real_escape_string($koneksi, $_POST['penerbit'] ?? '');
    $stok_buku = !empty($_POST['stok_buku']) ? (int)$_POST['stok_buku'] : 0; 

    $query_update = "UPDATE buku SET 
                     judul = '$judul', 
                     penulis = '$penulis', 
                     tahun_terbit = {$tahun_terbit}, 
                     sinopsis = '$sinopsis',
                     penerbit = '$penerbit',
                     stok_buku = {$stok_buku}
                     WHERE id_buku = '{$id_buku}'";

    if (mysqli_query($koneksi, $query_update)) {
        $_SESSION['update_message'] = "success|Buku {$judul} berhasil diupdate!";
    } else {
        $_SESSION['update_message'] = "error|Gagal mengupdate data buku. Error: " . mysqli_error($koneksi);
    }
    
    header("Location: show_data.php");
    exit();
} else {
    header("Location: show_data.php");
    exit();
}
?>