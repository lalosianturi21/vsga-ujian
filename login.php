<?php
session_start();
include('config/conn.php');
include('config/function.php');

if (isset($_POST['cek_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) && empty($password)) {
        $error = 'Harap isi username dan password';
    } else {
        $user = mysqli_query($con, "SELECT * FROM pengguna WHERE username='$username'") or die(mysqli_error($con));
        if (mysqli_num_rows($user) != 0) {
            $data = mysqli_fetch_array($user);
            if (password_verify($password, $data['password'])) {
                $_SESSION['id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['nama'] = $data['nama'];
                header("Location:admin.php");
            } else {
                $error = 'Username atau password anda salah';
            }
        } else {
            $error = 'Username atau password anda salah';
        }
    }
    $_SESSION['error'] = $error;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemesanan Tiket Wisata | Ujian JWD VSGA Eka Saputra</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-signin {
            max-width: 380px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="text"],
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-radius: 0;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .alert {
            margin-top: 10px;
        }
        .form-signin{
            margin-top: 100px
        } 
    </style>
</head>

<body>

    <main class="form-signin">
        <div class="card p-4">
            <div class="card-body">
                <h1 class="h3 mb-3 fw-bold text-center">Halaman Login</h1>
                <?php if (isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger fade show" role="alert">
                    <strong>Error!</strong> <?= $_SESSION['error']; ?>.
                </div>
                <?php endif;
                unset($_SESSION['error']); ?>

                <form action="" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username">
                        <label for="floatingInput"><i class="bi bi-person"></i> Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" name="password"
                            placeholder="Password">
                        <label for="floatingPassword"><i class="bi bi-lock"></i> Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit" name="cek_login">Sign in</button>
                    <a href="index.php" class="btn btn-secondary w-100 mt-3">Kembali</a>
                    <p class="mt-4 mb-3 text-muted text-center">&copy; <?= date('Y'); ?> </p>
                </form>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS and dependencies -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        var alertList = document.querySelectorAll('.alert')
        alertList.forEach(function (alert) {
            new bootstrap.Alert(alert)
        })
    </script>

</body>

</html>
