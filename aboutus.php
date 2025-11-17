<?php
include 'koneksi.php'; 

$founder = [
    'name' => 'Jason NS XII-3/15',
    'title' => 'Pendiri & Pengembang Utama',
    'quote' => 'Visi kami adalah menjadikan literasi digital mudah diakses oleh semua kalangan. Setiap buku adalah langkah menuju pengetahuan baru.',
    'image' => 'founder.jpeg',
    'bio' => [
        'Lulusan SMA Kristen PETRA 1 dengan spesialisasi pengembangan web.',
        'Berpengalaman 3 tahun di bidang digital library system dan belajar mengenai HTML, PHP, dan CSS.',
        'Membuat PETRALIB sebagai proyek PSAS dan untuk memajukan minat baca digital.'
    ]
];

$featured_books = [
    [
        'id' => 1,
        'title' => 'The Fox and The Grapes', 
        'author' => 'Aesop Digital', 
        'desc' => 'Kisah Rubah malang yang mencari makan di hutan dan mencari anggur.', 
        'image' => 'https://mir-s3-cdn-cf.behance.net/project_modules/max_1200_webp/1a6b1425608867.56348031e9b6f.jpeg' 
    ],
    [
        'id' => 2,
        'title' => 'Kelinci dan Kura-Kura', 
        'author' => 'Mandy Risutra', 
        'desc' => 'Mengeksplorasi kisah perlombaan kura-kura dan kelinci', 
        'image' => 'https://bukukita.com/babacms/displaybuku/40827_f.jpg'
    ],
    [
        'id' => 3,
        'title' => 'The King and The Brave Eagle', 
        'author' => 'Wisasongko', 
        'desc' => 'dongeng yang berbeda-beda ceritanya, tetapi yang paling terkenal adalah kisah Cindelaras dari Indonesia, yang memiliki kemiripan dengan tema tersebut.', 
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5sAWEs5zfLvNeDO_QrBdTWVVJBHjks7Ymqg&s'
    ],
];

