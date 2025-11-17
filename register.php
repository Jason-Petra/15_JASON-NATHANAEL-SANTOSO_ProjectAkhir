<?php
include 'koneksi.php';

if (isset($_SESSION['username'])) {
    header("Location: input_data.php");
    exit();
}

$message = isset($_SESSION['register_message']) ? $_SESSION['register_message'] : '';
unset($_SESSION['register_message']); 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PETRALIB | Register</title>
    <link rel="icon" href="favicon.png" type="image/png" sizes="32x32"> 
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #007bff; 
            --dark-bg: #1e1e1e;       
            --light-text: #ffffff;    
            --form-bg: #333;
            --header-bg: #1e1e1e;
        }

        body { 
            font-family: 'Poppins', sans-serif; margin: 0; display: flex; flex-direction: column;
            justify-content: center; align-items: center; min-height: 100vh; 
            background: linear-gradient(135deg, #eee, #ccc); 
            padding-bottom: 50px;
        }
        
        .header { 
            background-color: var(--header-bg); color: var(--light-text); display: flex; 
            justify-content: space-between; align-items: center; padding: 15px 50px; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); width: 100%; position: fixed; 
            top: 0; z-index: 1000; box-sizing: border-box;
        }
        .nav a { 
            text-decoration: none; color: var(--light-text); margin-left: 25px; padding: 8px 12px; transition: color 0.3s, border-bottom 0.3s;
        }
        .nav a:hover { color: var(--primary-color); }
        .nav a.active { 
            color: var(--primary-color); border-bottom: 2px solid var(--primary-color); font-weight: 600; 
        }
        .login-btn, .register-btn { 
            padding: 10px 20px; border-radius: 25px; text-decoration: none; transition: background-color 0.3s; font-weight: 600; margin-left: 10px; 
        }
        .login-btn { background-color: var(--primary-color); color: white !important; }
        .login-btn:hover { background-color: #0056b3; color: white !important; }
        .register-btn { background-color: #f0ad4e; color: black !important; }
        .register-btn:hover { background-color: #ec971f; }

        .register-container { 
            background-color: var(--form-bg); padding: 40px 50px; border-radius: 15px; width: 450px; 
            color: var(--light-text); box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            border-top: 5px solid var(--primary-color); margin-top: 80px; margin-bottom: 20px;
        }
        .register-container h2 { 
            text-align: center; margin-bottom: 30px; font-weight: 800; color: var(--primary-color);
        }
        
        .input-group { display: flex; flex-direction: column; margin-bottom: 15px; }
        .register-container input, .register-container select { 
            width: 100%; padding: 12px 20px; border: none; border-radius: 8px; box-sizing: border-box; 
            color: var(--dark-bg); background-color: #fff; transition: box-shadow 0.3s; margin-bottom: 15px;
        }
        .register-container input:focus, .register-container select:focus {
            box-shadow: 0 0 0 2px var(--primary-color); outline: none;
        }
        
        .register-btn-form { 
            width: 100%; padding: 12px; margin-top: 20px; background-color: var(--primary-color); 
            color: white; border: none; border-radius: 8px; cursor: pointer; font-size: 1.1em; font-weight: 600;
            transition: background-color 0.3s;
        }
        .register-btn-form:hover { background-color: #0056b3; }
        
        .login-link { text-align: center; font-size: 0.9em; margin-top: 25px; color: #ccc; }
        .login-link a { 
            color: var(--primary-color); text-decoration: none; font-weight: 600; transition: color 0.3s;
        }
        .login-link a:hover { color: white; }
        
        .message { padding: 10px; margin-bottom: 15px; border-radius: 4px; text-align: center; font-weight: 600;}
        .success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }

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
            <a href="home.php">Landing Page</a>
            <a href="aboutus.php">About Us</a>
            <a href="login.php" class="login-btn">Log In</a>
            <a href="register.php" class="register-btn active">Register</a>
        </div>
    </div>
    
    <div class="register-container">
        <h2>Daftar Akun PETRALIB</h2>
        
        <?php if ($message): ?>
            <p class="message <?= (strpos($message, 'Gagal') !== false) ? 'error' : 'success' ?>">
                <?= $message ?>
            </p>
        <?php endif; ?>

        <form method="POST" action="register_action.php">
            <input type="text" name="nama_lengkap" placeholder="Nama Lengkap *" required>
            <input type="text" name="username" placeholder="Username *" required>
            <input type="email" name="email" placeholder="Email *" required>
            <input type="password" name="password" placeholder="Password *" required>
            <input type="number" name="age" placeholder="Usia">
            
            <input type="text" name="asal_sekolah" placeholder="Asal Sekolah">
            <input type="text" name="notelp" placeholder="No. Telepon">
            
            <select name="jenjang">
                <option value="">-- Pilih Jenjang --</option>
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA">SMA</option>
                <option value="Kuliah">Kuliah</option>
                <option value="Umum">Umum</option>
            </select>
            
            <input type="text" name="kota" placeholder="Kota">
            
            <button type="submit" class="register-btn-form">DAFTAR AKUN</button>
            <p class="login-link">Sudah punya akun? <a href="login.php">Login di sini</a></p>
        </form>
    </div>

    <div class="footer-credit">
        &copy; <?= date('Y') ?> PETRALIB. All rights reserved. | Dibuat oleh Jason NS XII-3/15
    </div>
</body>
</html>