<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "green_community";

$connection = new mysqli($host, $user, $password, $database);

if ($connection->connect_error){
    die("Koneksi database gagal: ") . $connection->connect_error);
}
?>