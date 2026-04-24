<?php
session_start();
require_once 'config/locations.php';

$donasi = $_SESSION['donasi_data'] ?? null;
if (!$donasi) {
    header('Location: donation.php');
    exit();
}

$namaDonatur = $donasi['name'] ?? $donasi['nama'] ?? '';
$emailDonatur = $donasi['email'] ?? '';
$telpDonatur = $donasi['tel'] ?? $donasi['telp'] ?? '';
$jumlahDonasi = $donasi['amount'] ?? $donasi['jumlah'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Donasi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="landing-page">

        <h2>Konfirmasi Data Donasi</h2>
        <p><strong>Nama Lengkap:</strong> <?php echo htmlspecialchars($namaDonatur); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($emailDonatur); ?></p>
        <p><strong>No. Telepon:</strong> <?php echo htmlspecialchars($telpDonatur); ?></p>
        <p><strong>Jumlah Donasi:</strong> <?php echo htmlspecialchars($jumlahDonasi); ?></p>

        <a href="home.php">Kembali ke Home</a>
    </div>
</body>
</html>
