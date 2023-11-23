<?php
include '../../function.php';

if (isset($_POST['aksi'])) {
    // Create
    if ($_POST['aksi'] == 'add') {

        if ($_POST['aksi'] == 'add') {

            $isAdd = tambah_data_pelatihan($_POST, $_FILES);

            if ($isAdd) {
                $_SESSION['eksekusi'] = "Data Berhasil Ditambahkan";
                header('location:../admin-pelatihan.php');
            } else {
                echo "Gagal menambahkan pertanyaan";
            }
        }
        // Update
    } elseif ($_POST['aksi'] == 'edit') {

        $isUpdate = ubah_data_pelatihan($_POST, $_FILES);

        if ($isUpdate) {
            $_SESSION['eksekusi'] = "Data Berhasil Diubah";
            header('location:../admin-pelatihan.php');
        } else {
            echo "Data gagal diupdate";
        }
    }
}


// Delate
if (isset($_GET['hapus'])) {

    $isDel = hapus_data_pelatihan($_GET);

    if ($isDel) {
        $_SESSION['eksekusi'] = "Data Berhasil Dihapus";
        header('location:../admin-pelatihan.php');
    }
}
