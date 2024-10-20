<?php
include 'koneksi.php';
include 'function_login.php'; // Function login berada di sini

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];
    
    // Panggil function login
    login($user, $password, $koneksi);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LuxRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }

        .login-container {
            background-color: #212529;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        .btn-primary {
            background-color: #ff6f61;
            border: none;
        }

        .btn-primary:hover {
            background-color: #e65c4f;
        }

        .form-control {
            background-color: #495057;
            border: none;
            color: white;
        }

        .form-control:focus {
            background-color: #495057;
            color: white;
            border-color: #ff6f61;
            box-shadow: none;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2 class="text-center mb-4">Login</h2>
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger text-center">
                <?= $error ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="mb-3">
                <input type="text" name="user" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="d-grid">
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </div>
        </form>
        <p class="text-center mt-3">Belum punya akun? <a href="registrasi.php" class="text-warning">Daftar</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
