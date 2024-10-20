<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxRent - Rental Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        /* Navbar transparan sepenuhnya */
        .navbar {
            background-color: transparent;
            position: absolute;
            width: 100%;
            z-index: 1000;
        }

        .navbar-nav .nav-link {
            font-size: 1.5rem;
            margin-right: 15px;
            font-weight: bold; /* Bold agar lebih terlihat */
            color: white !important;
            transition: color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #ff6f61 !important; /* Warna salmon saat di-hover */
        }

        /* Hero Section */
        .hero {
            background-image: url('porcshe.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .hero h1 {
            font-size: 3.5rem;
        }

        .btn-primary {
            background-color: #ff6f61;
            border: none;
        }

        /* Section abu-abu gelap */
        section {
            background-color: #2c2c2c;
            color: white;
        }

        /* Efek hover pada layanan */
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.05); /* Membuat kartu sedikit membesar */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Efek bayangan */
        }

        .card-body:hover {
            background-color: #ff6f61; /* Warna salmon saat hover */
            color: white;
        }

        /* Footer dengan warna abu-abu gelap */
        footer {
            background-color: #2c2c2c;
            color: white;
            padding: 20px 0;
        }

        footer a {
            color: #ff6f61;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
        .navbar-brand {
            font-size: 2rem;
        }

    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" href="#">LuxRent</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registrasi.php">Daftar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero text-center">
        <div>
            <h1 class="display-4 fw-bold">Rental Mobil Terbaik dan Terpercaya</h1>
            <p class="lead" style="font-size: 30px; color: salmon;"><b>Jelajahi perjalanan tanpa batas dengan mobil pilihan kami.</b></p>
        </div>
    </div>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Tentang Kami</h2>
                    <p>Kami menyediakan berbagai jenis mobil yang siap untuk disewa dan memberikan kenyamanan serta keamanan. Prioritas kami adalah memberikan pengalaman terbaik untuk pelanggan.</p>
                </div>
                <div class="col-md-6">
                    <img src="bo.jpg" class="img-fluid rounded" alt="Mobil" style="width: 100%; margin-left: 100px; height: 75%;">
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Layanan Kami</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Sewa Harian</h5>
                            <p class="card-text">Paket untuk perjalanan singkat dan cepat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Sewa Mingguan</h5>
                            <p class="card-text">Ideal untuk kebutuhan bisnis atau liburan keluarga.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Sewa Bulanan</h5>
                            <p class="card-text">Solusi terbaik untuk jangka panjang dengan harga terjangkau.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <p>&copy; 2024 LuxRent. All Rights Reserved.</p>
            <p>Follow us on <a href="#">Instagram</a> | <a href="#">Facebook</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
