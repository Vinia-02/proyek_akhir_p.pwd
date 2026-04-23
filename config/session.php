<?php
session_start();
require_once __DIR__ . '/connect.php';

// Auto-login jika ada cookie remember me
if (!isset($_SESSION['nama_pengguna']) && isset($_COOKIE['remember_email']) && isset($_COOKIE['remember_token'])) {
    $email = $_COOKIE['remember_email'];
    $token = $_COOKIE['remember_token'];

    $result = $koneksi->query("SELECT * FROM pengguna WHERE email = '$email'");
    if ($result->num_rows > 0) {
        $pengguna = $result->fetch_assoc();
        if (password_verify($pengguna['password_hash'], $token)) {
            $_SESSION['nama_pengguna'] = $pengguna['nama_pengguna'];
            $_SESSION['email'] = $pengguna['email'];
            header("Location: ../home.php");
            exit();
        }
    }
}

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
    $remember = isset($_POST['rm']);

    $result = $koneksi->query("SELECT * FROM pengguna WHERE email = '$email'");
    if ($result->num_rows > 0){
        $pengguna = $result->fetch_assoc();
        if (password_verify($password, $pengguna['password_hash'])) {
            $_SESSION['nama_pengguna'] = $pengguna['nama_pengguna'];
            $_SESSION['email'] = $pengguna['email'];

            if ($remember) {
                setcookie('remember_email', $email, time() + (30 * 24 * 60 * 60), '/');
                setcookie('remember_token', password_hash($pengguna['password_hash'], PASSWORD_DEFAULT), time() + (30 * 24 * 60 * 60), '/');
            }

            header("Location: ../home.php");
            exit();
        }
    }

    $_SESSION['login_error'] = 'email atau password salah';
    header("Location: ../login.php");
    exit();
}

?>