<?php
require_once __DIR__ . '/../config/connect.php';

function get_all_projects(){
    global $koneksi;
    $stmt = $koneksi->prepare("SELECT * FROM projects");
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}
?>