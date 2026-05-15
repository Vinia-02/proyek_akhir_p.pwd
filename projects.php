<?php
require_once './config/session.php';
require_once 'includes/project_functions.php';

if (!isset($_SESSION['nama_pengguna'])) {
    header('Location: login.php?alert=Login terlebih dahulu!');
    exit();
}

$is_admin = ($_SESSION['role'] ?? 'user') === 'admin';
$message = '';
if (isset($_GET['created'])) {
    $message = 'Proyek berhasil ditambahkan.';
} elseif (isset($_GET['updated'])) {
    $message = 'Proyek berhasil diperbarui.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!$is_admin) {
        header('Location: projects.php');
        exit();
    }

    $action = $_POST['action'] ?? '';
    $id_projek = trim($_POST['id_projek'] ?? '');

    if ($action === 'delete' && $id_projek !== '') {
        $message = delete_projects($id_projek) ? 'Proyek berhasil dihapus.' : 'Proyek gagal dihapus.';
    }

    if ($action === 'update') {
        $nama_projek = trim($_POST['nama_projek'] ?? '');
        $deskripsi = trim($_POST['deskripsi'] ?? '');
        $lokasi_projek = trim($_POST['lokasi_projek'] ?? '');
        $tgl_mulai_projek = trim($_POST['tgl_mulai_projek'] ?? '');
        $tgl_akhir_projek = trim($_POST['tgl_akhir_projek'] ?? '');
        $status = trim($_POST['status'] ?? '');
        $img_path = trim($_POST['img_path'] ?? '');

        if ($id_projek && $nama_projek && $deskripsi && $lokasi_projek && $tgl_mulai_projek && $tgl_akhir_projek && $status && $img_path) {
            $message = update_projects($id_projek, $nama_projek, $deskripsi, $lokasi_projek, $tgl_mulai_projek, $tgl_akhir_projek, $status, $img_path)
                ? 'Proyek berhasil diperbarui.'
                : 'Proyek gagal diperbarui.';
        } else {
            $message = 'Semua field proyek wajib diisi.';
        }
    }

}

$projects = get_all_projects();

function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
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
    <link rel="stylesheet" href="style.css?v=1">
</head>
<body class="pp">
  <nav class="navbar">
    <div class="navbar-container">
    <a href="index.php" class="navdiv"> 
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
    <div>
      <h1>Our Green Projects</h1>
      <p>Explore community actions that protect, restore, and care for the environment.</p>
    </div>
    <div class="btn-tambah">
    <a href="tambahprojek.php">Tambah Projek +</a>
    </div>
  </section>

  <?php if ($is_admin): ?>
      <?php if ($message): ?>
    <section class="admin-project-panel admin-project-panel-message">
        <p class="admin-project-message"><?php echo e($message); ?></p>
    </section>
      <?php endif; ?>
  <?php endif; ?>

  <section class="projects-grid">
    <?php if (!empty($projects)): ?>
      <?php foreach ($projects as $project): ?>
        <article class="project-card">
          <img src="<?php echo e($project['img_path']); ?>" alt="<?php echo e($project['nama_projek']); ?>">
          <div class="project-content">
            <span class="project-status"><?php echo e($project['status']); ?></span>
            <p><?php echo e($project['tgl_mulai_projek']); ?>
            <span class="divider">|</span>
            <?php echo e($project['tgl_akhir_projek']); ?></p>
            <h3><?php echo e($project['nama_projek']); ?></h3>
            <p><?php echo e($project['deskripsi']); ?></p>
            <div class="project-location">
              Lokasi: <?php echo e($project['lokasi_projek']); ?>
            </div>
            <?php if ($is_admin): ?>
              <div class="project-admin-actions">
                <a href="editprojek.php?id=<?php echo e($project['id_projek']); ?>">Edit</a>
                <form action="projects.php" method="POST" onsubmit="return confirm('Yakin ingin menghapus proyek ini?');">
                  <input type="hidden" name="action" value="delete">
                  <input type="hidden" name="id_projek" value="<?php echo e($project['id_projek']); ?>">
                  <button type="submit">Hapus</button>
                </form>
              </div>
            <?php endif; ?>
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
