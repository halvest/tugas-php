<?php
include("./auth/config.php");
session_start();

if ($_SESSION['status'] != "login") {
    header("location:./form_login.php?pesan=belum_login");
    exit;
}

// Mendapatkan username dari parameter URL
$username = $_GET['username'];

// Buat query untuk mengambil data dari database berdasarkan username
$sql = mysqli_query($connect, "SELECT * FROM user WHERE username='$username'");
$user = mysqli_fetch_assoc($sql);

// Jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($sql) < 1) {
    die("Data tidak ditemukan...");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
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
        .container {
            max-width: 500px;
            width: 100%;
            padding: 20px;
        }
        .card {
            background-color: #ffffff;
            border: none;
            border-radius: 10px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease;
            color: #333;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .card-header {
            background-color: #6f3ad0;
            color: #fff;
            font-weight: 600;
            font-size: 1.5rem;
            text-align: center;
            padding: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .card-body {
            padding: 30px;
        }
        .form-control {
            transition: all 0.3s ease;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #6f3ad0;
        }
        .btn-update {
            width: 100%;
            font-weight: 600;
            background-color: #6f3ad0;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-update:hover {
            background-color: #5b28b0;
        }
        .btn-back {
            display: inline-block;
            margin-top: 15px;
            font-size: 0.9rem;
            color: #6f3ad0;
            text-decoration: none;
        }
        .btn-back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-user-edit"></i> Update User Data
            </div>
            <div class="card-body">
                <form action="update_action.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" readonly />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Baru:</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan password baru" required />
                    </div>
                    <button type="submit" class="btn btn-update" name="edit"><i class="fas fa-save"></i> Update</button>
                </form>
                <a href="./dashboard.php" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include("view_footer.php"); ?>
