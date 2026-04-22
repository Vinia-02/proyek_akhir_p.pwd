<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="loginpage">
    <nav class="navbar">
            <div class="navbar-container">
            <a href="index.php" class="navdiv"> 
            <img style="width: 42px; margin-right: 10px;" src="assets/Logo1.png" alt="Green Community Logo">GREEN COMMUNITY ENGAGEMENT</a>
            <div class="nav-links">
                <ul>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="projects.php">Projects</a></li>
                    <li><a href="donation.php">Donation</a></li>
                </ul>
            </div>
        </div>
        </nav>

    <div class="ls">
        <h2>Join Our Community</h2>

        <form action="konfirm.php" method="post">
            <label for="usn">Nama Lengkap</label>
            <input type="text" id="usn" name="usn" placeholder="Enter your username"> <br><br>

            <label for="tgl">Tanggal Lahir</label>
            <input type="date" id="tgl" name="tgl" placeholder="Enter your birthday"> <br><br>

            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Enter your email"> <br><br>

            <label for="telp">No. Telepon</label>
            <input type="text" id="telp" name="telp" placeholder="Enter your phone number"> <br><br>

            <label for="lokasi">Lokasi (Domisili)</label> <br>
            <select name="Kelas" id="Kelas">
                <option value="pilih">--- Pilih Lokasi ---</option>
                <option value="jkt">Jakarta</option>
                <option value="bdg">Bandung</option>
                <option value="yk">Yogyakarta</option>
                <option value="bali">Bali</option>
                <option value="sby">Surabaya</option>
                <option value="mdn">Medan</option>
                <option value="smrg">Semarang</option>
                <option value="mksr">Makassar</option>
                <option value="bp">Balik Papan</option>
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