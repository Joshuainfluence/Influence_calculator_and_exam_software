<?php
require_once(__DIR__ . "/../../config/connection.php");
require_once(__DIR__ . "/../../library/functions.php");
require_once(__DIR__ . "/../../config/session.php");

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$conPassword = $_POST['conPassword'];
$phone = $_POST['phone'];

$data = [
    "firstName" => $firstName,
    "lastName" => $lastName,
    "email" => $email,
    "username" => $username,
    "password" => password_encrypt($password),
    "phone" => $phone,
    "regNO" => regNo()
];
try {
    required($firstName, "First name");
    required($lastName, "Last name");
    email($email, "Email address");
    required($username, "Username");
    user_val($username, "Username");
    required($password, "Password");
    pass_length($password, "Passwords");
    // pass_length($password, "password");
    val_pass($password, $conPassword);
    required($phone, "Phone");
    phone_val($phone, "Phone number");
    phone_length($phone);
    

    // phone_length($phone, "Phone number");
    save_users($data);
    $_SESSION['username'] = $username;
    redirect("../sendEmail/send");
} catch (\Exception $e) {
    set_message("error", $e->getMessage());
    redirect("signup");
}
