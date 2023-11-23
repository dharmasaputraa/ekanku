<?php
include '../../function.php';

if (isset($_GET['hapus'])) {

    $isDel = hapus_data_user($_GET);

    if ($isDel) {
        $_SESSION['eksekusi'] = "Data Berhasil Dihapus";
        header('location: ../admin-user.php');
    }
}

if (isset($_POST['aksi'])) {
    // Create
    if ($_POST['aksi'] == 'add') {

        $email = $_POST['email'];

        $queryShow = "SELECT * FROM user WHERE email = '$email';";
        $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        if (!($email == $result['email'])) {
            $isAdd = tambah_data_user($_POST);
            $_SESSION['eksekusi'] = "Data Berhasil Ditambahkan";
            header('location: ../admin-user.php');
        } else {
            echo "Email seudah terpakai";
        }

        // Update
    } elseif ($_POST['aksi'] == 'edit') {

        $isUpdate = ubah_data_user($_POST);

        if ($isUpdate) {
            $_SESSION['eksekusi'] = "Data Berhasil Diubah";
            header('location: ../admin-user.php');
        } else {
            echo "Data gagal diupdate";
        }
    }
}
