<?php
require_once __DIR__ . '/../config/connect.php';

function create_donasi($nama_donatur, $email_donatur, $telp_donatur, $jumlah_donasi){
    global $koneksi;

    $stmt = $koneksi->prepare("INSERT INTO donasi (nama_donatur, email_donatur, telp_donatur, jumlah_donasi) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama_donatur, $email_donatur, $telp_donatur, $jumlah_donasi);

    if ($stmt->execute()) {
        $_SESSION['id_donasi'] = $koneksi->insert_id;
        setcookie("email_donatur", $email_donatur, time() +(365 * 24 * 60 * 60), "/");
        return true;
    }

    return false;
}

