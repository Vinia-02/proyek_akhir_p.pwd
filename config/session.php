<?php
session_start();
require_once 'connect.php';

if (isset($_POST['regis'])) {
    $nama_pengguna = $_POST['usn'];
    $email = $_POST['email'];
    $password = password_hash($_POST['pw'], PASSWORD_DEFAULT);

    $checkemail = $koneksi->query("SELECT email FROM pengguna WHERE email = '$email'");
    if ($checkemail->num_rows > 0){
        $_SESSION['register_error'] = 'Email sudah terdaftar!';
    } else {
        $koneksi->query("INSERT INTO pengguna (nama_pengguna, email, password) VALUES ('$nama_pengguna', '$email', '$password')");
    }

    header("Location: regis.php");
    exit();
}

?>