<?php
include('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nopol = $_POST['nopol'];
    $brand = $_POST['brand'];
    $type = $_POST['type'];
    $tahun = $_POST['tahun'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];

    // Cek apakah nopol sudah ada di database
    $checkQuery = "SELECT * FROM tbl_mobil WHERE nopol='$nopol'";
    $checkResult = mysqli_query($koneksi, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script>alert('Nomor polisi sudah terdaftar! Silakan gunakan nomor lain.'); window.history.back();</script>";
        exit;
    }

    // Proses upload foto
    $foto = $_FILES['foto'];
    $fotoName = $foto['name'];
    $fotoTmpName = $foto['tmp_name'];
    $fotoError = $foto['error'];

    // Tentukan ekstensi yang diizinkan
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $fotoExtension = strtolower(pathinfo($fotoName, PATHINFO_EXTENSION));

    if ($fotoError === 0) {
        if (!in_array($fotoExtension, $allowedExtensions)) {
            echo "<script>alert('Ekstensi file tidak diperbolehkan. Hanya diperbolehkan: .jpg, .jpeg, .png, .gif'); window.history.back();</script>";
            exit;
        }

        // Tentukan folder untuk menyimpan foto
        $uploadDir = 'gambar/';
        $fotoDestination = $uploadDir . basename($fotoName);

        // Pindahkan file yang diunggah ke folder tujuan
        if (move_uploaded_file($fotoTmpName, $fotoDestination)) {
            // Query untuk menyimpan data mobil
            $query = "INSERT INTO tbl_mobil (nopol, brand, type, tahun, harga, foto, status) VALUES ('$nopol', '$brand', '$type', '$tahun', '$harga', '$fotoName', '$status')";
            if (mysqli_query($koneksi, $query)) {
                echo "<script>alert('Mobil berhasil ditambahkan!'); window.location.href='manajemen_mobil.php';</script>";
            } else {
                echo "Error: " . mysqli_error($koneksi);
            }
        } else {
            echo "<script>alert('Gagal mengunggah foto.'); window.history.back();</script>";
            exit;
        }
    } else {
        echo "<script>alert('Terjadi kesalahan saat mengupload file.'); window.history.back();</script>";
        exit;
    }
}
?>
