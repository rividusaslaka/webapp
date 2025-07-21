<?php
session_start();
if (isset($_POST['login'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $lines = file("../data/users.txt");
    foreach ($lines as $line) {
        list($storedUser, $storedEmail, $storedHash) = explode(",", trim($line));
        if ($storedEmail === $email && password_verify($password, $storedHash)) {
            $_SESSION["email"] = $email;
            header("Location: ../user_page.php");
            exit();
        }
    }
    $_SESSION['login_error'] = 'Incorrect email or password';
    $_SESSION['active_form'] = 'login';
    header("Location: ../login.html");
    exit();
}