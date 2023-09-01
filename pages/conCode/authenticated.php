<?php
require_once(__DIR__. "/../../config/connection.php");
require_once(__DIR__. "/../../config/session.php");
require_once(__DIR__. "/../../library/functions.php");

if (isset($_POST['auth'])) {
    $id = $_GET['id'];
    $stmt = "SELECT username FROM influence WHERE id='$id'";
    $result= mysqli_query(connection(), $stmt);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    redirect("../profile/profile");
} 
