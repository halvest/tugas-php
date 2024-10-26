<?php
include("auth/config.php");

$username = $_POST['username'];
$password = md5($_POST['password']);

// Query untuk memasukkan data pengguna baru
$sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
$query = mysqli_query($connect, $sql);

// Jika query berhasil
if ($query) {
    $message = "Register Berhasil!";
    $type = "success";
} else {
    $message = "Maaf, username sudah terdaftar. Silakan login.";
    $type = "error";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .message-container {
            max-width: 500px;
            padding: 30px;
            text-align: center;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .message-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }
        .message-container h2 {
            color: #333;
            font-weight: 600;
            margin-bottom: 20px;
            font-size: 1.75rem;
        }
        .message {
            font-size: 1rem;
            padding: 20px;
            border-radius: 10px;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        .success {
            background-color: #28a745;
        }
        .error {
            background-color: #dc3545;
        }
        .back-btn {
            font-weight: 500;
            color: #ffffff;
            background-color: #007bff;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .back-btn:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        .icon {
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <h2>Status Registrasi</h2>
        <div class="message <?php echo $type; ?>">
            <?php if ($type == 'success') { ?>
                <i class="fas fa-check-circle icon"></i>
            <?php } else { ?>
                <i class="fas fa-exclamation-circle icon"></i>
            <?php } ?>
            <?php echo $message; ?>
        </div>
        <a href="form_login.php" class="back-btn">Kembali ke Halaman Login</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include("view_footer.php"); ?>
