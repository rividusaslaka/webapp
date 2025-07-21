<?php
if (isset($_POST['register'])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $line = "$username,$email,$password\n";
    file_put_contents("../data/users.txt", $line, FILE_APPEND);
    header("Location: ../login.html");
    exit();
}