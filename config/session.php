<?php
session_start();
require_once __DIR__ . '/connect.php';

if (isset($_POST['register'])) {
    $nama_pengguna = trim($_POST['usn']);
    $email = trim($_POST['email']);
    $password = trim($_POST['pw']);
    $confirmPassword = trim($_POST['confirmpw']);
    $role = $_POST['role'] ?? 'user';

    if (!in_array($role, ['admin', 'user'], true)) {
        $role = 'user';
    }

    if ($password != $confirmPassword){
        $_SESSION['register_error'] = 'Konfirmasi password harus sama!';
        header("Location: ../regis.php");
        exit();
    }

    $stmt = $koneksi->prepare("SELECT email FROM pengguna WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0){
        $_SESSION['register_error'] = 'Email sudah terdaftar!';
        header("Location: ../regis.php");
        exit();
    } else {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $koneksi->prepare("INSERT INTO pengguna (nama_pengguna, email, password_hash, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama_pengguna, $email, $passwordHash, $role);
        $stmt->execute();

        header("Location: ../login.php");
        exit();
    }
}

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['pw'];
    $remember = isset($_POST['rm']);

    $stmt = $koneksi->prepare("SELECT * FROM pengguna WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0){
        $pengguna = $result->fetch_assoc();
        if ($password === $pengguna['password_hash'] || password_verify($password, $pengguna['password_hash'])) {
            $_SESSION['id_pengguna'] = $pengguna['id_pengguna'] ?? null;
            $_SESSION['nama_pengguna'] = $pengguna['nama_pengguna'];
            $_SESSION['email'] = $pengguna['email'];
            $_SESSION['role'] = $pengguna['role'] ?? 'user';

            if ($remember) {
                setcookie('remember_email', $email, time() + (30 * 24 * 60 * 60), '/');
                setcookie('remember_token', password_hash($pengguna['password_hash'], PASSWORD_DEFAULT), time() + (30 * 24 * 60 * 60), '/');
            }

            header("Location: ../index.php");
            exit();
        }
    }

    $_SESSION['login_error'] = 'email atau password salah';
    header("Location: ../login.php");
    exit();
}

if (!isset($_SESSION['nama_pengguna']) && isset($_COOKIE['remember_email']) && isset($_COOKIE['remember_token'])) {
    $email = $_COOKIE['remember_email'];
    $token = $_COOKIE['remember_token'];

    $stmt = $koneksi->prepare("SELECT * FROM pengguna WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $pengguna = $result->fetch_assoc();
        if (password_verify($pengguna['password_hash'], $token)) {
            $_SESSION['id_pengguna'] = $pengguna['id_pengguna'] ?? null;
            $_SESSION['nama_pengguna'] = $pengguna['nama_pengguna'];
            $_SESSION['email'] = $pengguna['email'];
            $_SESSION['role'] = $pengguna['role'] ?? 'user';
        }
    }
}

?>
