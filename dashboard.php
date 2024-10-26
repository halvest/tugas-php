<?php
require("./auth/config.php");
session_start();

if (@$_SESSION['status'] != "login") {
    header("location:./form_login.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }
        .sidebar {
            width: 250px;
            background: linear-gradient(135deg, #6f3ad0, #b565d9);
            color: #fff;
            padding-top: 30px;
            position: fixed;
            height: 100%;
        }
        .sidebar a {
            color: #d1d1d1;
            display: block;
            padding: 15px 20px;
            text-decoration: none;
            font-size: 16px;
            transition: background 0.3s;
        }
        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
        }
        .sidebar h2 {
            text-align: center;
            color: #ffc107;
            margin-bottom: 20px;
        }
        .container {
            margin-left: 270px;
            padding: 30px;
        }
        .header {
            padding: 20px;
            border-bottom: 2px solid #ccc;
        }
        .btn-custom {
            transition: 0.3s ease;
        }
        .btn-custom:hover {
            transform: scale(1.05);
        }
        .search-box {
            margin-bottom: 15px;
        }
        .table-responsive {
            overflow-y: auto;
            max-height: 500px;
            margin-top: 20px;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Dashboard</h2>
    <a href="./home.php"><i class="fas fa-home"></i> Home</a>
    <a href="./add.php"><i class="fas fa-plus-circle"></i> Tambah Data</a>
    <a href="./logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<div class="container">
    <div class="header">
        <h2>Daftar Pengguna</h2>
    </div>

    <div class="row search-box">
        <div class="col-md-6">
            <input type="text" id="searchInput" class="form-control" placeholder="Cari username...">
        </div>
        <div class="col-md-6 text-end">
            <a href="./add.php" class="btn btn-success btn-custom"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
    </div>

    <?php
        $sql = "SELECT * FROM user";
        $query = mysqli_query($connect, $sql);
    ?>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="userTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        while ($datauser = mysqli_fetch_array($query)) {
                            echo "<tr>";
                            echo "<td>" . $nomor . "</td>";
                            echo "<td>" . htmlspecialchars($datauser["username"]) . "</td>";
                            echo "<td>" . htmlspecialchars($datauser["password"]) . "</td>";
                            echo "<td>";
                            echo "<a href='./update.php?username=" . urlencode($datauser['username']) . "' class='btn btn-warning btn-sm'><i class='fas fa-edit'></i> Edit</a> ";
                            echo "<a href='./delete.php?username=" . urlencode($datauser['username']) . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Apakah Anda yakin ingin menghapus?')\"><i class='fas fa-trash-alt'></i> Hapus</a>";
                            echo "</td>";
                            echo "</tr>";
                            $nomor++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Fungsi Pencarian di Tabel
    document.getElementById('searchInput').addEventListener('input', function() {
        let filter = this.value.toUpperCase();
        let rows = document.querySelector("#userTable tbody").rows;
        
        for (let i = 0; i < rows.length; i++) {
            let username = rows[i].cells[1].textContent.toUpperCase();
            rows[i].style.display = username.includes(filter) ? "" : "none";
        }
    });
</script>
</body>
</html>