<?php
require_once './config/session.php';
require_once 'includes/project_functions.php';

if (!isset($_SESSION['nama_pengguna'])) {
    header('Location: login.php?alert=Login terlebih dahulu!');
    exit();
}

$is_admin = ($_SESSION['role'] ?? 'user') === 'admin';
if (!$is_admin) {
    header('Location: projects.php');
    exit();
}

$id_projek = trim($_GET['id'] ?? $_POST['id_projek'] ?? '');
$message = '';

if ($id_projek === '') {
    header('Location: projects.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_projek = trim($_POST['nama_projek'] ?? '');
    $deskripsi = trim($_POST['deskripsi'] ?? '');
    $lokasi_projek = trim($_POST['lokasi_projek'] ?? '');
    $tgl_mulai_projek = trim($_POST['tgl_mulai_projek'] ?? '');
    $tgl_akhir_projek = trim($_POST['tgl_akhir_projek'] ?? '');
    $status = trim($_POST['status'] ?? '');
    $img_path = trim($_POST['img_path'] ?? '');

    if ($nama_projek && $deskripsi && $lokasi_projek && $tgl_mulai_projek && $tgl_akhir_projek && $status && $img_path) {
        if (update_projects($id_projek, $nama_projek, $deskripsi, $lokasi_projek, $tgl_mulai_projek, $tgl_akhir_projek, $status, $img_path)) {
            header('Location: projects.php?updated=1');
            exit();
        }

        $message = 'Proyek gagal diperbarui.';
    } else {
        $message = 'Semua field proyek wajib diisi.';
    }
}

$project = get_project_by_id($id_projek);
if (!$project) {
    header('Location: projects.php');
    exit();
}

function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Proyek | Green Community Engagement</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="edit-project-page">
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

  <main class="edit-project-wrapper">
    <header class="edit-project-header">
      <h1>Perbarui Informasi Proyek</h1>
      <p>Lakukan perubahan pada detail proyek agar data kegiatan tetap akurat.</p>
    </header>

    <section class="edit-project-card">
      <form class="project-edit-form" action="editprojek.php?id=<?php echo e($project['id_projek']); ?>" method="POST">
        <input type="hidden" name="id_projek" value="<?php echo e($project['id_projek']); ?>">

        <?php if ($message): ?>
          <p class="admin-project-message"><?php echo e($message); ?></p>
        <?php endif; ?>

        <label for="nama_projek">Nama Proyek</label>
        <input type="text" id="nama_projek" name="nama_projek" value="<?php echo e($project['nama_projek']); ?>" required>

        <label for="deskripsi">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" rows="5" required><?php echo e($project['deskripsi']); ?></textarea>

        <label for="lokasi_projek">Lokasi</label>
        <input type="text" id="lokasi_projek" name="lokasi_projek" value="<?php echo e($project['lokasi_projek']); ?>" required>

        <div class="project-form-grid">
          <div>
            <label for="tgl_mulai_projek">Tanggal Mulai</label>
            <input type="date" id="tgl_mulai_projek" name="tgl_mulai_projek" value="<?php echo e($project['tgl_mulai_projek']); ?>" required>
          </div>
          <div>
            <label for="tgl_akhir_projek">Tanggal Akhir</label>
            <input type="date" id="tgl_akhir_projek" name="tgl_akhir_projek" value="<?php echo e($project['tgl_akhir_projek']); ?>" required>
          </div>
        </div>

        <label for="status">Status</label>
        <select id="status" name="status" required>
          <?php
            $statuses = ['planning', 'ongoing', 'completed'];
            if (!in_array($project['status'], $statuses, true)) {
                $statuses[] = $project['status'];
            }
          ?>
          <?php foreach ($statuses as $status): ?>
            <option value="<?php echo e($status); ?>" <?php echo $project['status'] === $status ? 'selected' : ''; ?>>
              <?php echo e($status); ?>
            </option>
          <?php endforeach; ?>
        </select>

        <label for="img_path">Path Gambar</label>
        <input type="text" id="img_path" name="img_path" value="<?php echo e($project['img_path']); ?>" required>

        <div class="project-form-actions">
          <button type="submit">Simpan Perubahan</button>
          <a href="projects.php">Batal</a>
        </div>
      </form>

      <aside class="edit-project-info">
        <h2>Mode Penyuntingan</h2>
        <p>Anda sedang mengubah data proyek. Pastikan informasi nama, lokasi, tanggal, status, dan gambar sudah sesuai sebelum disimpan.</p>
        <div class="edit-project-note">
          Perubahan ini akan langsung tampil pada halaman Projects.
        </div>
      </aside>
    </section>
  </main>
</body>
</html>
