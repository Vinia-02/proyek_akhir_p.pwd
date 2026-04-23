<?php
// Default theme (fallback sebelum cookie tersedia)
$tema = $_COOKIE["tema"] ?? "light";

// Inisialisasi cookie jika belum ada
if (!isset($_COOKIE["tema"])) {
    setcookie("tema", "light");
    // setcookie("tema", "light", time() + 300, "/");
    $tema = "light";
    header("Location: cookie.php");
    exit();
}

// Handle toggle
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tema = ($tema === "light") ? "dark" : "light";

    setcookie("tema", $tema);

    // Kalo mau ada expire timesnya,
    // setcookie("tema", $tema, time() + 300, "/");

    header("Location: cookie.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cookie Theme Switch</title>

  <link rel="stylesheet" href="./css/globals.css">

  <?php if ($tema === "light"): ?>
    <link rel="stylesheet" href="./css/light.css">
  <?php else: ?>
    <link rel="stylesheet" href="./css/dark.css">
  <?php endif; ?>

</head>
<body>

<form method="post">
  <button type="submit">SWITCH THEME</button>
</form>

</body>
</html>