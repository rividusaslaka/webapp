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
    <title>Welcome</title>
    <link rel="stylesheet" href="./css/style.css">
    <script type="text/javascript" src="./validation.js" defer></script>
</head>
<body>
    <div class="menu">
            <a href="#">Home</a>
            <a href="./profile.php">Profile</a>
            <a href="./contact.php">Contact</a>
            <button class="logout" onclick="window.location.href='./php/logout.php'">Logout</button>
        </ul>
    </div>
    
    <div class="welcome">
        <h1>Hi! <span><?php echo htmlspecialchars($storedUser); ?></span></h1>
        <h1>Welcome </h1>  
    </div>
    
    
</body>
</html>