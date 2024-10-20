<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas - LuxRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
            margin: 0;
            padding: 0;
            color: white;
        }

        .navbar {
            background-color: #212529;
            padding: 15px;
        }

        .navbar-brand {
            font-size: 2rem;
            color: #ff6f61 !important;
        }

        .navbar-nav .nav-link {
            font-size: 1.2rem;
            margin-right: 15px;
            font-weight: bold;
            color: white !important;
        }

        .navbar-nav .nav-link:hover {
            color: #ff6f61 !important;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            background-color: #495057;
            color: white;
        }

        .card-body:hover {
            background-color: #ff6f61;
            color: white;
        }

        footer {
            background-color: #212529;
            color: white;
            padding: 10px 0;
            position: absolute;
            width: 100%;
            bottom: 0;
        }

        footer a {
            color: #ff6f61;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#"><b>Lux</b>Rent</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kelola Pesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="container">
        <h1 class="text-center mb-4">Selamat Datang, Petugas</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Pesanan Baru</h5>
                        <p class="card-text">Kelola pesanan mobil baru yang masuk.</p>
                        <a href="#" class="btn btn-light">Kelola</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Mobil</h5>
                        <p class="card-text">Lihat dan kelola mobil yang tersedia untuk disewa.</p>
                        <a href="#" class="btn btn-light">Kelola</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Laporan</h5>
                        <p class="card-text">Lihat laporan transaksi dan sewa mobil.</p>
                        <a href="#" class="btn btn-light">Lihat Laporan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <p>&copy; 2024 LuxRent. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
