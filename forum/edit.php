<?php
include '../function.php';

// http://localhost/kuliah/uas/admin-page/user-admin/create.php untuk tes
if (isset($_SESSION['login'])) {
    if ($_SESSION['login'] == true) {
    } else {
        header("Location: ../loginx.php");
    }
}

if (isset($_GET['ubah'])) {
    $idPertanyaan = $_GET['ubah'];

    $query = "SELECT * FROM forum WHERE id_forum = '$idPertanyaan';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $title = $result['title'];
    $date = $result['date'];
    $detail = $result['detail'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css" />

    <!-- My Style -->
    <link rel="stylesheet" href="../assets/css/adminTable.css" />

    <!-- Logo Title & Title -->
    <link rel="icon" href="../assets/image/Logo-01.png" />
    <title>Ajukan Pertanyaan | EKANKU</title>
</head>

<body>
    <div class="vh-100 d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-body d-flex align-items-center item justify-content-between">
                    <span class="h5">Ubah Pertanyaan</span>
                    <a href="../forum.php" class="btn-bs-primary px-5" name="submit">Kembali</a>
                </div>
                <div class="card-footer">
                    <form action="forum-proses.php" method="POST">
                        <input type="hidden" value="<?= $idPertanyaan; ?>" name='id'>
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" name="title" value="<?= $title; ?>" placeholder="Masukkan Judul" required />
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Tanggal</label>
                            <div class="input-group input-group-merge">
                                <input type="date" name="date" class="form-control" value="<?= $date; ?>" placeholder="Masukkan date" required />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="detail" class="form-label">Detail</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="text" name="detail" style="height: 20vh;" value="<?= $detail; ?>" required></input>
                            </div>
                        </div>

                        <button class="btn btn-bs-primary" type="submit" name="aksi" value="edit">
                            Tambahkan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>