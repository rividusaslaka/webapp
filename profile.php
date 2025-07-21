<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}
$lines = file("./data/users.txt");
foreach ($lines as $line) {
    list($storedUser, $storedEmail, $storedHash) = explode(",", trim($line));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="./css/style.css">
    <script type="text/javascript" src="./validation.js" defer></script>
</head>
<body>
<div class = "main">
    <div class="wrapper">
        <div class="profile">
            <h1>Profile Info</h1>
            <div class="upload">
            </div>
            <h3>Name: <?php echo htmlspecialchars($storedUser); ?></h3>
            <h3>Email: <?php echo htmlspecialchars($storedEmail); ?></h3>
            <button class="logout" onclick="window.location.href='./php/logout.php'">Logout</button>
            <p>new <a href="login.html">login</a> or <a href="registration.html">register</a></p>
        </div>
    </div>
</div>
</body>
</html>