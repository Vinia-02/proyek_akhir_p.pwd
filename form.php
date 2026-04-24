<?php
require_once 'config/session.php';
require_once 'includes/kontributor_functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama_kontributor = $_POST['nama'] ?? '';
    $tgl_lahir = $_POST['tgl'] ?? '';
    $email_kontributor = $_POST['email'] ?? '';
    $telp_kontributor = $_POST['telp'] ?? '';
    $lokasi = $_POST['lokasi'] ?? '';

    if ($nama_kontributor && $tgl_lahir && $email_kontributor && $telp_kontributor && $lokasi != 'pilih'){
        if (create_kontributor($nama_kontributor, $tgl_lahir, $email_kontributor, $telp_kontributor, $lokasi)){
            $_SESSION['kontributor_data'] = [
                'nama' => $nama_kontributor,
                'tgl_lahir' => $tgl_lahir,
                'email' => $email_kontributor,
                'telp' => $telp_kontributor,
                'lokasi' => $lokasi
            ];
            $_SESSION['success'] = "Selamat! Anda telah bergabung dengan komunitas kami!";
            header("Location: konfirm.php");
            exit();
        } else {
            $_SESSION['error'] = "Email sudah terdaftar!";
        }
    } else {
        $_SESSION['error'] = "Semua field harus diisi!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Page | Green Community Engagement</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="loginpage">
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

    <div class="ls">
        <h2>Join Our Community</h2>
        <?php if (!empty($_SESSION['error'])): ?>
            <p class="error-msg"><?php echo $_SESSION['error']; ?></p>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <form action="form.php" method="post">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="usn" name="nama" placeholder="Enter your username"> <br><br>

            <label for="tgl">Tanggal Lahir</label>
            <input type="date" id="tgl" name="tgl" placeholder="Enter your birthday"> <br><br>

            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Enter your email"> <br><br>

            <label for="telp">No. Telepon</label>
            <input type="text" id="telp" name="telp" placeholder="Enter your phone number"> <br><br>

            <label for="lokasi">Lokasi (Domisili)</label> <br>
            <select name="lokasi" id="lokasi">
                <option value="pilih">--- Pilih Lokasi ---</option>
                <option value="jkt">Jakarta</option>
                <option value="bdg">Bandung</option>
                <option value="yk">Yogyakarta</option>
                <option value="bali">Bali</option>
                <option value="sby">Surabaya</option>
                <option value="mdn">Medan</option>
                <option value="smrg">Semarang</option>
                <option value="mksr">Makassar</option>
                <option value="bp">Balikpapan</option>
                <option value="bl">Bandar Lampung</option>
                <option value="plmbg">Palembang</option>
                <option value="ponti">Pontianak</option>
                <option value="bjms">Banjarmasin</option>
                <option value="mnd">Manado</option>
                <option value="amb">Ambon</option>
                <option value="kpg">Kupang</option>
                <option value="mtrm">Mataram</option>
                <option value="lb">Labuan Bajo</option>
                <option value="srg">Sorong</option>
                <option value="jp">Jayapura</option>
                <option value="btm">Batam</option>
                <option value="pkbr">Pekanbaru</option>
                <option value="pdg">Padang</option>
                <option value="tgr">Tangerang</option>
                <option value="bks">Bekasi</option>
            </select> <br>

            <button type="submit" class="submit">Contribute</button>
        </form>
    </div>

</body>
</html>
