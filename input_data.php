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
}

$status = explode('|', $message)[0];
$display_message = explode('|', $message)[1] ?? $message;

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PETRALIB | Input Data Buku</title>
    <link rel="icon" href="favicon.png" type="image/png" sizes="32x32"> 
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #007bff; --dark-bg: #1e1e1e; --light-text: #ffffff;    
            --form-bg: #333; --header-bg: #1e1e1e;
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
        
        .data-box-container {
            display: flex; justify-content: center; align-items: flex-start; 
            padding: 100px 0 50px 0; flex-grow: 1; 
        }
        .data-box { 
            background-color: var(--form-bg); color: var(--light-text); padding: 40px 50px; 
            border-radius: 15px; width: 500px; text-align: left; 
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.5); border-top: 5px solid var(--primary-color);
        }
        .data-box h2 { 
            text-align: center; margin-bottom: 30px; font-weight: 800; color: var(--light-text);
        }
        .data-box label { 
            display: block; margin-top: 15px; margin-bottom: 8px; font-weight: 600; font-size: 0.9em;
        }
        .data-box input[type="text"], 
        .data-box input[type="number"], 
        .data-box textarea { 
            width: 100%; padding: 12px 20px; border: none; border-radius: 8px; box-sizing: border-box; 
            color: var(--dark-bg); background-color: #fff; margin-bottom: 15px;
        }
        .data-box textarea { resize: vertical; min-height: 100px; }
        .submit-btn {
            width: 100%; padding: 12px; margin-top: 20px; background-color: var(--primary-color); 
            color: white; border: none; border-radius: 8px; cursor: pointer; font-size: 1.1em; 
            font-weight: 600; transition: background-color 0.3s;
        }
        .submit-btn:hover { background-color: #0056b3; }

        .status-message {
            padding: 10px; margin-bottom: 20px; border-radius: 5px; text-align: center; font-weight: 600;
        }
        .status-message.success { 
            background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb;
        }
        .status-message.error { 
            background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;
        }

        .footer-credit {
            text-align: center; padding: 15px 0; background-color: var(--dark-bg); color: #aaa;
            font-size: 0.85em; border-top: 3px solid var(--primary-color); width: 100%; 
            position: fixed; bottom: 0; box-sizing: border-box;
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
            <a href="input_data.php" class="active">Input Data</a>
            <a href="show_data.php">Show Data</a>
            <a href="logout.php" class="login-btn">Log out</a>
        </div>
    </div>

    <div class="data-box-container">
        <div class="data-box">
            <h2>Input Data Buku Baru</h2>
            
            <?php if ($message): ?>
                <div class="status-message <?= htmlspecialchars($status) ?>">
                    <?= $display_message ?>
                </div>
            <?php endif; ?>

            <form action="input_action.php" method="POST">
                
                <label>Judul Buku *</label>
                <input type="text" name="judul" placeholder="Masukkan Judul Buku" required>
                
                <label>Penulis *</label>
                <input type="text" name="penulis" placeholder="Masukkan Nama Penulis" required>
                        
                <label>Tahun Terbit</label>
                <input type="number" name="tahun_terbit" placeholder="Tahun Terbit (misalnya: 2024)">
                        
                <label>Sinopsis</label>
                <textarea name="sinopsis" placeholder="Ringkasan singkat tentang buku"></textarea>
                
                <label>Penerbit</label>
                <input type="text" name="penerbit" placeholder="Masukkan Nama Penerbit">

                <label>Stok Buku</label>
                <input type="number" name="stok_buku" placeholder="Jumlah Stok Tersedia" min="0" required>

                <button type="submit" class="submit-btn">SIMPAN BUKU</button>
            </form>
        </div>
    </div>

    <div class="footer-credit">
        &copy; <?= date('Y') ?> PETRALIB. All rights reserved. | Dibuat oleh Jason NS XII-3/15
    </div>
</body>
</html>