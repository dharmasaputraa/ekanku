<?php
include '../../function.php';

// http://localhost/kuliah/uas/admin-page/user-admin/create.php untuk tes
if (isset($_SESSION['login'])) {
    if ($_SESSION['login'] == true && $_SESSION['role'] == 'Admin') {
    } else {
        header("Location: ../../index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css" />

    <!-- My Style -->
    <link rel="stylesheet" href="../../assets/css/form.css" />
    <link rel="stylesheet" href="../../assets/css/adminTable.css" />

    <!-- Logo Title & Title -->
    <link rel="icon" href="../../assets/image/Logo-01.png" />
    <title>Tambah Akun | EKANKU</title>
</head>

<body>
    <div class="vh-100 d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-body d-flex align-items-center item justify-content-between">
                    <span class="h5">Masukkan Akun Baru</span>
                    <a href="../admin-user.php" class="btn-bs-primary px-5" name="submit">Kembali</a>
                </div>
                <div class="card-footer">
                    <form action="user-proses.php" method="POST">
                        <div class="mb-3">
                            <label for="nickname" class="form-label">Nama Panggilan</label>
                            <input type="text" class="form-control" name="nickname" placeholder="Masukkan Nama" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input class="form-control" type="email" name="email" required placeholder="Masukkan email" required />
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <div class="input-group input-group-merge">
                                <select class="form-select" aria-label="Default select example" name="role">
                                    <option value="user" selected>User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-bs-primary" type="submit" name="aksi" value="add">
                            Tambahkan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>