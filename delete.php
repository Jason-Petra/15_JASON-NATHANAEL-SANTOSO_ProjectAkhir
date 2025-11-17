<?php
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$id_buku = isset($_GET['id_buku']) ? mysqli_real_escape_string($koneksi, $_GET['id_buku']) : null;

if (!$id_buku) {
    $_SESSION['delete_message'] = "error|ID Buku tidak valid.";
    header("Location: show_data.php");
    exit();
}

$check_query = "SELECT judul FROM buku WHERE id_buku = '{$id_buku}'";
$check_result = mysqli_query($koneksi, $check_query);
$row = mysqli_fetch_assoc($check_result);
$judul_buku = $row['judul'] ?? 'Data Buku';

$query_delete = "DELETE FROM buku WHERE id_buku = '{$id_buku}'";

if (mysqli_query($koneksi, $query_delete)) {
    $_SESSION['delete_message'] = "success|Buku {$judul_buku} berhasil dihapus!";
} else {
    $_SESSION['delete_message'] = "error|Gagal menghapus data buku. Error: " . mysqli_error($koneksi);
}

header("Location: show_data.php");
exit();
?>