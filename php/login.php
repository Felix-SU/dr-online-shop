<?php
session_start();
include_once ('../db/conn.php');
if(!isset($_COOKIE['username'])) {
    $user_username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $user_username = strtolower($user_username);
    $user_password = mysqli_real_escape_string($conn, trim($_POST['password']));
    if($user_username == '' || $user_password == '') {
        echo 'One of field is empty';
    }
    else {
        if(!empty($user_username) && !empty($user_password)) {
            $query = "SELECT `user_id` , `username`, `email` FROM `users` WHERE username = '$user_username' AND password = SHA('$user_password')";
            $data = mysqli_query($conn,$query);
            if(mysqli_num_rows($data) == 1) {
                $row = mysqli_fetch_assoc($data);
                $user_id = $row['user_id'];
                $userName = $row['username'];
                $email = $row['email'];
                $_SESSION['user_id'] = $row['user_id'];
                echo 'Yay :3';
            }
            else {
                echo 'Sorry Inccorect password or login';
            }
        }
    }
}
else {
    echo 'Cookie set';
}
?>