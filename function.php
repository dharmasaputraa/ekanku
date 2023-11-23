<?php
include 'koneksidb.php';

// Session Start
session_start();

function login()
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $queryCekUser = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $cekUser = mysqli_query($GLOBALS['conn'], $queryCekUser);

    $hitung = mysqli_num_rows($cekUser);

    if ($hitung > 0) {
        $ambilDataRole = mysqli_fetch_array($cekUser);
        $nama = $ambilDataRole['nickname'];
        $role = $ambilDataRole['role'];

        if ($role == "admin") {
            $_SESSION['login'] = true;
            $_SESSION['role'] = 'Admin';
            $_SESSION['nama'] = $nama;
            header('location: ../admin-page/admin-dashboard.php');
            exit;
        } else {
            $_SESSION['login'] = true;
            $_SESSION['role'] = 'User';
            $_SESSION['nama'] = $nama;
            header('location: ../index.php');
            exit;
        }
    }

    return false;
}

function register()
{
    $nama = $_POST['nickname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $kesamaanEmail = mysqli_query($GLOBALS['conn'], "SELECT * FROM user WHERE email = '$email'");

    if (mysqli_fetch_assoc($kesamaanEmail)) {
        echo "<script>
                alert('Username sudah terdaftar');
            </script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai');
            </script>";
        return false;
    }

    $queryAddUser = "INSERT INTO user VALUES (null, '$nama', '$email', '$password' , 'user')";
    $resultUser = mysqli_query($GLOBALS['conn'], $queryAddUser);

    if ($resultUser) {
        header("Location: login.php");
    } else {
        echo "Gagal menambahkan data";
    }
}

function logoutAdmin()
{
    $_SESSION['login'] = false;
    $_SESSION['role'] = '-';
    $_SESSION['nama'] = '-';
    header("Location: ../");
    exit;
}

function logoutUser()
{
    $_SESSION['login'] = false;
    $_SESSION['role'] = '-';
    $_SESSION['nama'] = '-';

    header("Location: index.php");
    exit;
}

function tambah_data_user($data)
{
    $nama = $data['nickname'];
    $email = $data['email'];
    $password = $data['password'];
    $role = $data['role'];

    $queryAdd = "INSERT INTO user VALUES(null,'$nama' ,'$email', '$password', '$role');";
    $sql = mysqli_query($GLOBALS['conn'], $queryAdd);

    return true;
}

function hapus_data_user($data)
{
    $idUser = $data['hapus'];
    $queryDel = "DELETE FROM user WHERE id = '$idUser';";
    $sql = mysqli_query($GLOBALS['conn'], $queryDel);

    return true;
}

function ubah_data_user($data)
{
    $idUser = $data['id'];
    $nama = $data['nickname'];
    $email = $data['email'];
    $password = $data['password'];
    $role = $data['role'];

    $queryUpdate = "UPDATE user SET nickname='$nama', email='$email', password='$password', role='$role' WHERE id = '$idUser'";
    $sql = mysqli_query($GLOBALS['conn'], $queryUpdate);

    return true;
}

function tambah_data_pertanyaan($data)
{
    $namaUser = $_SESSION['nama'];

    $queryCekUser = "SELECT * FROM user WHERE nickname = '$namaUser'";
    $cekUser = mysqli_query($GLOBALS['conn'], $queryCekUser);
    $ambilId = mysqli_fetch_array($cekUser);
    $idUser = $ambilId['id'];

    $title = $data['title'];
    $date = $data['date'];
    $detail = $data['detail'];

    $queryAdd = "INSERT INTO forum VALUES(null, 0, '$idUser', '$title','$detail' ,'$date');";
    $sql = mysqli_query($GLOBALS['conn'], $queryAdd);

    return true;
}

function ubah_data_pertanyaan($data)
{
    $idPertanyaan = $data['id'];
    $title = $data['title'];
    $date = $data['date'];
    $detail = $data['detail'];

    $queryUpdate = "UPDATE forum SET title='$title', date='$date', detail='$detail' WHERE id_forum = '$idPertanyaan'";
    $sql = mysqli_query($GLOBALS['conn'], $queryUpdate);

    return true;
}

function hapus_data_pertanyaan($data)
{
    $idPertanyaan = $data['hapus'];
    $queryDel = "DELETE FROM forum WHERE id_forum = '$idPertanyaan';";
    $sql = mysqli_query($GLOBALS['conn'], $queryDel);

    return true;
}

function tambah_data_pelatihan($data, $files)
{
    $title = $data['title_pelatihan'];
    $perusahaan = $data['nama_perusahaan'];
    $open = $data['open_registrasi'];
    $close = $data['close_registrasi'];
    $isOpen = $data['buka'];
    $kuota = $data['kuota'];

    $split  = explode('.', $files['img_pelatihan']['name']);
    $ekstensi = $split[count($split) - 1];
    $img = $title . '.' . $ekstensi;

    // upload file
    $dir = '../../public/uploadfile/';
    $tmpFile = $_FILES['img_pelatihan']['tmp_name'];

    move_uploaded_file($tmpFile, $dir . $img);

    $queryAdd = "INSERT INTO pelatihan VALUES(null,'$img', '$title', '$perusahaan', '$open', '$close', '$isOpen', '$kuota')";
    $sql = mysqli_query($GLOBALS['conn'], $queryAdd);

    return true;
}

function ubah_data_pelatihan($data, $files)
{
    $idPelatihan = $data['id_pelatihan'];
    $title = $data['title_pelatihan'];
    $perusahaan = $data['nama_perusahaan'];
    $open = $data['open_registrasi'];
    $close = $data['close_registrasi'];
    $isOpen = $data['buka'];
    $kuota = $data['kuota'];

    $queryShow = "SELECT * FROM pelatihan WHERE id_pelatihan = '$idPelatihan';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    if ($files['img_pelatihan']['name'] == "") {
        $img = $result['img_pelatihan'];
    } else {
        $split  = explode('.', $files['img_pelatihan']['name']);
        $ekstensi = $split[count($split) - 1];

        $img = $result['title_pelatihan'] . '.' . $ekstensi;
        unlink('../../public/uploadfile/' . $result['img_pelatihan']);

        $dir = '../../public/uploadfile/';
        $tmpFile = $_FILES['img_pelatihan']['tmp_name'];

        move_uploaded_file($tmpFile, $dir . $img);
    }

    $queryUpdate = "UPDATE pelatihan SET title_pelatihan='$title', img_pelatihan = '$img', nama_perusahaan='$perusahaan', open_registrasi='$open', close_registrasi='$close', buka='$isOpen', kuota='$kuota' WHERE id_pelatihan = '$idPelatihan'";
    $sql = mysqli_query($GLOBALS['conn'], $queryUpdate);

    return true;
}

function hapus_data_pelatihan($data)
{
    $idPelatihan = $data['hapus'];
    $queryShow = "SELECT * FROM pelatihan WHERE id_pelatihan = '$idPelatihan';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    unlink('../../public/uploadfile/' . $result['img_pelatihan']);

    $queryDel = "DELETE FROM pelatihan WHERE id_pelatihan = '$idPelatihan';";
    $sql = mysqli_query($GLOBALS['conn'], $queryDel);

    return true;
}
