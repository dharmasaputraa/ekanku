<?php
include '../../koneksidb.php';
include '../../function.php';

// http://localhost/kuliah/uas/admin-page/user-admin/create.php untuk tes
if (isset($_SESSION['login'])) {
    if ($_SESSION['login'] == true && $_SESSION['role'] == 'Admin') {
    } else {
        header("Location: ../../index.php");
    }
}

if (isset($_GET['ubah'])) {
    $idUser = $_GET['ubah'];

    $query = "SELECT * FROM user WHERE id = '$idUser';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $nama = $result['nickname'];
    $email = $result['email'];
    $password = $result['password'];
    $role = $result['role'];
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
                    <span class="h5">Ubah Akun</span>
                    <a href="../admin-user.php" class="btn-bs-primary px-5" name="submit">Kembali</a>
                </div>
                <div class="card-footer">
                    <form action="user-proses.php" method="POST">
                        <input type="hidden" value="<?= $idUser; ?>" name='id'>
                        <div class="mb-3">
                            <label for="nickname" class="form-label">Nama Panggilan</label>
                            <input type="text" class="form-control" name="nickname" value="<?= $nama; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input class="form-control" type="email" name="email" required value="<?= $email; ?>" />
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" name="password" class="form-control" value="<?= $password; ?>" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <div class="input-group input-group-merge">
                                <select class="form-select" aria-label="Default select example" name="role">
                                    <option value="user" <?php if ($role == "user") echo "selected" ?>>User</option>
                                    <option value="admin" <?php if ($role == "admin") echo "selected" ?>>Admin</option>
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-bs-primary" type="submit" name="aksi" value="edit">
                            Ubah
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>