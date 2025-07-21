<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}
if (isset($_POST['contact'])) {
    $name = $_POST["contact-name"];
    $email = $_POST["contact-email"];
    $message = $_POST["message"];
    $line = "$name,$email,$message\n";
    file_put_contents("../data/contacts.txt", $line, FILE_APPEND);
    echo "Message sent! <a href='../user_page.php'>Go Home</a>";
}