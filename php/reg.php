<?php
require 'lib/class.phpmailer.php';
require 'lib/class.smtp.php';
include_once ('../db/conn.php');
function generate_string($strength = 16) {
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $input_length = strlen($permitted_chars);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }    
    return $random_string;
}
$username = mysqli_real_escape_string($conn, trim($_POST['name1']));
$username = strtolower($username);
$password1 = mysqli_real_escape_string($conn, trim($_POST['email1']));
$password2 = mysqli_real_escape_string($conn, trim($_POST['password1']));
$email = mysqli_real_escape_string($conn, trim($_POST['email']));
$temp_key = mysqli_real_escape_string($conn,trim($_POST['temp_key']));
$email_key = mysqli_real_escape_string($conn,trim($_POST['email_key']));
if($username == '' || $password1 == '' || $password2 == ''|| $email == '') {
    $message ='One of field is empty';
}
else if (preg_match_all('/[^A-Za-z0-9]+/',$username)) {
    $message ='You can use only english letters and digits';
}
else if ($password1 != $password2) {
  $message = "Password Is Not Compare⠀⠀⠀ ⠀⠀¯\(°_o)/¯";
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $message = "$email is not a valid email address Use Mail Like This areuserious@wtf.com";
}
else {
    if(!empty($username) && !empty($password1) && !empty($password2) && !empty($email)) {
        $query = "SELECT * FROM `users` WHERE username = '$username'";
        $data = mysqli_query($conn, $query);
        $query2 = "SELECT * FROM `users` WHERE email = '$email'";
        $data2 = mysqli_query($conn, $query2);
        if(mysqli_num_rows($data) == 0) {
            if(mysqli_num_rows($data2) == 0) {
                if($email_key == "") {
                    $email_key = generate_string(5);
                    $mail = new PHPMailer;
                    $mail->isSMTP(); 
                    $mail->Host = 'smtp.gmail.com';  
                    $mail->SMTPAuth = true;                      
                    $mail->Username = 'youemail@gmail.com'; 
                    $mail->Password = 'yourpassword';
                    $mail->SMTPSecure = 'ssl';                            
                    $mail->Port = 465;
                    $mail->CharSet = 'UTF-8';
                    $mail->setFrom('...');
                    $mail->addAddress($email);
                    $mail->isHTML(true); 
                    $mail->Subject = "Confirm Email";
                    $zz = "<h1 style = 'color:black'>Please Confirm Email ( ^ _ ^ )</h1>";
                    $mail->Body = $zz."<h1 style = 'color: black'></h1><h2 style = 'color:black'>You Code is $email_key  ༼ つ  ͡° ͜ʖ ͡° ༽つ</h2>";
                    if(!$mail->send()) {
                        $message = 'Message could not be sent';
                    }
                    else {
                        $message ="You Must Confirm Email";
                    }
                }   
                else if($email_key != "") {
                    if($temp_key != "") {
                        if($temp_key == $email_key) {    
                            $query = "INSERT INTO `users` (username, password,email) VALUES ('$username', SHA('$password1'), '$email')";
                            mysqli_query($conn, $query);
                            $message= 'Nice Done ( ͡° ͜ʖ ͡°)';
                            mysqli_close($conn);
                        }
                        else {
                            $message="Wrong Code";
                        }
                    }
                    else {
                        $message="Write Code";
                    }
                }
            }
            else {
                $message = "Email Is Already Used ¯\_(ツ)_/¯";
            }
        }
        else {
            $message = "Login Is Exists ¯\_(ツ)_/¯";
        }
    }
}
echo json_encode(array($message,$email_key));
?>