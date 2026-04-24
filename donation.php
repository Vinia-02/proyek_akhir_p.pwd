<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Page | Green Community Engagement</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
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
                    <span class="divider">|</span>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="donate">
        <div class="earth">
            <h1>Make a Donation</h1>
            <p>Every contribution, big or small, brings real change to our planet.</p>
            <form action="landing.php" method="post">
                <label for="name">Full Name:</label> <br>
                <div class="icon">
                    <i class="bi bi-person"></i> 
                    <input type="text" id="name" name="name" placeholder="Please enter your name" required> <br>
                </div>

                <label for="email">Email:</label> <br>
                <div class="icon">
                    <span><i class="bi bi-envelope"></i></span>
                    <input type="email" id="email" name="email" placeholder="Please enter your email" required> <br>
                </div>

                <button type="submit">Donate Now</button>
                </div>
            </form>

        </div>
    </section>
   
</body>
</html>



