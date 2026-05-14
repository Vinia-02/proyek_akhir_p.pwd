<?php
require_once __DIR__ . '/../config/connect.php';
require_once __DIR__ . '/../config/locations.php';

function create_kontributor($nama_kontributor, $tgl_lahir, $email_kontributor, $telp_kontributor, $lokasi){
    global $koneksi;

    $stmt = $koneksi->prepare("INSERT INTO kontributor (nama_kontributor, tgl_lahir, email_kontributor, telp_kontributor, lokasi) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nama_kontributor, $tgl_lahir, $email_kontributor, $telp_kontributor, $lokasi);

    if ($stmt->execute()){
        $_SESSION['id_kontributor'] = $koneksi->insert_id;
        setcookie("email_kontributor", $email_kontributor, time() +(365 * 24 * 60 * 60), "/");
        return true;
    }
    return false;
}
