<?php
include('../koneksi.php');
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}
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
        <a href="index.php">Dashboard</a>
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
        <h1 class="mb-4">Kelola Mobil</h1>
        
        <!-- Tombol untuk membuka modal tambah mobil -->
        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambahMobilModal">
            Tambah Mobil
        </button>

        <!-- Tabel untuk menampilkan mobil yang ada -->
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>No Polisi</th>
                    <th>Brand</th>
                    <th>Type</th>
                    <th>Tahun</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Aksi</th> <!-- Kolom Aksi -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Query untuk menampilkan data mobil dari database
                $query = "SELECT * FROM tbl_mobil";
                $result = mysqli_query($koneksi, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['nopol'] . "</td>";
                        echo "<td>" . $row['brand'] . "</td>";
                        echo "<td>" . $row['type'] . "</td>";
                        echo "<td>" . $row['tahun'] . "</td>";
                        echo "<td>" . $row['harga'] . "</td>";
                        echo "<td><img src='gambar/" . $row['foto'] . "' alt='Foto Mobil' width='100'></td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>
                                <a href='edit_mobil.php?id=" . $row['nopol'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='proses_hapus_mobil.php?id=" . $row['nopol'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Apakah Anda yakin ingin menghapus mobil ini?');\">Hapus</a>
                              </td>"; // Tombol Edit dan Hapus
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>Tidak ada data mobil</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal untuk tambah mobil -->
    <div class="modal fade" id="tambahMobilModal" tabindex="-1" aria-labelledby="tambahMobilModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahMobilModalLabel">Tambah Mobil</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="proses_tambah_mobil.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nopol" class="form-label">Nomor Polisi</label>
                            <input type="text" class="form-control" id="nopol" name="nopol" required>
                        </div>
                        <div class="mb-3">
                            <label for="brand" class="form-label">Brand</label>
                            <input type="text" class="form-control" id="brand" name="brand" required>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <input type="text" class="form-control" id="type" name="type" required>
                        </div>
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun</label>
                            <input type="date" class="form-control" id="tahun" name="tahun" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" required>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="tersedia">Tersedia</option>
                                <option value="tidak">Tidak Tersedia</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Tambah Mobil</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
