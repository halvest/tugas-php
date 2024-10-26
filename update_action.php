<?php
include("./auth/config.php");
session_start();

// Memastikan pengguna sudah login
if ($_SESSION['status'] != "login") {
    header("location:./form_login.php?pesan=belum_login");
    exit();
}

// Mendapatkan data yang dikirimkan dari form update
$username = $_POST['username'];
$password = $_POST['password'];

// Validasi data yang diperlukan
if (empty($username) || empty($password)) {
    echo "<div class='alert alert-danger mt-3 text-center'>Username dan password tidak boleh kosong!</div>";
    exit();
}

// Mengenkripsi password baru
$password_encrypted = md5($password);  // Gunakan hash yang lebih kuat seperti bcrypt di masa mendatang

// Buat query untuk update data user berdasarkan username
$sql = "UPDATE user SET password='$password_encrypted' WHERE username='$username'";
$query = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Status</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6f3ad0, #b565d9);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff;
        }
        .notification {
            max-width: 450px;
            padding: 30px;
            text-align: center;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            animation: fadeIn 0.5s ease;
            color: #333;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .notification p {
            font-size: 1.3rem;
            font-weight: 500;
        }
        .success {
            color: #28a745;
        }
        .error {
            color: #dc3545;
        }
        .btn {
            margin-top: 20px;
            font-weight: 600;
            color: #fff;
            background-color: #6f3ad0;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #5b28b0;
        }
    </style>
</head>
<body>
    <div class="notification">
        <?php if ($query) : ?>
            <p class="success"><i class="fas fa-check-circle"></i> Data berhasil diperbarui!</p>
            <a href="dashboard.php" class="btn"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
        <?php else : ?>
            <p class="error"><i class="fas fa-exclamation-circle"></i> Gagal memperbarui data: <?= mysqli_error($connect); ?></p>
            <a href="dashboard.php" class="btn"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include("view_footer.php"); ?>
