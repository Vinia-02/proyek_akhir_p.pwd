<?php
session_start();
require_once 'config/locations.php';

$kontributor = $_SESSION['kontributor_data'] ?? null;
if (!$kontributor) {
    header('Location: form.php');
    exit();
}

$successMessage = $_SESSION['success'] ?? '';
unset($_SESSION['success']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Kontributor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="confirmation-page">
        <?php if ($successMessage): ?>
            <div class="success-msg"><?php echo htmlspecialchars($successMessage); ?></div>
        <?php endif; ?>

        <h2>Data Kontributor</h2>
        <p><strong>Nama Lengkap:</strong> <?php echo htmlspecialchars($kontributor['nama']); ?></p>
        <p><strong>Tanggal Lahir:</strong> <?php echo htmlspecialchars($kontributor['tgl_lahir']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($kontributor['email']); ?></p>
        <p><strong>No. Telepon:</strong> <?php echo htmlspecialchars($kontributor['telp']); ?></p>
        <p><strong>Lokasi:</strong> <?php echo htmlspecialchars(get_location_name($kontributor['lokasi'])); ?></p>

        <a href="home.php">Kembali ke Home</a>
    </div>
</body>
</html>
