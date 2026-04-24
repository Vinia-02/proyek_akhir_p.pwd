<?php
require_once __DIR__ . '/../config/connect.php';

// create
function create_donasi($nama_donatur, $email_donatur, $telp_donatur, $jumlah_donasi){
    global $koneksi;

    $stmt = $koneksi->prepare("INSERT INTO donasi (nama_donatur, email_donatur, telp_donatur, jumlah_donasi) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nama_donatur, $email_donatur, $telp_donatur, $jumlah_donasi);

    if ($stmt->execute()){
        $_SESSION['id_donasi'] = $koneksi->insert_id;
        setcookie("email_donatur", $email_donatur, time() +(365 * 24 * 60 * 60), "/");
        return true;
    }
    return false;
}

// read
function get_donasi($id_donasi){
    global $koneksi;

    $stmt = $koneksi->prepare("SELECT * FROM donasi WHERE id_donasi = ?");
    $stmt->bind_param("i", $id_donasi);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// update
function update_donasi($id_donasi, $nama_donatur, $email_donatur, $telp_donatur, $jumlah_donasi) {
    global $koneksi;
    
    $stmt = $koneksi->prepare("UPDATE donasi SET nama_donatur=?, email_donatur=?, telp_donatur=?, jumlah_donasi=? WHERE id_donasi=?");
    $stmt->bind_param("sisesi", $nama_donatur, $email_donatur, $telp_donatur, $jumlah_donasi, $id_donasi);
    return $stmt->execute();
}

// delete
function delete_donasi($id_donasi, $nama_donatur, $email_donatur, $telp_donatur, $jumlah_donasi) {
    global $koneksi;
    
    $stmt = $koneksi->prepare(" DELETE FROM donasi WHERE id_donasi=?");
    $stmt->bind_param("i", $id_donasi);
    return $stmt->execute();
}
?>