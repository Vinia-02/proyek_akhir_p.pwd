<?php
session_start();
require_once __DIR__ . '/connect.php';

if (isset($_POST['register'])) {
    $nama_pengguna = $_POST['usn'];
    $email = $_POST['email'];
    $password = password_hash($_POST['pw'], PASSWORD_DEFAULT);

    $checkemail = $koneksi->query("SELECT email FROM pengguna WHERE email = '$email'");
    if ($checkemail->num_rows > 0){
        $_SESSION['register_error'] = 'Email sudah terdaftar!';
        header("Location: ../regis.php");
        exit();
    } else {
        $koneksi->query("INSERT INTO pengguna (nama_pengguna, email, password_hash) VALUES ('$nama_pengguna', '$email', '$password')");
        header("Location: ../login.php");
        exit();
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['pw'];

    $result = $koneksi->query("SELECT * FROM pengguna WHERE email = '$email'");
    if ($result->num_rows > 0){
        $pengguna = $result->fetch_assoc();
        if (password_verify($password, $pengguna['password_hash'])) {
            $_SESSION['nama_pengguna'] = $pengguna['nama_pengguna'];
            $_SESSION['email'] = $pengguna['email'];

            header("Location: ../home.php");
            exit();
        }
    }

    $_SESSION['login_error'] = 'email atau password salah';
    header("Location: ../login.php");
    exit();
}

?>