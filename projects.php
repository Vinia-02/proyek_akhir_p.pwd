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
            <li class="divider">|</li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
      </div>
    </div>
  </nav>
  <section class="projects-hero">
    <h1>Our Green Projects</h1>
    <p>Explore community actions that protect, restore, and care for the environment.</p>
  </section>

  <section class="projects-grid">
    <?php if (!empty($projects)): ?>
      <?php foreach ($projects as $project): ?>
        <article class="project-card">
          <img src="<?php echo htmlspecialchars($project['img_path']); ?>" alt="<?php echo htmlspecialchars($project['nama_projek']); ?>">
          <div class="project-content">
            <span class="project-status"><?php echo htmlspecialchars($project['status']); ?></span>
            <p><?php echo htmlspecialchars($project['tgl_mulai_projek']); ?>
            <span class="divider">|</span>
            <?php echo htmlspecialchars($project['tgl_akhir_projek']); ?></p>
            <h3><?php echo htmlspecialchars($project['nama_projek']); ?></h3>
            <p><?php echo htmlspecialchars($project['deskripsi']); ?></p>
            <div class="project-location">
              Lokasi: <?php echo htmlspecialchars($project['lokasi_projek']); ?>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="empty-project">
        <h3>Tidak ada proyek</h3>
        <p>Belum ada data proyek yang tersedia di database.</p>
      </div>
    <?php endif; ?>
  </section>

</body>
</html>
