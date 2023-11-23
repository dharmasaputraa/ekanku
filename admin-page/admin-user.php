<?php
include "../function.php";

if (isset($_SESSION['login'])) {
    if ($_SESSION['login'] == true && $_SESSION['role'] == 'User') {
        header("Location: ../index.php");
    } else if ($_SESSION['login'] != true && $_SESSION['role'] != 'User') {
        header("Location: ../index.php");
    }
}

if (isset($_POST['logout'])) {
    logoutAdmin();
}

$query = "SELECT * FROM user;";
$sql = mysqli_query($conn, $query);
$no = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css" />

    <!-- My Style -->
    <link rel="stylesheet" href="../assets/css/admin.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    <link rel="stylesheet" href="../assets/css/adminTable.css" />
    <link rel="stylesheet" href="../assets/css/icons.min.css" />

    <!-- Logo Title & Title -->
    <link rel="icon" href="../assets/image/Logo-01.png" />
    <title>Admin User | EKANKU</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>


<body id="body-pd" class="body-pd  bg-light">
    <header class="header body-pd shadow-sm rounded" id="header">
        <div class="header_toggle d-flex align-items-center justify-content-center ">
            <i class='bx bx-menu' id="header-toggle" height="35"></i>
        </div>
        <div class="d-flex align-items-center">
            <i class="dripicons-view-apps pe-4 fs-4"></i>
            <div class="dropdown">
                <a class="dropdown-toggle acc_name" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../assets/image/user.svg" alt="user-image" class="rounded-circle" height="35" />
                    <span class="ps-2 "><?= $_SESSION['nama']; ?></span>
                </a>
                <ul class="dropdown-menu w-100 mt-4 text-center" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#">MyAccount</a></li>
                    <li><a class="dropdown-item" href="#">Setting</a></li>
                </ul>
            </div>
    </header>
    <div class="l-navbar show" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo align-items-center justify-content-center">
                    <img src="../assets/image/logoputih-01.png" alt="" height="45" class="" id="nav_logo">
                </a>
                <div class="nav_list">
                    <p href="#" class="nav_link" id="nav_title">
                        <span class="nav_title">NAVIGATION</span>
                    </p>
                    <a href="admin-dashboard.php" class="nav_link">
                        <i class='uil-home-alt'></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <p href="#" class="nav_link" id="nav_title2">
                        <span class="nav_title ">APPS</span>
                    </p>
                    <a href="#" class="nav_link">
                        <i class='uil-comments-alt'></i>
                        <span class="nav_name">Chat Customer</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class='uil-envelope-add'></i>
                        <span class="nav_name">Forum</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class='uil-newspaper'></i>
                        <span class="nav_name">Berita</span>
                    </a>
                    <a href="admin-pelatihan.php" class="nav_link">
                        <i class='uil-schedule'></i>
                        <span class="nav_name">Pelatihan</span>
                    </a>
                    <a href="#" class="nav_link active">
                        <i class='bx bx-user'></i>
                        <span class="nav_name">Users</span>
                    </a>
                    <p href="#" class="nav_link" id="nav_title3">
                        <span class="nav_title">EKANKU PAGE</span>
                    </p>
                    <a href="../index.php" class="nav_link">
                        <i class='uil-web-grid-alt'></i>
                        <span class="nav_name">Landing</span>
                    </a>
                    <a href="../forum.php" class="nav_link">
                        <i class='uil-web-grid-alt'></i>
                        <span class="nav_name">Forum</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class='uil-web-grid-alt'></i>
                        <span class="nav_name">Pelatihan</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class='uil-web-grid-alt'></i>
                        <span class="nav_name">Berita</span>
                    </a>
                    <a href="../autentifikasi/login.php" class="nav_link">
                        <i class='uil-web-grid-alt'></i>
                        <span class="nav_name">Login</span>
                    </a>
                    <a href="../autentifikasi/register.php" class="nav_link">
                        <i class='uil-web-grid-alt'></i>
                        <span class="nav_name">Register</span>
                    </a>
                </div>
            </div>
            <form action="#" method="POST" class="nav_link sign_out d-flex">
                <i class='bx bx-log-out'></i>
                <button type="submit" class="btn-signout nav_name sign_out" name="logout">Logout</button>
            </form>
        </nav>
    </div>

    <!--Container Main start-->
    <div class="hw-80">
        <div class="container-admin">
            <span class="fw-bold fs-5">Users</span>
            <div class="card mt-3">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <a href="user-admin/create.php" class="btn-bs-primary"><i class="uil-plus-circle me-2"></i>Add User</a>
                </div>
                <div class="px-4 table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="">
                            <tr>
                                <th scope="col" class="ps-3">#</th>
                                <th scope="col" class="ps-3">Nama</th>
                                <th scope="col" class="ps-3">Email</th>
                                <th scope="col" class="ps-3">Password</th>
                                <th scope="col" class="ps-3">Role</th>
                                <th scope="col" class="ps-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($result = mysqli_fetch_assoc($sql)) {
                            ?>
                                <tr>
                                    <th scope="row" class="ps-3"><?= $result['id']; ?></th>
                                    <td class="ps-3"><?= $result['nickname']; ?></td>
                                    <td class="ps-3"><?= $result['email']; ?></td>
                                    <td class="ps-3"><?= $result['password']; ?></td>
                                    <td class="ps-3"><?= $result['role']; ?></td>
                                    <td class="d-flex justify-content-evenly">
                                        <a href="user-admin/edit.php?ubah=<?= $result['id']; ?>" class="fs-5"><i class='uil-edit text-warning'></i></a>
                                        <a href="user-admin/user-proses.php?hapus=<?= $result['id']; ?>" type="button" name="hapus" class="fs-5 text-danger" onClick="return confirm('Apakah anda ingin menghapus data ini?')"><i class='uil-trash'></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Container Main end-->

    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script>
    <script src="../assets/js/admin.js"></script>
</body>

</html>