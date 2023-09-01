<?php 
use phpMailer\PHPMailer\PHPMailer;
use phpMailer\PHPMailer\Exception;

require_once(__DIR__. "/phpMailer/src/Exception.php");
require_once(__DIR__. "/phpMailer/src/PHPMailer.php");
require_once(__DIR__. "/phpMailer/src/SMTP.php");
require_once(__DIR__. "/../../library/functions.php");
require_once(__DIR__. "/../../config/connection.php");
require_once(__DIR__. "/../../config/session.php");


if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $stmt = "SELECT * FROM influence WHERE username = '$username'";
    $result = mysqli_query(connection(), $stmt);
    $row = mysqli_fetch_assoc($result);
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail-> Username = 'influencetechie@gmail.com';
    $mail->Password = 'ywlrpryyarnyczhe';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    
    $mail->setFrom('joshuajulius2030@gmail.com');


    $mail->addAddress($row['email']);

    $mail->isHTML(true);

    $mail->Subject = "Verification Code";
    $mail->Body = "<div> 
    <div><h2 style='font-size:20px; font-family:sans-serif; font-weight:600;'>Hello ".ucfirst($row['firstName'])." ". ucfirst($row['lastName'])."</h2></div>
    <div style='font-size:15px; font-family:sans-serif;'>Click on the button below to Activate your account<b>
    <br>
   <form action='http://localhost/influence_calculator_updated/pages/conCode/authenticated.php?id=".$row['id']."' method='POST'>
    <input type='submit' name='auth' style='width:100px; height:40px; color:#fff; font-size:15px; border:1px solid red; background-color: red; margin-top: 2rem;' value='Verify'>
   </form>
    </div>
   
    </div>
    ";

    $mail->send();
     
    // echo 
    // "
    //     <script>
    //         alert('Sent successfully');
    //         document.location.href = 'index.php';
    //     </script>
    // ";
    redirect("../conCode/code");
} 

?>