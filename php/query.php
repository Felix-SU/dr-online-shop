<?php
if(!empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case "userExit": userExit(); break;
        case "changePassword": changePassword(); break;
        case "uploadProfilePhoto": uploadProfilePhoto(); break;
    }
    $action = NULL;
}
function getUserData($rowN) {
    include ('db/conn.php');
    $query = "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $row["$rowN"];
}
function userExit() {
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
}

function uploadProfilePhoto() {
    session_start();
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
    $path = '../img/UsersPhotos/';
    if($_FILES['image']) {
	    $user_id = $_SESSION['user_id'];
	    $img = $_FILES['image']['name'];
	    $tmp = $_FILES['image']['tmp_name'];		
	    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
	    $final_image = rand(1000,1000000).$img;
	    $final_image = preg_replace('/[^a-zA-Z0-9_.]/', '', $final_image);
	    if(in_array($ext, $valid_extensions)) {					
		    $path = $path.strtolower($final_image);	
		    if(move_uploaded_file($tmp,$path)) {
			    echo $path;
                include_once '../db/conn.php';
	            $query = "SELECT image_name FROM users WHERE user_id = {$_SESSION['user_id']}";
                $result = mysqli_query($conn, $query);
	            $row = mysqli_fetch_assoc($result);
	            if($row['image_name'] !=="img/default-user-image.png"){
	                unlink($row['image_name']);
	            }
                $insert = $conn->query("UPDATE users  SET image_name='".$path."' WHERE user_id ='".$user_id."'");
            }
        } 
	    else {
            echo 'invalid';
        }
    }
}

function changePassword() {
    session_start();
    include_once ('../db/conn.php');
    $user_id = $_SESSION['user_id'];
    $oldPass = mysqli_real_escape_string($conn, trim($_POST['oldPassword']));
    $newPass1 = mysqli_real_escape_string($conn, trim($_POST['newPassword1']));
    $newPass2 = mysqli_real_escape_string($conn, trim($_POST['newPassword2']));
    if($oldPass== '' || $newPass1 == '' || $newPass2 == '') {
        echo 'One of field is empty';
    }
    else {
        if ($newPass1 != $newPass2) {
            echo("Password IS Not Compare <br> ¯\(°_o)/¯");
        }
        else {
            $query = "SELECT `user_id` , `password` FROM `users` WHERE user_id = '$user_id' AND password = SHA('$oldPass')";
            $data = mysqli_query($conn,$query);
            if(mysqli_num_rows($data) == 1) {
                $insert = $conn->query("UPDATE users  SET password=SHA('$newPass1') WHERE user_id ='".$user_id."'");
                echo 'Nice';
            }
            else {
                echo 'Sorry Inccorect Current Password';
            }
        }
    }
}
?>