<?php
include('../koneksi.php');

// Validasi session dan role admin
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

// Ambil data mobil berdasarkan nopol
if (isset($_GET['id'])) {
    $nopol = $_GET['id'];
    $query = "SELECT * FROM tbl_mobil WHERE nopol='$nopol'";
    $result = mysqli_query($koneksi, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        // Data ditemukan, siap untuk diedit
    } else {
        echo "<script>alert('Data mobil tidak ditemukan!'); window.location.href='manajemen_mobil.php';</script>";
        exit;
    }
} else {
    header("Location: manajemen_mobil.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mobil - LuxRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">
    <div class="container mt-5">
        <h1>Edit Mobil</h1>
        <form action="proses_edit_mobil.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="nopol_lama" value="<?= $row['nopol']; ?>">

            <div class="mb-3">
                <label for="nopol" class="form-label">Nomor Polisi</label>
                <input type="text" class="form-control" id="nopol" name="nopol" value="<?= $row['nopol']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <input type="text" class="form-control" id="brand" name="brand" value="<?= $row['brand']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" id="type" name="type" value="<?= $row['type']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="date" class="form-control" id="tahun" name="tahun" value="<?= $row['tahun']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="<?= $row['harga']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto (Opsional)</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="tersedia" <?= $row['status'] == 'tersedia' ? 'selected' : ''; ?>>Tersedia</option>
                    <option value="tidak" <?= $row['status'] == 'tidak' ? 'selected' : ''; ?>>Tidak Tersedia</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="manajemen_mobil.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>
