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

$message = '';
$id_projek = '';
$nama_projek = '';
$deskripsi = '';
$lokasi_projek = '';
$tgl_mulai_projek = '';
$tgl_akhir_projek = '';
$status = 'planning';
$img_path = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_projek = trim($_POST['id_projek'] ?? '');
    $nama_projek = trim($_POST['nama_projek'] ?? '');
    $deskripsi = trim($_POST['deskripsi'] ?? '');
    $lokasi_projek = trim($_POST['lokasi_projek'] ?? '');
    $tgl_mulai_projek = trim($_POST['tgl_mulai_projek'] ?? '');
    $tgl_akhir_projek = trim($_POST['tgl_akhir_projek'] ?? '');
    $status = trim($_POST['status'] ?? '');
    $img_path = trim($_POST['img_path'] ?? '');

    if ($nama_projek && $deskripsi && $lokasi_projek && $tgl_mulai_projek && $tgl_akhir_projek && $status && $img_path) {
        if (create_projects($id_projek, $nama_projek, $deskripsi, $lokasi_projek, $tgl_mulai_projek, $tgl_akhir_projek, $status, $img_path)) {
            header('Location: projects.php?created=1');
            exit();
        }

        $message = 'Proyek gagal ditambahkan.';
    } else {
        $message = 'Semua field proyek wajib diisi.';
    }
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
    <title>Tambah Proyek | Green Community Engagement</title>
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
      <h1>Tambah Proyek Baru</h1>
      <p>Masukkan detail di form untuk menambahkan proyek baru.</p>
    </header>

    <section class="edit-project-card">
      <form class="project-edit-form" action="tambahprojek.php" method="POST">
        <?php if ($message): ?>
          <p class="admin-project-message"><?php echo e($message); ?></p>
        <?php endif; ?>

        <label for="id_projek">ID Proyek</label>
        <input type="text" id="id_projek" name="id_projek" placeholder="Format: PRJ-[TAHUN]-[NOMOR]" value="<?php echo e($id_projek); ?>" required>

        <label for="nama_projek">Nama Proyek</label>
        <input type="text" id="nama_projek" name="nama_projek" placeholder="Contoh: Urban Farming Hub" value="<?php echo e($nama_projek); ?>" required>

        <label for="deskripsi">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" rows="5" placeholder="Contoh: Transformasi lahan tidur menjadi kebun hidroponik komunal untuk ketahanan pangan warga." required><?php echo e($deskripsi); ?></textarea>

        <label for="lokasi_projek">Lokasi</label>
        <input type="text" id="lokasi_projek" name="lokasi_projek" placeholder="Contoh: Medan" value="<?php echo e($lokasi_projek); ?>" required>

        <div class="project-form-grid">
          <div>
            <label for="tgl_mulai_projek">Tanggal Mulai</label>
            <input type="date" id="tgl_mulai_projek" name="tgl_mulai_projek" value="<?php echo e($tgl_mulai_projek); ?>" required>
          </div>
          <div>
            <label for="tgl_akhir_projek">Tanggal Akhir</label>
            <input type="date" id="tgl_akhir_projek" name="tgl_akhir_projek" value="<?php echo e($tgl_akhir_projek); ?>" required>
          </div>
        </div>

        <label for="status">Status</label>
        <select id="status" name="status" required>
          <?php foreach (['planning', 'ongoing', 'completed'] as $option): ?>
            <option value="<?php echo e($option); ?>" <?php echo $status === $option ? 'selected' : ''; ?>>
              <?php echo e($option); ?>
            </option>
          <?php endforeach; ?>
        </select>

        <label for="img_path">Path Gambar</label>
        <input type="text" id="img_path" name="img_path" value="<?php echo e($img_path); ?>" placeholder="Contoh: asetProjects/nama_gambar.png" required>

        <div class="project-form-actions">
          <button type="submit">Simpan Proyek</button>
          <a href="projects.php">Batal</a>
        </div>
      </form>

      <aside class="edit-project-info">
        <h2>Format ID Proyek</h2>
        <p>ID proyek dibuat otomatis dengan format PRJ-[Tahun dibuat]-[NO], contohnya PRJ-2026-011.</p>
        <div class="edit-project-note">
          Proyek baru akan langsung tampil pada halaman Projects setelah disimpan.
        </div>
      </aside>
    </section>
  </main>
</body>
</html>
