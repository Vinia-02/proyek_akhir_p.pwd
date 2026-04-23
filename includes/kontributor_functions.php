<?php
require_once __DIR__ . '/../config/connect.php';
require_once __DIR__ . '/../config/locations.php';

// create
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

// read
function get_kontributor($id_kontributor){
    global $koneksi;

    $stmt = $koneksi->prepare("SELECT * FROM kontributor WHERE id_kontributor = ?");
    $stmt->bind_param("i", $id_kontributor);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// update
function update_kontributor($id_kontributor, $nama_kontributor, $tgl_lahir, $email_kontributor, $telp_kontributor, $location) {
    global $koneksi;
    
    $stmt = $koneksi->prepare("UPDATE kontributor SET nama_kontributor=?, tgl_lahir=?, email_kontributor=?, telp_kontributor=?, location=? WHERE kontributor_id=?");
    $stmt->bind_param("sisesi", $nama_kontributor, $tgl_lahir, $email_kontributor, $telp_kontributor, $location, $id_kontributor);
    return $stmt->execute();
}

// delete
function delete_kontributor($id_kontributor, $nama_kontributor, $tgl_lahir, $email_kontributor, $telp_kontributor, $location) {
    global $koneksi;
    
    $stmt = $koneksi->prepare(" DELETE FROM kontributors WHERE id_kontributor=?");
    $stmt->bind_param("i", $id_kontributor);
    return $stmt->execute();
}
?>