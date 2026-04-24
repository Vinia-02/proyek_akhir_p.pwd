<?php
require_once 'includes/project_functions.php';
$projects = get_all_projects();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects Page | Green Community Engagement</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="pp">
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
  <br>
<div class="card-group">
  <?php if (!empty($projects)): ?>
    <?php foreach ($projects as $project): ?>
      <div class="card">
        <img src="<?php echo htmlspecialchars($project['img_path']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($project['nama_projek']); ?>">
        <div class="card-body">
          <h5 class="card-title"><?php echo htmlspecialchars($project['nama_projek']); ?></h5>
          <p class="card-text"><?php echo nl2br(htmlspecialchars($project['deskripsi'])); ?></p>
        </div>
        <div class="card-footer">
          <small class="text-body-secondary">
            Lokasi: <?php echo htmlspecialchars($project['lokasi_projek']); ?>
            <br>
            Status: <?php echo htmlspecialchars($project['status']); ?>
          </small>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Tidak ada proyek</h5>
        <p class="card-text">Belum ada data proyek yang tersedia di database.</p>
      </div>
    </div>
  <?php endif; ?>
</div>
</body>
</html>