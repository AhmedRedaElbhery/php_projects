<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $select = $_POST['select'];
    $file = $_FILES['pic'];

    $password = password_hash($password, PASSWORD_DEFAULT);

    $conn = mysqli_connect("localhost","root","");
    if($conn){

        $conn = mysqli_connect("localhost","root","","voting");
            
        if ($file['error'] == 0) {

			$fileMimeType = mime_content_type($file['tmp_name']);

			$img_ex = pathinfo($file['name'],PATHINFO_EXTENSION);

			$img_ex = strtolower($img_ex);

			$allwoed = array("jpg" , "jpeg" , "png");

			$mime = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml', 'image/webp'];

			if(in_array($img_ex,$allwoed) && in_array($fileMimeType,$mime))
            {

				$img_name = uniqid("IMG-",true). '.' . $img_ex;

				$img_upload_path = "uploads/" . $img_name;

				move_uploaded_file($file['tmp_name'] , $img_upload_path);

				$sql = "INSERT INTO `table`(`name`, `email`, `phone`, `password`, `select` , `pic`) VALUES ('$name','$email','$phone','$password','$select' , '$img_upload_path')";

                mysqli_query($conn , $sql);
                header("location:index.php");
                
			}

            else
            {

                $sql = "INSERT INTO `table`(`name`, `email`, `phone`, `password`, `select`) VALUES ('$name','$email','$phone','$password','$select')";

                mysqli_query($conn , $sql);
                 header("location:index.php");
            }


        }

        else{

            $sql = "INSERT INTO `table`(`name`, `email`, `phone`, `password`, `select`) VALUES ('$name','$email','$phone','$password','$select')";

            mysqli_query($conn , $sql);
            header("location:index.php");
        }
        
    }

    header("location:index.php");
}


?>
