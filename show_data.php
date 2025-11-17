<?php
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$message = "";

if (isset($_SESSION['input_message'])) {
    $message = $_SESSION['input_message'];
    unset($_SESSION['input_message']); 
} elseif (isset($_SESSION['delete_message'])) {
    $message = $_SESSION['delete_message'];
    unset($_SESSION['delete_message']);
} elseif (isset($_SESSION['update_message'])) {
    $message = $_SESSION['update_message'];
    unset($_SESSION['update_message']);
}

$status = explode('|', $message)[0];
$display_message = explode('|', $message)[1] ?? $message;

$query = "SELECT * FROM buku ORDER BY judul ASC";
$result = mysqli_query($koneksi, $query);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PETRALIB | Show Data Buku</title>
    <link rel="icon" href="favicon.png" type="image/png" sizes="32x32"> 
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #007bff; --dark-bg: #1e1e1e; --light-text: #ffffff; --header-bg: #1e1e1e;
        }

        body { 
            font-family: 'Poppins', sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;
            color: #333; display: flex; flex-direction: column; min-height: 100vh;
            padding-bottom: 50px;
        }
        .header { 
            background-color: var(--header-bg); color: var(--light-text); display: flex; 
            justify-content: space-between; align-items: center; padding: 15px 50px; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); width: 100%; box-sizing: border-box;
            position: fixed; top: 0; z-index: 1000;
        }
        .nav a { text-decoration: none; color: var(--light-text); margin-left: 25px; padding: 8px 12px; transition: color 0.3s, border-bottom 0.3s; }
        .nav a:hover { color: var(--primary-color); }
        .nav a.active { color: var(--primary-color); border-bottom: 2px solid var(--primary-color); font-weight: 600; }
        .login-btn { background-color: darkred; color: white !important; padding: 10px 20px; border-radius: 25px; text-decoration: none; font-weight: 600; }

        .content-wrapper {
            padding: 100px 50px 50px 50px; flex-grow: 1;
        }
        .content-wrapper h2 {
            font-weight: 800; color: var(--dark-bg); margin-bottom: 30px; text-align: center;
        }

        .status-message {
            max-width: 1200px; margin: 0 auto 20px; padding: 15px; border-radius: 8px; 
            text-align: center; font-weight: 600; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .status-message.success { 
            background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb;
        }
        .status-message.error { 
            background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;
        }

        .data-table-container {
            max-width: 100%; margin: 0 auto; background-color: #fff; padding: 20px;
            border-radius: 10px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); overflow-x: auto;
        }
        .data-table {
            width: 100%; border-collapse: collapse; font-size: 0.85em; text-align: left;
            min-width: 900px; 
        }
        .data-table th, .data-table td {
            padding: 10px 12px; border-bottom: 1px solid #ddd;
        }
        .data-table th {
            background-color: var(--primary-color); color: var(--light-text);
            font-weight: 600; text-transform: uppercase;
        }
        .data-table tr:hover { background-color: #f1f1f1; }
        
        .sinopsis-cell {
            max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        
        .action-btn {
            padding: 6px 10px; text-decoration: none; border-radius: 5px; font-size: 0.85em;
            margin: 2px; display: inline-block; transition: opacity 0.3s;
        }
        .action-btn:hover { opacity: 0.8; }
        .update { background-color: #f0ad4e; color: #333; }
        .delete { background-color: #dc3545; color: white; }

        .footer-credit {
            text-align: center; padding: 15px 0; background-color: var(--dark-bg); 
            color: #aaa; font-size: 0.85em; border-top: 3px solid var(--primary-color); 
            width: 100%; position: fixed; bottom: 0; box-sizing: border-box;
        }
        .footer-credit strong { color: var(--primary-color); font-weight: 600; }
        .logo { font-size: 24px; font-weight: 800; color: var(--primary-color); Display: flex; }
        .logo img {
            height: 35px;
            width: auto; 
            display: block;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
        <img src="favicon.png" alt="Logo Website"> PETRALIB
        </div>
        <div class="nav">
            <a href="input_data.php">Input Data</a>
            <a href="show_data.php" class="active">Show Data</a>
            <a href="logout.php" class="login-btn">Log out</a>
        </div>
    </div>

    <div class="content-wrapper">
        <h2>Daftar Koleksi Buku PETRALIB</h2>

        <?php if ($message): ?>
            <div class="status-message <?= htmlspecialchars($status) ?>">
                <?= $display_message ?>
            </div>
        <?php endif; ?>

        <div class="data-table-container">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Tahun Terbit</th>
                            <th>Penerbit</th>
                            <th>Stok Buku</th>
                            <th>Sinopsis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id_buku']) ?></td>
                            <td><?= htmlspecialchars($row['judul']) ?></td>
                            <td><?= htmlspecialchars($row['penulis']) ?></td>
                            <td><?= htmlspecialchars($row['tahun_terbit'] ?? '-') ?></td>
                            <td><?= htmlspecialchars($row['penerbit'] ?? '-') ?></td>
                            <td><?= htmlspecialchars($row['stok_buku'] ?? '0') ?></td>
                            <td class="sinopsis-cell" title="<?= htmlspecialchars($row['sinopsis']) ?>">
                                <?= htmlspecialchars($row['sinopsis']) ?>
                            </td>
                            <td>
                                <a href="update.php?id_buku=<?= $row['id_buku'] ?>" class="action-btn update">Update</a>
                                <a href="delete.php?id_buku=<?= $row['id_buku'] ?>" class="action-btn delete" onclick="return confirm('Apakah Anda yakin ingin menghapus buku <?= htmlspecialchars($row['judul']) ?>?')">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p style="text-align: center; padding: 20px;">Belum ada data buku yang tersedia. Silakan input data buku baru.</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="footer-credit">
        &copy; <?= date('Y') ?> PETRALIB. All rights reserved. | Dibuat oleh Jason NS XII-3/15
    </div>
</body>
</html>