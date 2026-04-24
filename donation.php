<?php
require_once 'config/session.php';
require_once 'includes/donation_functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama_donatur = $_POST['name'] ?? '';
    $email_donatur = $_POST['email'] ?? '';
    $telp_donatur = $_POST['tel'] ?? '';
    $jumlah_donasi = $_POST['amount'] ?? '';

    if ($nama_donatur && $email_donatur && $telp_donatur && $jumlah_donasi){
        if (create_donasi($nama_donatur, $email_donatur, $telp_donatur, $jumlah_donasi)){
            $_SESSION['donasi_data'] = [
                'name' => $nama_donatur,
                'email' => $email_donatur,
                'tel' => $telp_donatur,
                'amount' => $jumlah_donasi
            ];
            header("Location: landing.php");
            exit();
        } else {
            if (empty($_SESSION['error'])) {
                $_SESSION['error'] = "Gagal menyimpan donasi. Coba lagi.";
            }
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
    <title>Donation Page | Green Community Engagement</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="donatepage">
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

     <section class="djt">
        <div class="dtek"><br><br><br><br>
            <button class="love">♡⁠ Support Our Mission</button>
            <h1>Every Nature, <br>
                Every Future</h1>
            <p>Your donation helps us clean, protect, and revive the environment. Join us in making a difference today.</p>
            <h3>"One touch of nature makes the whole world kin.</h3>
                <p>- William Shakespeare</p>
        </div>

    <div class="donate">
        <div class="earth">
            <h1>Make a Donation🍀</h1>
            <p>Every contribution, big or small, brings real change to our planet.</p>
            <form action="donation.php" method="post">
                <?php if (!empty($_SESSION['error'])): ?>
                    <p class="error-msg"><?php echo $_SESSION['error']; ?></p>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
                <label for="name">Full Name</label> <br>
                <div class="icon">
                    <i class="bi bi-person"></i> 
                    <input type="text" id="name" name="name" placeholder="Please enter your name" required> <br>
                </div>

                <label for="email">Email</label> <br>
                <div class="icon">
                    <span><i class="bi bi-envelope"></i></span>
                    <input type="email" id="email" name="email" placeholder="Please enter your email" required> <br>
                </div>

                <label for="tel">Phone Number</label> <br>
                <div class="icon">
                    <span><i class="bi bi-telephone"></i></span>
                    <input type="tel" id="tel" name="tel" placeholder="Please enter your phone number" required> <br>
                </div>

                <label for="amount">Your Donation</label><br>
                <input type="text" id="amount" name="amount" placeholder="ex: IDR 5,000" required> <br>

                <button type="submit" class="hehe">Make an Impact Now</button>
                <div class="okok">
                    <p><i class="bi bi-shield-lock"></i>Secure payment. Your data is protected.</p>
                </div>
            </form>
            </div>
        </div>
    </section>
   
</body>
</html>



