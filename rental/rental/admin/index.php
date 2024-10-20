<?php
include ('../koneksi.php');
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}
// Mengambil jumlah total user dan petugas dari database
$query_total_user = "SELECT COUNT(*) AS total_user FROM user WHERE role = 'petugas'";
$result_total_user = mysqli_query($koneksi, $query_total_user);
$row_total_user = mysqli_fetch_assoc($result_total_user);

$query_total_member = "SELECT COUNT(*) AS total_member FROM member";
$result_total_member = mysqli_query($koneksi, $query_total_member);
$row_total_member = mysqli_fetch_assoc($result_total_member);

$query_total_mobil = "SELECT COUNT(*) AS total_mobil FROM tbl_mobil";
$result_total_mobil = mysqli_query($koneksi, $query_total_mobil);
$row_total_mobil = mysqli_fetch_assoc($result_total_mobil);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - LuxRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
            color: white;
            min-height: 100vh;
        }

        .sidebar {
            background-color: #212529;
            min-width: 250px;
            max-width: 250px;
            min-height: 100vh;
            padding: 20px;
            position: fixed;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            font-size: 1.1rem;
            display: block;
            margin-bottom: 15px;
        }

        .sidebar a:hover {
            color: #ff6f61;
        }

        .navbar {
            margin-left: 250px;
            background-color: #212529;
        }

        .content {
            margin-left: 250px;
            padding: 30px;
        }

        .btn-logout {
            background-color: #ff6f61;
            border: none;
        }

        .btn-logout:hover {
            background-color: #e65c4f;
        }

        .card {
            background-color: #495057;
            border: none;
        }

        .card:hover {
            transform: scale(1.02);
            transition: 0.3s;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-center fw-bold">Admin</h3>
        <hr class="text-white">
        <a href="#">Dashboard</a>
        <a href="#">Kelola Pengguna</a>
        <a href="manajemen_mobil.php">Manajemen Mobil</a>
        <a href="#">Laporan</a>
        <a href="../logout.php" class="btn btn-logout w-100 mt-4">Logout</a>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Welcome, <?= $_SESSION['user']; ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="content">
        <h1 class="mb-4">Dashboard</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center p-4 shadow">
                    <h4 class="card-title"><?php echo $row_total_user['total_user']; ?></h4>
                    <p class="card-text display-6">Jumlah Petugas</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center p-4 shadow">
                    <h4 class="card-title"><?php echo $row_total_mobil['total_mobil']; ?></h4>  
                    <p class="card-text display-6">Jumlah Mobil</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center p-4 shadow">
                    <h4 class="card-title"><?php echo $row_total_member['total_member']; ?></h4>
                    <p class="card-text display-6">Jumlah Member</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
