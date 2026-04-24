<?php
require_once __DIR__ . '/../config/connect.php';

// read
function get_all_projects(){
    global $koneksi;
    $stmt = $koneksi->prepare("SELECT * FROM projects");
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

// create
function create_projects($nama_projek, $deskripsi, $lokasi_projek, $tgl_mulai_projek, $tgl_akhir_projek, $status, $img_path){
    global $koneksi;

    $stmt = $koneksi->prepare("INSERT INTO projects (nama_projek, deskripsi, lokasi_projek, tgl_mulai_projek, tgl_akhir_projek, status, img_path) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $nama_projek, $deskripsi, $lokasi_projek, $tgl_mulai_projek, $tgl_akhir_projek, $status, $img_path);
}

// update
function update_projects($id_projek, $nama_projek, $deskripsi, $lokasi_projek, $tgl_mulai_projek, $tgl_akhir_projek, $status, $img_path) {
    global $koneksi;
    
    $stmt = $koneksi->prepare("UPDATE projects SET nama_projek=?, deskripsi=?, lokasi_projek=?, tgl_mulai_projek=?, tgl_akhir_projek=?, status=?, img_path=? WHERE id_projek=?");
    $stmt->bind_param("sisesi", $nama_projek, $deskripsi, $lokasi_projek, $tgl_mulai_projek, $tgl_akhir_projek, $status, $img_path, $id_projek);
    return $stmt->execute();
}

// delete
function delete_projects($id_projek, $nama_projek, $deskripsi, $lokasi_projek, $tgl_mulai_projek, $tgl_akhir_projek, $status, $img_path) {
    global $koneksi;
    
    $stmt = $koneksi->prepare(" DELETE FROM projects WHERE id_projek=?");
    $stmt->bind_param("i", $id_projek);
    return $stmt->execute();
}
?>
?>