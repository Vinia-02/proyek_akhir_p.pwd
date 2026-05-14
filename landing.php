<?php
session_start();

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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="dspg">
    <nav class="navbar">
        <div class="navbar-container">
        <a href="index.php" class="navdiv">
        <img style="width: 42px; margin-right: 10px;" src="assets/Logo1.png" alt="Green Community Logo">GREEN COMMUNITY ENGAGEMENT</a>
        <div class="nav-links">
            <ul>
                <li><a href="index.php#about">About Us</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li><a href="donation.php">Donation</a></li>
                <li class="divider">|</li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        </div>
    </nav>

    <div class="card-container">
        <div class="top-text">
            <span class="badge">♡ Thank You!</span>
            <h1>Donation Successful!</h1>
            <p>Thank you for your contribution to a cleaner and healthier environment.</p>
            <a href="index.php" class="balik">← Back to Homepage</a>
        </div>

    <div class="card-left">
        <h2>Data Donasi</h2>

        <p><strong>Nama Lengkap:</strong> <?php echo htmlspecialchars($namaDonatur); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($emailDonatur); ?></p>
        <p><strong>No. Telepon:</strong> <?php echo htmlspecialchars($telpDonatur); ?></p>
        <p><strong>Jumlah Donasi:</strong> Rp <?php echo htmlspecialchars($jumlahDonasi); ?></p>
    </div>

    </div>

</body>
</html>
