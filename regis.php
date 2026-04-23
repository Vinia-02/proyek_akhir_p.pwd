<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;1,700&display=swap" rel="stylesheet">
</head>
<body class="re">
<div class="left">
        <div class="pic">
            <img src="assets/l.jpg" alt="login">
        </div>

    <div class="right">
        <div class="go">
                <img src="assets/logo2.png" alt="logo">
            <h5>Welcome to Green Community Engagement!</h5>
            <form action="login.php" method="POST">
                <label for="usn">Username: </label> <br>
                <input type="text" id="usn" name="usn" placeholder="Enter your username" required> <br>

                <label for="email">Email: </label> <br>
                <input type="email" id="email" name="email" placeholder="Enter your email" required> <br>

                <label for="pw">Password: </label> <br>
                <input type="password" id="pw" name="pw" placeholder="Enter your password" required> <br>

                <button>Register</button>
                <h6>Already have an account? <a href="login.php">Login</a></h6>
            </form>
        </div>
    </div>
</div> 
</body>
</html>