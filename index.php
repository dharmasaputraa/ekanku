<?php
include "function.php";

if (isset($_POST['logout'])) {
    logoutUser();
}

$query = "SELECT * FROM pelatihan LIMIT 0, 3;;";
$sql = mysqli_query($conn, $query);
$no = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700;900&family=Open+Sans:wght@300;400&display=swap" rel="stylesheet" />

    <!-- My Style -->
    <link rel="stylesheet" href="assets/css/style.css" />

    <!-- Logo Title & Title -->
    <link rel="icon" href="assets/image/Logo-01.png" />
    <title>EKANKU</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-0 position-fixed w-100 shadow-sm p-3 mb-5 bg-body rounded mx-auto">
        <div class="container">
            <a class="navbar-brand" id="brand" href="#">
                <img src="assets/image/Logo + text v.2-01-01.png" alt="Logo" width="150" class="d-inline-block align-text-top" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item x-1">
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item px-1">
                        <a class="nav-link" href="forum.php">Forum</a>
                    </li>
                    <li class="nav-item px-1">
                        <a class="nav-link" href="#pelatihan">Pelatihan</a>
                    </li>
                    <li class="nav-item x-1">
                        <a class="nav-link" href="Manik/Berita/berita.html">Berita</a>
                    </li>
                </ul>
                <form class="d-flex w-50 ms-lg-auto py-2 py-lg-0">
                    <input class="form-control rounded-0 ps-4" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-search border border-lights" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </form>
                <div class="ms-lg-3 py-2 py-lg-0">
                    <?php
                    if ($_SESSION['login'] == true && $_SESSION['role'] == 'User') {
                    ?>
                        <form action="#" method="POST">
                            <button class="btn-login" id="btnLogin" name="logout" type="submit">Logout</button>
                        </form>
                    <?php
                    } else if ($_SESSION['login'] == true && $_SESSION['role'] == 'Admin') { ?>
                        <a href="admin-page/admin-dashboard.php">
                            <button class="btn-login" id="btnLogin">Admin</button>
                        </a>
                    <?php
                    } else {
                        $_SESSION['login'] = false;
                    ?>
                        <a href="autentifikasi/login.php">
                            <button class="btn-login" id="btnLogin">Login</button>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <!-- Hero Section -->
    <section class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="hero-text col text-center text-lg-start">
                    <h1 class="heading pt-5">
                        Tumbuh <span>Bersama</span><br />Membangun Indonesia
                        <br />
                        Menjadi Sektor Budidaya Yang <span>Maju</span>
                    </h1>
                    <p class="subheading">
                        Website forum menengai ikan yang digunakan untuk
                        tempat di mana orang <br />dapat membahas dan
                        berbagi informasi tentang ikan.
                    </p>
                    <div class="pt-3">
                        <a href="#pelatihan">
                            <button class="btn-default btn-pelatihan">
                                Pelatihan
                            </button>
                        </a>
                        <a href="#contact" id="forum">
                            <button class="btn-default btn-aboutus ms-2">
                                Kontak
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section -->

    <!-- SubHero Section -->
    <section class="subhero bg-primary text-light p-5">
        <div class="container py-5">
            <div class="d-md-flex justify-content-between align-items-center">
                <h3 class="mb-3 mb-md-0 heading me-5">
                    Bagaimana Kabar Budidayamu?
                </h3>
                <div class="input-group topic-input subheading">
                    <input type="text" class="form-control rounded-0 ps-4 py-2" placeholder="Search the topic" />
                    <button class="btn btn-light rounded-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- SubHero Section -->

    <!-- Fitur -->
    <section class="fitur text-center py-5 my-5">
        <div class="container">
            <div class="title-pelatihan align-items-center justify-content-center pt-4">
                <h1 class="heading pb-2 mb-lg-3">Fitur Yang Tersedia</h1>
            </div>
            <div class="card-1 row row-cols-1 row-cols-md-3 pt-5">
                <div class="col">
                    <div class="mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" fill="currentColor" class="bi bi-chat-dots pb-5" viewBox="0 0 16 16">
                            <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                            <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z" />
                        </svg>
                        <h3 class="heading fitur-heading">
                            Mempermudah Diskusi
                        </h3>
                        <p class="subheading fitur-subheading">
                            Memiliki fitur forum untuk mempermudah diskusi
                            permasalahan budidaya ikan
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" fill="currentColor" class="bi bi-info-circle pb-5" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                        </svg>
                        <h3 class="heading fitur-heading">
                            Mempermudah Mendapatkan Informasi
                        </h3>
                        <p class="subheading fitur-subheading">
                            Memiliki fitur forum untuk mempermudah diskusi
                            permasalahan budidaya ikan
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" fill="currentColor" class="bi bi-people pb-5" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                        </svg>
                        <h3 class="heading fitur-heading">
                            Meningkatkan SDM
                        </h3>
                        <p class="subheading fitur-subheading">
                            Memiliki pelatihan secara offline (luring)
                            supaya peserta dapat praktik secara langsung
                            yang didampingi mentor berengalaman
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fitur -->

    <!-- Pelatihan Section -->
    <div class="pelatihan pb-5 pt-2 my-5" id="pelatihan">
        <div class="container">
            <div class="title-pelatihan d-flex align-items-center justify-content-between">
                <h1 class="heading py-3 mb-lg-3">
                    Pelatihan yang Tersedia
                </h1>
                <a href="#" class="text-decoration-none">
                    <p class="subheading">Lihat Semua ></p>
                </a>
            </div>
        </div>
        <div class="container">
            <div class="card-1 row row-cols-1 row-cols-md-3 g-4">
                <a href="" class="text-decoration-none">
                    <?php
                    while ($result = mysqli_fetch_assoc($sql)) {
                    ?>
                        <div class="col">
                            <div class="card h-100 shadow">
                                <img src="public/uploadfile/<?= $result['img_pelatihan']; ?>" class="card-img-top" alt="Pelatihan Bioflok" />
                                <div class="card-body px-4">
                                    <h1 class="card-heading">
                                        <?= $result['title_pelatihan']; ?>
                                    </h1>
                                    <p class="card-subheading">
                                        <?= $result['nama_perusahaan']; ?>
                                    </p>
                                </div>
                                <div class="card-footer pb-4">
                                    <small class="text-muted px-2">
                                        Registrasi: <?= $result['open_registrasi']; ?> - <?= $result['close_registrasi']; ?></small><br />
                                    <small class="text-muted px-2">
                                        Tempat: Badung, Bali</small><br />
                                    <small class="text-muted px-2">Kuota: <?= $result['kuota']; ?> Peserta
                                    </small>
                                </div>
                                <?php
                                if ($result['buka'] == 1) {
                                ?>
                                    <h5 class="label open position-absolute end-0 top-0">
                                        BUKA
                                    </h5>
                                <?php } else if ($result['buka']  == 2) { ?>
                                    <h5 class="label close position-absolute end-0 top-0">
                                        TUTUP
                                    </h5>
                                <?php } ?>
                                <h5 class="label tempat position-absolute start-0 top-0">
                                    BALI
                                </h5>
                            </div>
                        </div>
                </a>
            <?php } ?>
            <!-- <div class="col">
                    <div class="card h-100 shadow">
                        <img src="assets/image/Pelatihan.jpeg" class="card-img-top" alt="Pelatihan Bioflok" style="filter: grayscale()" />
                        <div class="card-body px-4">
                            <h1 class="card-heading">
                                Budidaya Lele dengan Bioflok
                            </h1>
                            <p class="card-subheading">EKANKU Academy</p>
                        </div>
                        <div class="card-footer pb-4">
                            <small class="text-muted px-2">
                                Registrasi: 2 Jun 2022 - 1 Jul 2022</small><br />
                            <small class="text-muted px-2">
                                Tempat: Badung, Bali</small><br />
                            <small class="text-muted px-2">Kuota: 20 Peserta
                            </small>
                            <h5 class="label close position-absolute end-0 top-0">
                                TUTUP
                            </h5>
                            <h5 class="label tempat position-absolute start-0 top-0">
                                BALI
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow">
                        <img src="assets/image/Pelatihan.jpeg" class="card-img-top" alt="Pelatihan Bioflok" style="filter: grayscale()" />
                        <div class="card-body px-4">
                            <h1 class="card-heading">
                                Budidaya Lele dengan Bioflok
                            </h1>
                            <p class="card-subheading">EKANKU Academy</p>
                        </div>
                        <div class="card-footer pb-4">
                            <small class="text-muted px-2">
                                Registrasi: 22 April 2022 - 21 Mei
                                2022</small><br />
                            <small class="text-muted px-2">
                                Tempat: Badung, Bali</small><br />
                            <small class="text-muted px-2">Kuota: 20 Peserta
                            </small>
                            <h5 class="label close position-absolute end-0 top-0">
                                TUTUP
                            </h5>
                            <h5 class="label tempat position-absolute start-0 top-0">
                                BALI
                            </h5>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Pelatihan -->

    <!-- Berita -->
    <div class="berita pb-5 my-5" id="berita">
        <div class="container" id="berita">
            <div class="title-pelatihan d-flex align-items-center justify-content-between">
                <h1 class="heading py-3 mb-lg-3">Berita Budidaya</h1>
                <a href="#" class="text-decoration-none">
                    <p class="subheading">Lihat Semua ></p>
                </a>
            </div>
        </div>
        <div class="container">
            <div class="card-1 row row-cols-1 row-cols-md-4 g-4 pb-5">
                <div class="col">
                    <div class="card h-100 shadow">
                        <img src="assets/image/udang.jpeg" class="card-img-top" alt="Berita Budidaya" />
                        <div class="card-body px-4 pb-2">
                            <h1 class="card-heading">
                                10 Ciri AHPND pada Udang
                            </h1>
                            <p class="card-subheading pt-2">
                                Salah satu permasalahan yang masih dihadapai
                                para Petambak adalah penyakit...
                            </p>
                        </div>
                        <div class="card-footer pb-4">
                            <small class="text-muted px-2">2 hari yang lalu
                            </small>
                        </div>
                        <h5 class="label open position-absolute start-0 top-0">
                            TERBARU
                        </h5>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow">
                        <img src="assets/image/udang.jpeg" class="card-img-top" alt="Berita Budidaya" />
                        <div class="card-body px-4 pb-2">
                            <h1 class="card-heading">
                                Cara Mengatasi Penyakit AHPND
                            </h1>
                            <p class="card-subheading pt-2">
                                Di industri Akuakultur, budidaya udang
                                merupakan salah satu sektor yang
                                berkembang...
                            </p>
                        </div>
                        <div class="card-footer pb-4">
                            <small class="text-muted px-2">2 hari yang lalu
                            </small>
                        </div>
                        <h5 class="label open position-absolute start-0 top-0">
                            TERBARU
                        </h5>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow">
                        <img src="assets/image/udang.jpeg" class="card-img-top" alt="Berita Budidaya" />
                        <div class="card-body px-4 pb-2">
                            <h1 class="card-heading">
                                Judul Berita Budidaya
                            </h1>
                            <p class="card-subheading pt-2">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Doloribus, eos...
                            </p>
                        </div>
                        <div class="card-footer pb-4">
                            <small class="text-muted px-2">1 minggu yang lalu
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow">
                        <img src="assets/image/udang.jpeg" class="card-img-top" alt="Berita Budidaya" />
                        <div class="card-body px-4 pb-2">
                            <h1 class="card-heading">
                                Judul Berita Budidaya
                            </h1>
                            <p class="card-subheading pt-2">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Doloribus, eos...
                            </p>
                        </div>
                        <div class="card-footer pb-4">
                            <small class="text-muted px-2">1 bulan yang lalu
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Berita -->

    <!-- Footer -->
    <footer class="bg-dark">
        <div class="container">
            <div class="card-1 row row-cols-1 row-cols-md-2 g-4 pb-5 py-5">
                <div class="col text-center text-sm-start">
                    <h1 class="heading" id="contact">EKANKU</h1>
                    <p>
                        Ekanku adalah Website forum menengai ikan yang
                        digunakan untuk tempat di mana orang dapat membahas
                        dan berbagi informasi tentang ikan. Ini bisa
                        termasuk topik seperti jenis ikan yang berbeda,
                        perawatan dan perawatan ikan, kesehatan ikan,
                        pembenihan ikan, dan apa pun yang terkait dengan
                        ikan. Forum tentang ikan bisa menjadi cara yang
                        bagus bagi orang untuk belajar lebih banyak tentang
                        makhluk menarik ini, berbagi pengalaman dan
                        pengetahuan dengan orang lain, dan terhubung dengan
                        penggemar ikan lainnya.
                    </p>
                    <div class="sosial mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                            <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                        </svg>
                    </div>
                </div>
                <div class="col text-sm-end pt-4 pt-sm-0 pt-lg-0 text-center">
                    <h1 class="heading">MENU</h1>
                    <div class="footer-menu">
                        <a href="#">Beranda</a>
                        <br />
                        <a href="./forum.php">Forum</a>
                        <br />
                        <a href="Manik/pelatihan/pelatihan.html">Pelatihan</a>
                        <br />
                        <a href="Manik/Berita/berita.html">Berita</a>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <p>
                    &copy; Copyright by <span>EKANKU</span> All Right
                    Reseved, 2022 Indonesia
                </p>
            </div>
        </div>
    </footer>
    <!-- Footer -->

    <!-- Login -->
    <!-- <section
            class="login vh-100 w-100 position-fixed start-0 top-0"
            id="LoginPage"
        >
            <div class="container py-5 h-100">
                <div
                    class="row d-flex justify-content-center align-items-center h-100"
                >
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div
                            class="card bg-primary rounded-0 text-white"
                            style="border-radius: 1rem"
                        >
                            <div class="card-body p-5 text-center">
                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <h2 class="fw-bold mb-2 text-uppercase">
                                        Login
                                    </h2>
                                    <p class="text-white-50 mb-5">
                                        Masukkan email dan passowrd!
                                    </p>
                                    <div class="form-outline form-white mb-4">
                                        <input
                                            type="email"
                                            class="form-control form-control-lg rounded-0 ps-4"
                                            placeholder="Email"
                                        />
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input
                                            type="password"
                                            class="form-control form-control-lg rounded-0 ps-4"
                                            placeholder="Password"
                                        />
                                    </div>
                                    <p class="small pb-lg-2">
                                        <a class="text-white-50" href="#!"
                                            >Forgot password?</a
                                        >
                                    </p>
                                    <button
                                        class="btn-aboutus btn-lg px-5 rounded-0"
                                        type="submit"
                                        id="btnLogin1"
                                    >
                                        Login
                                    </button>
                                    <div
                                        class="d-flex justify-content-center text-center mt-4 pt-1"
                                    >
                                        <div class="sosial1 mt-3">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="30"
                                                fill="currentColor"
                                                class="bi bi-instagram mx-3"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"
                                                />
                                            </svg>
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="30"
                                                fill="currentColor"
                                                class="bi bi-facebook mx-3"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"
                                                />
                                            </svg>
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="30"
                                                fill="currentColor"
                                                class="bi bi-whatsapp mx-3"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"
                                                />
                                            </svg>
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="30"
                                                fill="currentColor"
                                                class="bi bi-youtube mx-3"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"
                                                />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p class="mb-0">
                                        Don't have an account?
                                        <a
                                            href="#"
                                            class="text-white-50 fw-bold"
                                            >Sign Up</a
                                        >
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
    <!-- Login -->

    <!-- CS -->
    <div class="cs position-fixed end-0 bottom-0">
        <a href="">
            <img src="assets/image/cs-01.png" alt="cs-logo" />
        </a>
    </div>
    <!-- CS -->
</body>
<!-- Javascript -->
<script src="assets/js/script.js"></script>
<script src="assets/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>

</html>