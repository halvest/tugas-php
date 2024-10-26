<?php
require("./auth/config.php");
session_start();

if ($_SESSION['status'] != "login") {
    header("location:./form_login.php?pesan=belum_login");
}

// Simulasi jumlah pengguna (Anda bisa menggantinya dengan data dari database)
$total_users = 150; // Misalnya

// Pesan selamat datang
$username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            width: 100%;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            font-weight: 600;
            color: #343a40;
        }
        .card {
            transition: 0.3s ease;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card:hover {
            transform: scale(1.05);
        }
        .stats-card {
            text-align: center;
            padding: 30px;
            color: #fff;
        }
        .stats-card .icon {
            font-size: 40px;
            margin-bottom: 10px;
        }
        .btn-custom {
            transition: 0.3s ease;
        }
        .btn-custom:hover {
            transform: scale(1.05);
        }
        .welcome-message {
            font-size: 1.2em;
            margin-bottom: 20px;
            color: #495057;
            font-weight: 400;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Welcome to Your Dashboard</h1>
        <p class="welcome-message">Hello, <?php echo $username; ?>! Here’s a quick overview of the platform.</p>
    </div>

    <!-- Statistik Kartu -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card stats-card" style="background-color: #17a2b8;">
                <div class="icon"><i class="fas fa-users"></i></div>
                <h5>Total Users</h5>
                <p><?php echo $total_users; ?> Users</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stats-card" style="background-color: #28a745;">
                <div class="icon"><i class="fas fa-chart-line"></i></div>
                <h5>Active Sessions</h5>
                <p>12 Sessions</p> <!-- Example static number -->
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stats-card" style="background-color: #ffc107;">
                <div class="icon"><i class="fas fa-server"></i></div>
                <h5>Server Status</h5>
                <p>Online</p>
            </div>
        </div>
    </div>

    <!-- Kartu Fitur Utama -->
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-user-plus"></i> Manage Users</h5>
                    <p class="card-text">Add, edit, or delete users to manage access to the platform.</p>
                    <a href="./dashboard.php" class="btn btn-primary btn-custom">Go to User Management</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-cogs"></i> Settings</h5>
                    <p class="card-text">Adjust platform settings, themes, and manage your profile preferences.</p>
                    <a href="./settings.php" class="btn btn-secondary btn-custom">Go to Settings</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Button -->
    <div class="text-center">
        <a href="./logout.php" class="btn btn-danger btn-custom"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include("view_footer.php"); ?>