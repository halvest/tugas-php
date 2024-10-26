<?php
require ("./auth/config.php");
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6f3ad0, #b565d9);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .logout-container {
            text-align: center;
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 420px;
            width: 100%;
        }
        .logout-container h2 {
            color: #6f3ad0;
            margin-bottom: 15px;
            font-size: 1.8em;
        }
        .logout-container p {
            color: #555;
            margin-bottom: 10px;
        }
        .logout-icon {
            font-size: 60px;
            color: #6f3ad0;
            margin-bottom: 20px;
            animation: bounce 1s ease infinite;
        }
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .spinner {
            margin-top: 20px;
            border: 4px solid #f3f3f3;
            border-radius: 50%;
            border-top: 4px solid #6f3ad0;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <i class="fas fa-sign-out-alt logout-icon"></i>
        <h2>Anda berhasil logout</h2>
        <p>Terima kasih telah menggunakan layanan kami.</p>
        <p>Anda akan dialihkan ke halaman login dalam beberapa detik...</p>
        <div class="spinner"></div>
    </div>

    <?php
    // Redirect ke form_login.php setelah 3 detik
    header("Refresh: 3; url=./form_login.php");
    exit();
    ?>
</body>
</html>

<?php include("view_footer.php"); ?>
