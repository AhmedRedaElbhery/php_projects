<?php


$conn = mysqli_connect("localhost", "root", "", "users");


if ($conn) {

    $id = $_POST['id'];
    $name =  $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if(isset($_FILES['my_image']))
    {
        $img_name = $_FILES['my_image']['name'];
        $img_tmp = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];

		$fileMimeType = mime_content_type($img_tmp);

        if($error == 0){

			$img_ex = pathinfo($img_name,PATHINFO_EXTENSION);

			$img_ex = strtolower($img_ex);

			$arr = array("jpg" , "jpeg" , "png");
			$mime = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml', 'image/webp'];

			if(in_array($img_ex,$arr) && in_array($fileMimeType,$mime)){

				$img_name = uniqid("IMG-",true). '.' . $img_ex;

				$img_upload_path = "uploads/" . $img_name;

				move_uploaded_file($img_tmp , $img_upload_path);

				$sql = "UPDATE `profiles` SET `name`='$name',`email`='$email',`phone`='$phone' ,`photo`='$img_upload_path' WHERE id = '$id'";

				mysqli_query($conn , $sql);

				$response=[
					'status'=> true,
					'msg'=> "Done",
					'name'=> $img_upload_path
				];
	
				echo JSON_encode($response);
				
			}

            else
			{
				$response=[
				'status'=> false,
				'msg'=> "error"

				];
	
				echo JSON_encode($response);
			}

		}

		else{
				$response=[
				'status'=> false,
				'msg'=> "error"

				];
	
				echo JSON_encode($response);
			}
    
	}

    else
    {
        $sql = "UPDATE `profiles` SET `name`='$name',`email`='$email',`phone`='$phone' WHERE id = '$id'";

        if (mysqli_query($conn, $sql)) {
            $response = [
                "status" => true,
                "msg" => "Done"
            ];
            echo json_encode($response);
        }
    }
}

?>
