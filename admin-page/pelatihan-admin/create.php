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
    <title>Tambah Pelatihan | EKANKU</title>
</head>

<body>
    <div class="vh-100 d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-body d-flex align-items-center item justify-content-between">
                    <span class="h5">Masukkan Akun Baru</span>
                    <a href="../admin-pelatihan.php" class="btn-bs-primary px-5" name="submit">Kembali</a>
                </div>
                <div class="card-footer">
                    <form action="pelatihan-proses.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title_pelatihan" class="form-label">Judul Pelatihan</label>
                            <input type="text" class="form-control" name="title_pelatihan" placeholder="Judul Pelatihan" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama_perusahaan" class="form-label">Nama Perusahaan yang mengadakan</label>
                            <input class="form-control" type="text" name="nama_perusahaan" required placeholder="Masukkan Nama Perusahaan" required />
                        </div>

                        <div class="mb-3">
                            <label for="open_registrasi" class="form-label">Tanggal Pendaftaran Dibuka</label>
                            <input class="form-control" type="date" name="open_registrasi" required />
                        </div>

                        <div class="mb-3">
                            <label for="close_registrasi" class="form-label">Tanggal Pendaftaran Ditutup</label>
                            <input class="form-control" type="date" name="close_registrasi" required />
                        </div>

                        <div class="mb-3">
                            <label for="buka" class="form-label">Pendaftaran Dibuka atau Tidak</label>
                            <div class="input-group input-group-merge">
                                <select class="form-select" aria-label="Default select example" name="buka">
                                    <option value="1" selected>Buka</option>
                                    <option value="0">Tutup</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="img_pelatihan" class="form-label">Masukkan Gambar Pelatihan</label>
                            <input class="form-control" type="file" name="img_pelatihan" required />
                        </div>

                        <div class="mb-3">
                            <label for="kuota" class="form-label">Kuota</label>
                            <input class="form-control" type="number" name="kuota" required />
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