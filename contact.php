<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class = "main">
    <div class="wrapper">
        <form action="./php/contact.php" method="post" class="contact">
            <div class="contact-title">
                <h1>Contact</h1>
            </div>
            <input type="text" name = "contact-name" placeholder="Name" class="contact-input" required>
            <input type="email" name = "contact-email" placeholder="Email" class="contact-input" required>
            <textarea name="message" placeholder="Message" class="contact-input" required></textarea>
            <button type="submit" class="submit" name="contact">Submit</button>
        </form>
    </div>
</div>
    
</body>
</html>