<?php
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PETRALIB | Home</title>
    <link rel="icon" href="favicon.png" type="image/png" sizes="32x32"> 
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #007bff; 
            --dark-bg: #1e1e1e;       
            --light-text: #ffffff;    
            --accent-bg: #bdb3b3ff;     
            --secondary-color: #f0ad4e; 
        }
        
        body { 
            font-family: 'Poppins', sans-serif; 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box;
            background-color: var(--accent-bg);
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding-bottom: 50px; 
        }

        .header { 
            background-color: var(--dark-bg);
            color: var(--light-text);
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            padding: 15px 50px; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
            width: 100%;
            position: fixed; 
            top: 0;
            z-index: 1000;
            box-sizing: border-box;
        }
        .nav a { text-decoration: none; color: var(--light-text); margin-left: 25px; padding: 8px 12px; transition: color 0.3s, border-bottom 0.3s; }
        .nav a:hover { color: var(--primary-color); }
        .nav a.active { color: var(--primary-color); border-bottom: 2px solid var(--primary-color); font-weight: 600; }
        .login-btn, .register-btn { 
            padding: 10px 20px; 
            border-radius: 25px; 
            text-decoration: none; 
            transition: background-color 0.3s;
            font-weight: 600;
            margin-left: 10px; 
        }
        .login-btn { background-color: var(--primary-color); color: white !important; }
        .login-btn:hover { background-color: #0056b3; }
        .register-btn { background-color: #f0ad4e; color: black !important; }
        .register-btn:hover { background-color: #ec971f; }

        .content-wrapper {
            flex-grow: 1;
            padding-top: 80px; 
        }
        .section {
            padding: 60px 50px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .hero-section { 
            display: flex; 
            justify-content: space-between; 
            align-items: center;
            padding-top: 80px;
            padding-bottom: 80px;
        }
        .welcome-area { width: 55%; }
        .welcome-area h1 { font-size: 3.5em; font-weight: 800; line-height: 1.1; margin-bottom: 20px; }
        .welcome-area h1 span { color: var(--primary-color); }
        .welcome-area p { font-size: 1.1em; line-height: 1.6; margin-bottom: 30px; }
        .cta-button {
            background-color: var(--dark-bg);
            color: var(--light-text);
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            transition: background-color 0.3s;
            display: inline-block;
        }
        .cta-button:hover { background-color: #333; }
        
        .hero-image {
            width: 40%;
            height: 300px; 
            background-image: url('elib.png'); 
            background-size: cover;
            background-position: center;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            animation: fadeIn 1s ease-out; 
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .feature-section {
            background-color: #fff;
            padding: 60px 50px;
            text-align: center;
            border-top: 1px solid #ddd;
        }
        .feature-section h2 {
            font-size: 2.5em;
            font-weight: 800;
            margin-bottom: 40px;
        }
        .feature-grid {
            display: flex;
            justify-content: space-between;
            gap: 30px;
        }
        .feature-card {
            flex: 1;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid #eee;
            transition: transform 0.3s;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .feature-card h3 {
            color: var(--primary-color);
            margin-top: 15px;
            font-weight: 700;
        }
        .feature-card p {
            color: #555;
            font-size: 0.95em;
        }

        .quote-section {
            background-color: var(--primary-color);
            color: var(--light-text);
            text-align: center;
            padding: 80px 50px;
        }
        .quote-section blockquote {
            font-size: 1.8em;
            font-style: italic;
            max-width: 800px;
            margin: 0 auto 30px;
            line-height: 1.4;
            border: none;
        }
        .quote-section cite {
            display: block;
            font-size: 1.2em;
            font-weight: 600;
            color: #f0ad4e;
        }

        .footer-credit {
            text-align: center; 
            padding: 15px 0; 
            background-color: var(--dark-bg); 
            color: #aaa;
            font-size: 0.85em;
            border-top: 3px solid var(--primary-color); 
            width: 100%; 
            position: fixed; 
            bottom: 0;
            box-sizing: border-box;
            z-index: 1000;
        }
        .footer-credit strong {
            color: var(--primary-color);
            font-weight: 600;
        }
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
            <a href="home.php" class="active">Landing Page</a>
            <a href="aboutus.php">About Us</a>
            <?php 
            if (isset($_SESSION['username'])): 
            ?>
                <a href="input_data.php" style="margin-left: 40px;">Input Data</a>
                <a href="show_data.php">Show Data</a>
                <a href="logout.php" class="login-btn" style="background-color: darkred;">Log Out</a>
            <?php 
            else: 
            ?>
                <a href="login.php" class="login-btn">Log In</a>
                <a href="register.php" class="register-btn">Register</a>
            <?php 
            endif; 
            ?>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="section hero-section">
            <div class="welcome-area">
                <h1>Selamat Datang di <span>PETRALIB</span></h1>
                <p>Platform digital terdepan untuk akses mudah dan cepat ke berbagai koleksi literasi dan sumber daya pendidikan. Daftar atau masuk untuk memulai perjalanan literasi Anda!</p>
                
                <a href="<?= isset($_SESSION['username']) ? 'input_data.php' : 'register.php' ?>" class="cta-button">
                    <?= isset($_SESSION['username']) ? 'Mulai Input Data' : 'Daftar Sekarang &gt;' ?>
                </a>
            </div>
            <div class="hero-image"></div>
        </div>
        <div class="feature-section">
            <h2>Mengapa Memilih Petralib?</h2>
            <div class="feature-grid">
                <div class="feature-card">
                    <span style="font-size: 2.5em; color: var(--primary-color);">📖</span>
                    <h3>Koleksi Digital Luas</h3>
                    <p>Temukan ribuan judul dari berbagai genre, mulai dari fiksi klasik, buku akademik, hingga panduan praktis.</p>
                </div>
                <div class="feature-card">
                    <span style="font-size: 2.5em; color: var(--primary-color);">📱</span>
                    <h3>Akses Kapan Saja</h3>
                    <p>Baca di mana saja dan kapan saja, di perangkat apa pun. Perpustakaan Anda selalu ada di genggaman.</p>
                </div>
                <div class="feature-card">
                    <span style="font-size: 2.5em; color: var(--primary-color);">⭐</span>
                    <h3>Pembaruan Rutin</h3>
                    <p>Kami terus menambahkan koleksi terbaru dan terpopuler untuk memastikan Anda tidak ketinggalan tren literasi.</p>
                </div>
            </div>
        </div>
        <div class="quote-section">
            <blockquote>
                "Membaca adalah gerbang menuju dunia tanpa batas. PETRALIB membuat gerbang itu dapat diakses oleh semua orang."
            </blockquote>
            <cite>— Jason Nathanael Santoso</cite>
            <div style="margin-top: 40px; display: flex; justify-content: center; gap: 50px;">
                <h3 style="margin: 0; font-size: 2em;">1000+ <br><span style="font-size: 0.5em; font-weight: 400;">Koleksi Buku</span></h3>
                <h3 style="margin: 0; font-size: 2em;">100K+ <br><span style="font-size: 0.5em; font-weight: 400;">Pengguna Terdaftar</span></h3>
            </div>
        </div>
    </div>
    <div class="footer-credit">
        &copy; <?= date('Y') ?> PETRALIB. All rights reserved. | Dibuat oleh Jason NS XII-3/15
    </div>
</body>
</html>