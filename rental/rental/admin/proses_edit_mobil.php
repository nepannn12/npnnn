<?php
include('../koneksi.php');  

// Validasi jika form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nopol_lama'])) {
    $nopol_lama = $_POST['nopol_lama'];
    $nopol_baru = $_POST['nopol'];
    $brand = $_POST['brand'];
    $type = $_POST['type'];
    $tahun = $_POST['tahun'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];

    // Cek apakah nopol baru sudah digunakan oleh mobil lain
    $cekQuery = "SELECT * FROM tbl_mobil WHERE nopol='$nopol_baru' AND nopol != '$nopol_lama'";
    $cekResult = mysqli_query($koneksi, $cekQuery);

    if (mysqli_num_rows($cekResult) > 0) {
        echo "<script>alert('Nomor Polisi sudah digunakan!'); window.history.back();</script>";
        exit;
    }

    // Proses upload foto (jika ada)
    $foto = $_FILES['foto'];
    $fotoName = $foto['name'];
    $fotoTmpName = $foto['tmp_name'];
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $uploadDir = 'gambar/';

    if (!empty($fotoName)) {
        $fotoExtension = strtolower(pathinfo($fotoName, PATHINFO_EXTENSION));
        if (!in_array($fotoExtension, $allowedExtensions)) {
            echo "<script>alert('Ekstensi file tidak valid! Hanya jpg, jpeg, png, gif.'); window.history.back();</script>";
            exit;
        }

        $fotoDestination = $uploadDir . basename($fotoName);
        if (!move_uploaded_file($fotoTmpName, $fotoDestination)) {
            echo "<script>alert('Gagal mengunggah foto!'); window.history.back();</script>";
            exit;
        }

        // Hapus foto lama jika ada
        $queryFotoLama = "SELECT foto FROM tbl_mobil WHERE nopol='$nopol_lama'";
        $resultFotoLama = mysqli_query($koneksi, $queryFotoLama);
        $rowFoto = mysqli_fetch_assoc($resultFotoLama);
        if (!empty($rowFoto['foto'])) {
            unlink($uploadDir . $rowFoto['foto']);
        }

        $fotoQuery = ", foto='$fotoName'";
    } else {
        $fotoQuery = "";
    }

    // Query update data mobil
    $queryUpdate = "UPDATE tbl_mobil SET 
        nopol='$nopol_baru', 
        brand='$brand', 
        type='$type', 
        tahun='$tahun', 
        harga='$harga', 
        status='$status' 
        $fotoQuery WHERE nopol='$nopol_lama'";

    // Eksekusi query
    if (mysqli_query($koneksi, $queryUpdate)) {
        echo "<script>alert('Data mobil berhasil diperbarui!'); window.location.href='manajemen_mobil.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "<script>alert('Data tidak valid!'); window.history.back();</script>";
}
?>
