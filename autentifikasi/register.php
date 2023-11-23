<?php
include "../function.php";

if (isset($_SESSION['login'])) {
    if ($_SESSION['login'] == true  && $_SESSION['role'] == 'Admin') {
        header("Location: ../admin-page/admin-dashboard.php");
    } else if ($_SESSION['login'] == true && $_SESSION['role'] == 'User') {
        header("Location: ../index.php");
    }
}

if (isset($_POST['signup'])) {
    register();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700;900&family=Open+Sans:wght@300;400&display=swap" rel="stylesheet" />

    <!-- My Style -->
    <link rel="stylesheet" href="../assets/css/style.css" />

    <!-- Logo Title & Title -->
    <link rel="icon" href="../assets/image/Logo-01.png" />
    <title>Register</title>
</head>

<body class="authentication-bg">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-lg-5">
                    <div class="card">
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="../index.php">
                                <span><img src="../assets/image/logoputih-01.png" alt="" height="50" /></span>
                            </a>
                        </div>

                        <div class="card-body p-4">
                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center pt-3 pb-1 fw-bold">
                                    Register
                                </h4>
                                <p class="text-muted mb-4 subheading">
                                    Tidak punya akun? Buatlah akun,
                                    <br />tidak akan memakan waktu yang
                                    lama.
                                </p>
                            </div>

                            <form action="#" method="POST">

                                <div class="mb-3">
                                    <label for="nickname" class="form-label">Nama Panggilan</label>
                                    <input class="form-control" type="text" name="nickname" placeholder="Masukkan nama" required />
                                </div>

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" type="email" name="email" required placeholder="Masukkan email" />
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="password2" class="form-control" placeholder="Masukkan ulang password" />
                                    </div>
                                </div>

                                <div class="mb-3 mb-0 text-center py-3">
                                    <button class="btn btn-primary" type="submit" name="signup">
                                        Sign Up
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">
                                Sudah punya akun?
                                <a href="login.php" class="text-muted ms-1"><b>Log In</b></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>