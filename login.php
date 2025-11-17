<?php
include 'koneksi.php';

if (isset($_SESSION['username'])) {
    header("Location: input_data.php");
    exit();
}

$message = "";

if (isset($_SESSION['register_message'])) {
    $parts = explode('|', $_SESSION['register_message']);
    $status = $parts[0];
    $display_message = $parts[1] ?? $message;

    if ($status == 'success' || $status == 'error') {
        $message = $display_message;
    }
    unset($_SESSION['register_message']); 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $query = "SELECT username FROM data WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);
    $user_found = mysqli_num_rows($result);

    if ($user_found > 0) {
        $_SESSION['username'] = $username;
        header("Location: input_data.php");
        exit();
    } else {
        $message = "Username atau Password salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PETRALIB | Login</title>
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
            font-family: 'Poppins', sans-serif; 
            margin: 0; 
            display: flex; 
            flex-direction: column;
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
            background: linear-gradient(135deg, #eee, #ccc);
            padding-bottom: 50px;
        }
        
        .header { 
            background-color: var(--header-bg);
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

        .login-box { 
            background-color: var(--form-bg); 
            padding: 50px 40px; 
            border-radius: 15px; 
            width: 380px; 
            color: var(--light-text); 
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            border-top: 5px solid var(--primary-color);
            margin-top: 80px;
        }
        .login-box h2 { 
            text-align: center; margin-bottom: 40px; font-weight: 800; color: var(--primary-color);
        }
        
        .input-group { margin-bottom: 25px; }
        .input-group label { display: block; margin-bottom: 8px; font-weight: 600; font-size: 0.9em; }
        .input-group input { 
            width: 100%; padding: 12px 20px; border: none; border-radius: 8px; box-sizing: border-box; color: var(--dark-bg);
            background-color: #fff; transition: box-shadow 0.3s;
        }
        .input-group input:focus { box-shadow: 0 0 0 2px var(--primary-color); outline: none; }
        
        .login-btn-form { 
            width: 100%; padding: 12px; margin-top: 30px; background-color: var(--primary-color); 
            color: white; border: none; border-radius: 8px; cursor: pointer; font-size: 1.1em; font-weight: 600;
            transition: background-color 0.3s;
        }
        .login-btn-form:hover { background-color: #0056b3; }
        
        .signup-link { text-align: center; font-size: 0.9em; margin-top: 25px; color: #ccc; }
        .signup-link a { 
            color: var(--primary-color); text-decoration: none; font-weight: 600; transition: color 0.3s;
        }
        .signup-link a:hover { color: white; }
        
        .status-message { color: yellow; text-align: center; font-weight: 600; padding-bottom: 10px; }
        .status-message.success { color: #d4edda; } 
        .status-message.error { color: #f8d7da; } 

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
            <a href="login.php" class="login-btn active">Log In</a>
            <a href="register.php" class="register-btn">Register</a>
        </div>
    </div>
    
    <div class="login-box">
        <h2>Login PETRALIB</h2>
        
        <?php if ($message): ?>
            <?php 
                $status_class = (strpos($message, 'berhasil') !== false || strpos($message, 'sukses') !== false) ? 'success' : 'error';
            ?>
            <p class="status-message <?= $status_class ?>"><?= $message ?></p>
        <?php endif; ?>
        
        <form method="POST" action="login.php">
            <div class="input-group">
                <label for="username">USERNAME</label>
                <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
            </div>
            <div class="input-group">
                <label for="password">PASSWORD</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
            </div>
            <button type="submit" class="login-btn-form">LOG IN</button>
        </form>
        <p class="signup-link">Belum punya akun? <a href="register.php">Daftar Sekarang</a></p>
    </div>

    <div class="footer-credit">
        &copy; <?= date('Y') ?> PETRALIB. All rights reserved. | Dibuat oleh Jason NS XII-3/15
    </div>
</body>
</html>