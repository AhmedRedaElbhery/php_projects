<?php


if (isset($_POST['name'], $_POST['email'], $_POST['phone']) && isset($_FILES['photo'])) {
    // Connect to the MySQL server
    $conn = mysqli_connect("localhost", "root", "", "users");

    // Check if the connection was successful
    if ($conn) {
        // Get and sanitize input values
        $name =  $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $img_name = $_FILES['photo']['name'];
		$img_tmp = $_FILES['photo']['tmp_name'];
		$error = $_FILES['photo']['error'];


        if($error == 0){

			$img_ex = pathinfo($img_name,PATHINFO_EXTENSION);

			$img_ex = strtolower($img_ex);

			$allwoed = array("jpg" , "jpeg" , "png");

			if(in_array($img_ex,$allwoed)){

				$img_name = uniqid("IMG-",true). '.' . $img_ex;

				$img_upload_path = "uploads/" . $img_name;

				if (!is_dir('uploads')) {
					mkdir('uploads', 0755, true);
				}

				move_uploaded_file($img_tmp , $img_upload_path);

                // SQL query to insert data into the `profiles` table
                $sql = "INSERT INTO `profiles` (`name`, `email`, `phone`, `photo`) VALUES ('$name', '$email', '$phone', '$img_upload_path')";

                // Execute the query and check if successful
                if (mysqli_query($conn, $sql)) {
                    $response = [
                        "status" => true,
                        "msg" => "Done",
                        'name' => $img_upload_path
                    ];
                    echo json_encode($response);
                } 
                else 
                {
                    // Capture the error message for debugging
                    $error_message = mysqli_error($conn);
                    $response = [
                        "status" => false,
                        "msg" => "Error: " . $error_message
                    ];
                    echo json_encode($response);
                }
				
			}
        }
        

    }


    else
    {
        $response = [
            "status" => false,
            "msg" => "Database connection failed"
        ];
        echo json_encode($response);
    }


}

else
{
    $response = [
        "status" => false,
        "msg" => "enter all field"
    ];
    echo json_encode($response);
}

?>
