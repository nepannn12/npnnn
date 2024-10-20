<?php
include('../koneksi.php');

// Cek apakah parameter 'nopol' ada di URL
if (isset($_GET['id'])) {
    $nopol = $_GET['id'];

    // Query untuk mengambil data mobil sebelum dihapus (untuk menghapus foto)
    $query = "SELECT foto FROM tbl_mobil WHERE nopol='$nopol'";
    $result = mysqli_query($koneksi, $query);

    // Cek apakah data ditemukan
    if ($row = mysqli_fetch_assoc($result)) {
        // Query untuk menghapus data mobil dari database
        $queryDelete = "DELETE FROM tbl_mobil WHERE nopol='$nopol'";

        if (mysqli_query($koneksi, $queryDelete)) {
            // Hapus foto dari server jika ada
            if (!empty($row['foto'])) {
                $uploadDir = 'gambar/';
                unlink($uploadDir . $row['foto']);
            }
            echo "<script>alert('Mobil berhasil dihapus!'); window.location.href='manajemen_mobil.php';</script>";
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    } else {
        echo "<script>alert('Mobil tidak ditemukan!'); window.location.href='manajemen_mobil.php';</script>";
    }
} else {
    echo "<script>alert('Parameter nopol tidak ditemukan!'); window.location.href='manajemen_mobil.php';</script>";
}
?>