$features = [
    [
        'image' => 'https://bukukita.com/babacms/displaybuku/98114_f.jpg',
        'title' => 'Akses Mudah & Cepat',
        'description' => [
            'Temukan ribuan buku dari berbagai kategori.',
            'Akses kapan saja, di mana saja dengan perangkat apapun.',
            'Antarmuka pengguna yang intuitif untuk pengalaman terbaik.',
        ]
    ],
    [
        'image' => 'https://marketplace.canva.com/EAFLWbzwibI/1/0/1003w/canva-putih-hijau-berwarna-hewan-hutan-sampul-buku-hTFrL1KCjMA.jpg',
        'title' => 'Koleksi Lengkap & Terkini',
        'description' => [
            'Dari fiksi klasik hingga non-fiksi terbaru.',
            'Pembaharuan rutin dengan judul-judul baru setiap minggu.',
            'Sumber daya pendidikan untuk semua jenjang.',
        ]
    ],
    [
        'image' => 'https://i.pinimg.com/736x/18/1c/80/181c80b58de0ed7bbf158703deb8a2d3.jpg',
        'title' => 'Dukungan Komunitas',
        'description' => [
            'Terhubung dengan sesama pembaca dan penulis.',
            'Dapatkan rekomendasi personal berdasarkan minat Anda.',
            'Berpartisipasi dalam diskusi dan acara literasi online.',
        ]
    ],
];

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PETRALIB | About us</title>
    <link rel="icon" href="favicon.png" type="image/png" sizes="32x32"> 
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #007bff; 
            --dark-bg: #1e1e1e;       
            --light-text: #ffffff;    
            --accent-bg: #f8f9fa;     
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
        }
        
        .logo { 
            display: flex; 
            align-items: center;
        }
        .logo img {
            height: 35px;
            width: auto; 
            display: block;
            margin-right: 10px;
        }
        .logo-text {
            font-size: 24px; 
            font-weight: 800; 
            color: var(--primary-color);
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
            padding-top: 50px;
            padding-bottom: 80px;
            flex-grow: 1;
        }
        .hero-about {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('placeholder_library_bg.jpg'); 
            background-size: cover;
            background-position: center;
            color: var(--light-text);
            padding: 80px 50px;
            text-align: center;
            margin-bottom: 50px;
        }
        .hero-about h1 {
            font-size: 3.5em;
            margin-bottom: 15px;
            font-weight: 800;
        }
        .hero-about p {
            font-size: 1.2em;
            max-width: 800px;
            margin: 0 auto;
        }

        .section {
            max-width: 1200px; 
            margin: 0 auto 50px;
            padding: 0 20px;
        }
        .section h2 {
            font-size: 2em;
            color: var(--dark-bg);
            margin-bottom: 10px;
            font-weight: 700;
            text-align: center;
        }
        .section .underline {
            width: 80px;
            height: 4px;
            background-color: var(--primary-color);
            margin: 5px auto 30px;
            border-radius: 2px;
        }
        
        .carousel-container {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 30px 0;
            overflow: hidden; 
            margin-bottom: 50px; 
        }

        .book-slide {
            display: none; 
            width: 800px;
            background-color: var(--light-text);
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            animation: fadeIn 0.8s;
        }

        .book-slide.active {
            display: flex; 
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .book-cover {
            width: 200px;
            height: 250px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            margin-right: 30px;
        }
        
        .book-info h3 {
            color: var(--primary-color);
            font-size: 1.8em;
            margin-top: 0;
            margin-bottom: 5px;
            font-weight: 700;
        }
        .book-info p {
            color: #555;
            line-height: 1.6;
        }
        .book-info .author {
            font-style: italic;
            color: #777;
            margin-bottom: 15px;
            display: block;
        }
        
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: var(--dark-bg);
            font-weight: bold;
            font-size: 30px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .next {
            right: 150px; 
            border-radius: 3px 0 0 3px;
        }
        .prev {
            left: 150px; 
        }
        .prev:hover, .next:hover {
            background-color: var(--primary-color);
            color: var(--light-text);
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: 1fr; 
            gap: 40px; 
            margin-top: 40px;
            max-width: 900px; 
            margin-left: auto;
            margin-right: auto;
        }

        .feature-item {
            display: flex;
            align-items: center;
            background-color: var(--light-text);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border-left: 5px solid var(--secondary-color); 
        }

        .feature-item img {
            width: 70px; 
            height: 70px;
            object-fit: contain;
            margin-right: 25px;
            flex-shrink: 0; 
        }

        .feature-item .text-content h4 {
            margin-top: 0;
            margin-bottom: 5px;
            color: var(--dark-bg);
            font-size: 1.4em;
            font-weight: 700;
        }

        .feature-item .text-content p {
            margin: 0;
            color: #555;
            line-height: 1.5;
        }
        .feature-item .text-content ul {
            list-style: none;
            padding: 0;
            margin-top: 10px;
        }
        .feature-item .text-content ul li {
            margin-bottom: 5px;
            padding-left: 25px;
            position: relative;
            color: #666;
        }
        .feature-item .text-content ul li::before {
            content: '✓'; 
            color: var(--primary-color);
            position: absolute;
            left: 0;
            font-weight: bold;
        }
        
        @media (min-width: 768px) {
            .features-grid {
                grid-template-columns: 1fr 1fr; 
            }
            .feature-item {
                flex-direction: column; 
                text-align: center;
                border-left: none;
                border-top: 5px solid var(--secondary-color);
                align-items: center;
            }
            .feature-item img {
                margin-right: 0;
                margin-bottom: 15px;
            }
            .feature-item .text-content ul {
                text-align: left; 
            }
        }

        @media (min-width: 1024px) {
            .features-grid {
                grid-template-columns: 1fr 1fr 1fr; 
            }
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
        }
        .footer-credit strong {
            color: var(--primary-color);
            font-weight: 600;
        }
        .founder-section {
            background-color: #fff;
            padding: 60px 20px;
            text-align: center;
            border-top: 1px solid #ddd;
        }
        .founder-card {
            display: flex;
            flex-direction: column; 
            align-items: center;
            max-width: 600px;
            margin: 40px auto 0;
            padding: 30px;
            border-radius: 15px;
            background: var(--accent-bg);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }
        .founder-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            border: 4px solid var(--primary-color);
            box-shadow: 0 0 0 5px rgba(0, 123, 255, 0.3);
        }
        .founder-card h3 {
            margin: 0;
            font-size: 2em;
            color: var(--dark-bg);
        }
        .founder-card p.title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 15px;
        }
        .founder-card blockquote {
            font-style: italic;
            color: #666;
            margin: 20px 0;
            padding: 10px 0;
            border-top: 1px dashed #ccc;
            border-bottom: 1px dashed #ccc;
        }
        .founder-card ul {
            text-align: left;
            list-style-type: none;
            padding: 0;
            margin-top: 15px;
        }
        .founder-card ul li {
            margin-bottom: 8px;
            padding-left: 20px;
            position: relative;
            color: #555;
        }
        .founder-card ul li::before {
            content: '▶';
            color: var(--secondary-color);
            position: absolute;
            left: 0;
            font-size: 0.8em;
        }
        .founder-card {
            flex-direction: row; 
            text-align: left;
            align-items: flex-start;
        }
        .founder-image {
            margin-right: 30px;
            margin-bottom: 0;
            flex-shrink: 0;
        }
        .founder-info {
            flex-grow: 1;
        }
        .founder-card ul {
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="favicon.png" alt="Logo Website"> 
            <span class="logo-text">PETRALIB</span> 
        </div>
        <div class="nav">
            <a href="home.php">Landing Page</a>
            <a href="aboutus.php" class="active">About Us</a>
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
        <div class="hero-about">
            <h1>Tentang PETRALIB</h1>
            <p>Mendukung literasi dan pengetahuan digital, kami hadir untuk menjadi sumber daya literasi utama Anda. Kami percaya bahwa pengetahuan harus dapat diakses oleh semua orang.</p>
        </div>

        <div class="section">
            <h2>Koleksi Unggulan Kami 📚</h2>
            <div class="underline"></div>
            
            <div class="carousel-container">
                
                <?php foreach ($featured_books as $index => $book): ?>
                    <div class="book-slide <?= $index === 0 ? 'active' : '' ?>" data-index="<?= $index ?>">
                        <img src="<?= htmlspecialchars($book['image']) ?>" alt="Cover <?= htmlspecialchars($book['title']) ?>" class="book-cover">
                        <div class="book-info">
                            <h3><?= htmlspecialchars($book['title']) ?></h3>
                            <span class="author">Oleh: <?= htmlspecialchars($book['author']) ?></span>
                            <p><?= htmlspecialchars($book['desc']) ?></p>
                            <p style="margin-top: 20px; font-weight: 600;">Baca sinopsis lengkapnya di halaman Data Buku.</p>
                        </div>
                    </div>
                <?php endforeach; ?>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            
            <p style="text-align: center; margin-top: 20px; color: #777;">Gunakan panah di samping untuk melihat buku unggulan lainnya.</p>

        </div>

        

<div class="section" style="margin-top: 80px;">
            <h2>Mengapa Memilih PETRALIB? ✨</h2>
            <div class="underline"></div>
            <p style="text-align: center; margin-bottom: 40px; color: #555;">Kami berkomitmen untuk menyediakan pengalaman literasi digital terbaik untuk Anda.</p>

            <div class="features-grid">
                <?php foreach ($features as $feature): ?>
                    <div class="feature-item">
                        <img src="<?= htmlspecialchars($feature['image']) ?>" alt="Ikon <?= htmlspecialchars($feature['title']) ?>">
                        <div class="text-content">
                            <h4><?= htmlspecialchars($feature['title']) ?></h4>
                            <ul>
                                <?php foreach ($feature['description'] as $line): ?>
                                    <li><?= htmlspecialchars($line) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="section founder-section">
            <h2>Mengenal Pendiri Kami 👨‍💻</h2>
            <div class="underline"></div>
            <div class="founder-card">
                <img src="<?= htmlspecialchars($founder['image']) ?>" alt="Foto Founder Jason NS" class="founder-image">
                <div class="founder-info">
                    <h3><?= htmlspecialchars($founder['name']) ?></h3>
                    <p class="title"><?= htmlspecialchars($founder['title']) ?></p>
                    <blockquote>
                        "<?= htmlspecialchars($founder['quote']) ?>"
                    </blockquote>
                    <h4>Biografi Singkat:</h4>
                    <ul>
                        <?php foreach ($founder['bio'] as $line): ?>
                            <li><?= htmlspecialchars($line) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        
</div>

    <div class="footer-credit">
        &copy; <?= date('Y') ?> PETRALIB. All rights reserved. | Dibuat oleh Jason NS XII-3/15
    </div>

    <script>
        let slideIndex = 0;
        showSlides(slideIndex);

        function plusSlides(n) {
          showSlides(slideIndex += n);
        }

        function showSlides(n) {
          let i;
          let slides = document.getElementsByClassName("book-slide");
          
          if (n >= slides.length) {slideIndex = 0}    
          if (n < 0) {slideIndex = slides.length - 1}
          
          for (i = 0; i < slides.length; i++) {
            slides[i].classList.remove('active');
          }
          
          slides[slideIndex].classList.add('active');
        }
    </script>
</body>
</html>