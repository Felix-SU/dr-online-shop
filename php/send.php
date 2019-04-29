<?php
session_start();
require 'lib/class.phpmailer.php';
require 'lib/class.smtp.php';
if(isset($_SESSION['user_id'])) {
    include_once ('../db/conn.php');
    $query = "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result); 
    $haha = $row['username'];
}
$name = $_POST['prod'];
$username = $row['username'];
$email = $row['email'];
$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->Host = 'smtp.gmail.com';  
$mail->SMTPAuth = true;                      
$mail->Username = 'youremail@gmail.com'; 
$mail->Password = 'yourpassword';
$mail->SMTPSecure = 'ssl';                            
$mail->Port = 465;
$mail->CharSet = 'UTF-8';
$mail->setFrom('...');
$mail->addAddress($email);
$mail->isHTML(true); 
$mail->Subject = "Dear ".$username;
$zz = "<h1 style = 'color:black'>You ordered in our site this things ( ⚆ _ ⚆ )</h1>";
$mail->Body = $zz."<h1 style = 'color: black'>".$name."</h1><h2 style = 'color:black'>With best wishes from PixelMonster Team  ༼ つ  ͡° ͜ʖ ͡° ༽つ</h2>";
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
else {
    echo 'Message Send';
}
?>
