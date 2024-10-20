<?php
function login($user, $password, $koneksi) {
    // Cek apakah username ada di tabel user (admin/petugas)
    $stmt = $koneksi->prepare("SELECT * FROM user WHERE user = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        if (password_verify($password, $user_data['password'])) {
            // Simpan data penting di session, termasuk NIK
            $_SESSION['user'] = $user_data['user'];
            $_SESSION['role'] = $user_data['role'];
            $_SESSION['user_id'] = $user_data['user_id']; // Tangkap user_id

            // Redirect berdasarkan role
            if ($user_data['role'] === 'admin') {
                header("Location: admin/index.php");
            } elseif ($user_data['role'] === 'petugas') {
                header("Location: petugas/index.php");
            }
            exit();
        } else {
            echo '<script>alert("Password salah!");</script>';
        }
    } else {
        // Cek di tabel member jika tidak ditemukan di user
        $stmt = $koneksi->prepare("SELECT * FROM member WHERE user = ?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $member_data = $result->fetch_assoc();
            if (password_verify($password, $member_data['pass'])) {
                // Simpan data penting di session, termasuk NIK
                $_SESSION['user'] = $member_data['user'];
                $_SESSION['role'] = 'member';
                $_SESSION['nik'] = $member_data['nik']; // Tangkap NIK

                header("Location: user/index.php");
                exit();
            } else {
                echo '<script>alert("Password salah!");</script>';
            }
        } else {
            echo '<script>alert("Username tidak ditemukan!");</script>';
        }
    }
}
?>
