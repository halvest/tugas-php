<?php
$errorMessage = @$_GET["error"];
session_start();

if (@$_SESSION['status'] == "login") {
    header("location:./dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6f3ad0, #b565d9);
            font-family: 'Poppins', sans-serif;
            color: #333;
        }
        .login-container {
            max-width: 400px;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            background-color: #ffffff;
        }
        .image-container img {
            width: 100px;
            display: block;
            margin: 0 auto 20px;
            border-radius: 50%;
            animation: logoEntrance 1s ease-out;
        }
        @keyframes logoEntrance {
            0% { transform: scale(0.8); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        h3 {
            color: #6f3ad0;
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-label {
            color: #6f3ad0;
            font-weight: 500;
        }
        .btn-custom {
            width: 100%;
            background-color: #6f3ad0;
            color: #fff;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #ffc107;
        }
        .error-message {
            color: #ff4d4d;
            font-size: 0.9em;
            margin-bottom: 10px;
            text-align: center;
        }
        .register {
            font-size: 0.9em;
            color: #555;
        }
        .register a {
            color: #6f3ad0;
            text-decoration: none;
        }
        .register a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="login-container">
        <div class="image-container text-center">
            <img src="img/logocat.png" alt="Logo">
        </div>
        <h3>Login to Your Account</h3>

        <?php if (isset($errorMessage) && !empty($errorMessage)) : ?>
            <div class="error-message"><?php echo htmlspecialchars($errorMessage); ?></div>
        <?php endif; ?>

        <form action="login_action.php" method="POST" class="mt-3">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-custom mt-3">Login</button>
        </form>

        <div class="register mt-4 text-center">
            <p>Don't have an account? <a href="form_register.php">Register here</a></p>
        </div>
    </div>
</body>
</html>

<?php include("view_footer.php"); ?>
