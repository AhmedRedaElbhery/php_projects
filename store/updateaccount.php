<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$id = $_GET['id'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$img = $_FILES['img'];
	$conn = mysqli_connect("localhost","root","","commerce");

	if($img['name'] != ""){
		echo "img";
		
		if($img['error'] == 0){

			$fileMimeType = mime_content_type($img['tmp_name']);

			$img_ex = strtolower(pathinfo($img['name'],PATHINFO_EXTENSION));

			$arr_ex = array("png","jpeg","jpg");
			$mime = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml', 'image/webp'];

			if(in_array($img_ex,$arr_ex) && in_array($fileMimeType,$mime)){

				$img_name = uniqid("IMG-",true). '.' . $img_ex;
				$img_upload_path = "users_img/" . $img_name;

				move_uploaded_file($img['tmp_name'] , $img_upload_path);

				$sql = "UPDATE `users` SET `name`='$name',
						`email`='$email',`phone`='$phone',
						`img`='$img_upload_path'
						WHERE id = '$id'";

				mysqli_query($conn , $sql);
				header("location:profile.php?id=".$id);
			}

		}
	}

	else
	{
		$sql = "UPDATE `users` SET `name`='$name',
						`email`='$email',`phone`='$phone'
						WHERE id = '$id'";

				mysqli_query($conn , $sql);
				header("location:profile.php?id=".$id);
	}

}

?>