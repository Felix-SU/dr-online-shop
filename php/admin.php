<?php
session_start();
$message = "";
include '../db/conn.php';
$error = false;
$action = $_POST['action'];
$id = $_POST['id'];

if ($action == "delete") { 
	deleteProduct($id);
}
else if ($action == "addProduct") { 
	$title =  $_POST['title'];
	$cost =  $_POST['cost'];
	$category =  $_POST['category'];
	$fileChanged = $_POST['fileChanged'];		
	addProduct($id,$title,$cost,$category,$fileChanged);
}

else if ($action == "updateProduct") { 
	$title =  $_POST['title'];
	$cost =  $_POST['cost'];
	$category =  $_POST['category'];
	$fileChanged = $_POST['fileChanged'];	
	updateProduct($id,$title,$cost,$category,$fileChanged);
}

function deleteProduct($product_id) {
	include '../db/conn.php';
	$id = $product_id;
	deleteImage($product_id);
	$delete = $conn->query("DELETE FROM product   WHERE id ='".$product_id."'");
}

function updateProduct($id,$title,$cost,$category,$fileChanged) {
	include '../db/conn.php';
	$imageSrc = "";
	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp'); 
	$path = '../img/ProductsPhoto/';
	if ($fileChanged == 'true') {
		if($_FILES['image']) {
			if($cost == "" || $title == "" || $category == "") {
				$message =  'One of field is empty';
				$error = true;
			}
			else {
				$img1 = $_FILES['image']['name'];
				$tmp1 = $_FILES['image']['tmp_name'];
				$img = preg_replace('/\s+/', '', $img1);
				$tmp = preg_replace('/\s+/', '', $tmp1);
				$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
				$final_image = rand(1000,1000000).$img;
				$final_image = preg_replace('/[^a-zA-Z0-9_.]/', '', $final_image);	
				if(in_array($ext, $valid_extensions)) {					
					$path = $path.strtolower($final_image);	
					if(move_uploaded_file($tmp,$path)) {
						$imageSrc =	$path;    
						deleteImage($id);
						$insert = $conn->query("UPDATE product  SET image='".$path."',title='".$title."',cost='".$cost."',category='".$category."' WHERE id ='".$id."'");
						$error = false;
						$message = 'Update is successful :3';		
					}
				}
			}
		}
		else  {
			$message =  'Not Valid File :c';
			$error = true;
		}
	}
	else if ($fileChanged == 'false') {
		$insert = $conn->query("UPDATE product  SET title='".$title."',cost='".$cost."',category='".$category."' WHERE id ='".$id."'");
		$message = 'Update is successful :3';
		$error = false;
	}
	echo json_encode(array($message,$imageSrc,$error));
	mysqli_close($conn);
} 

function addProduct($id,$title,$cost,$category,$fileChanged) {
	include '../db/conn.php';	
	$imageSrc = "";
	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp'); 
	$path = '../img/ProductsPhoto/';
	if ($fileChanged == 'true') {
		if($_FILES['image']) {
			if($cost == "" || $title == "" || $category == "") {
				$message =  'One of field is empty';
				$error = true;
			}
			else {
				$img1 = $_FILES['image']['name'];
				$tmp1 = $_FILES['image']['tmp_name'];
				$img = preg_replace('/\s+/', '', $img1);
				$tmp = preg_replace('/\s+/', '', $tmp1);
				$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
				$final_image = rand(1000,1000000).$img;
				$final_image = preg_replace('/[^a-zA-Z0-9_.]/', '', $final_image);
				if(in_array($ext, $valid_extensions)) {					
					$path = $path.strtolower($final_image);			
					if(move_uploaded_file($tmp,$path)) {
						$imageSrc =	$path;    
						$insert = $conn->query("INSERT INTO product  (image,title,cost,category) VALUES ('$path','$title','$cost','$category')  ");
						$error = false;
						$message = 'Image is added :3';		
						mysqli_close($conn);					
					}
				}
			}
		}
		else {
			$message =  'Not Valid File :c';
			$error = true;
		}
	}
	else if ($fileChanged == 'false') {
		$message = 'Please upload image :3';
		$error = true;
	}
	echo json_encode(array($message,$imageSrc,$error));
}

function deleteImage($prod_id) {
	include '../db/conn.php';
	$query = "SELECT image FROM product WHERE id = '$prod_id' ";
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_array($result);
	if($data['image'] !=="no-product-image.gif") unlink($data['image']);
}
?>