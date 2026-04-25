<?php
session_start();
require_once 'config/locations.php';

$kontributor = $_SESSION['kontributor_data'] ?? null;
if (!$kontributor) {
    header('Location: form.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Kontributor</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body class="kfpg">
     <nav class="navbar">
            <div class="navbar-container">
            <a href="home.php" class="navdiv"> 
            <img style="width: 42px; margin-right: 10px;" src="assets/Logo1.png" alt="Green Community Logo">GREEN COMMUNITY ENGAGEMENT</a>
            <div class="nav-links">
                <ul>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="projects.php">Projects</a></li>
                    <li><a href="donation.php">Donation</a></li>
                    <span class="divider">|</span>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        </nav>

    <div class="card-container">
<<<<<<< HEAD
        <div class="card-left">
=======

    <div class="top-text">
        <span class="badge">♡ Thank You!</span>
        <h1>Welcome! <br>
            You’ve successfully joined our community</h1>
        <p>Thank you for joining our mission to create a cleaner, healthier environment.</p>
        <a href="home.php" class="balik">← Back to Homepage</a>
    </div>

    <div class="card-left">
>>>>>>> 23cc5dfd37dfc5fd8f193696d9f62eeff432561b
        <h2>Data Kontributor</h2>
        <p><strong>Nama Lengkap:</strong> <?php echo htmlspecialchars($kontributor['nama']); ?></p>
        <p><strong>Tanggal Lahir:</strong> <?php echo htmlspecialchars($kontributor['tgl_lahir']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($kontributor['email']); ?></p>
        <p><strong>No. Telepon:</strong> <?php echo htmlspecialchars($kontributor['telp']); ?></p>
        <p><strong>Lokasi:</strong> <?php echo htmlspecialchars(get_location_name($kontributor['lokasi'])); ?></p>
    </div>
</div>
</body>
</html>
