<?php
include '../function.php';


if (isset($_GET['hapus'])) {

    $isDel = hapus_data_pertanyaan($_GET);

    if ($isDel) {
        $_SESSION['eksekusi'] = "Data Berhasil Dihapus";
        header('location: ../forum.php');
    }
}

if (isset($_POST['aksi'])) {
    // Create
    if ($_POST['aksi'] == 'add') {

        $isAdd = tambah_data_pertanyaan($_POST);

        if ($isAdd) {
            $_SESSION['eksekusi'] = "Data Berhasil Ditambahkan";
            header('location: ../forum.php');
        } else {
            echo "Gagal menambahkan pertanyaan";
        }

        // Update
    } elseif ($_POST['aksi'] == 'edit') {

        $isUpdate = ubah_data_pertanyaan($_POST);

        if ($isUpdate) {
            $_SESSION['eksekusi'] = "Data Berhasil Diubah";
            header('location: ../forum.php');
        } else {
            echo "Data gagal diupdate";
        }
    }
}
