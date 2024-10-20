<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$img = $_FILES['img'];
	
	$password = password_hash($password,PASSWORD_DEFAULT);

	$conn = mysqli_connect("localhost","root","");
	if($conn){

		$conn = mysqli_connect("localhost","root","","commerce");

		$sql = "SELECT * FROM `users` WHERE email = '$email'";

		$result = mysqli_query($conn , $sql);

		if($result && mysqli_num_rows($result) > 0){
			
			header("location:register.php?error");
		}
		else{
			if($img['error'] == 0){

			$fileMimeType = mime_content_type($img['tmp_name']);

			$img_ex = strtolower(pathinfo($img['name'],PATHINFO_EXTENSION));

			$arr_ex = array("png","jpeg","jpg");
			$mime = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml', 'image/webp'];

			if(in_array($img_ex,$arr_ex) && in_array($fileMimeType,$mime)){

				$img_name = uniqid("IMG-",true). '.' . $img_ex;
				$img_upload_path = "users_img/" . $img_name;

				move_uploaded_file($img['tmp_name'] , $img_upload_path);

				$sql = "INSERT INTO `users`( `name`, `email`, `phone`, `password` , `img`)
				VALUES ('$name','$email','$phone','$password' , '$img_upload_path')";

				mysqli_query($conn , $sql);
				header("location:index.php");
			}

			}
			else{

				$sql = "INSERT INTO `users`( `name`, `email`, `phone`, `password`)
					VALUES ('$name','$email','$phone','$password')";

				mysqli_query($conn , $sql);

				header("location:index.php");
			}
		}
	}
}
?>