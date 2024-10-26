<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data User</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6f3ad0, #b565d9);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: #333;
        }
        .container {
            max-width: 500px;
            width: 100%;
            padding: 25px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            text-align: center;
        }
        header {
            margin-bottom: 20px;
            color: #333;
            font-weight: 600;
        }
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s;
        }
        .input-group input:focus {
            border-color: #6f3ad0;
            outline: none;
        }
        .btn-primary {
            background-color: #6f3ad0;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            width: 100%;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #5b28b0;
        }
        .back-btn {
            display: inline-block;
            margin-top: 15px;
            color: #6f3ad0;
            text-decoration: none;
            font-weight: 600;
        }
        .back-btn:hover {
            text-decoration: underline;
        }
        .error {
            color: #dc3545;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <h2>Tambah Data User</h2>
    </header>
    <?php if (!empty($errorMessage)) : ?>
        <div class="error"><?= $errorMessage ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="input-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="input-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="input-group">
            <label for="password_confirm">Konfirmasi Password:</label>
            <input type="password" name="password_confirm" id="password_confirm" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
    </form>
    <a href="./dashboard.php" class="back-btn">Kembali ke Dashboard</a>
</div>

<?php include("view_footer.php"); ?>

</body>
</html>
