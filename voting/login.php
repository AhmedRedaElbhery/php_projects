<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $select = $_POST['select'];

    $conn = mysqli_connect("localhost","root","","voting");

    $sql = "SELECT * FROM `table` WHERE email = '$email'";

    $result = mysqli_query($conn , $sql);

    

    if(isset($result)){

         $result = mysqli_fetch_assoc($result);
         if (password_verify($password, $result['password'])) {

            if ($phone == $result['phone'])
            {
                if ($select == $result['select'])
                {
                    session_start();

                    $_SESSION['login'] = "true";
                    
                    header("Location: main.php?id=" . $result['id'] . "&login=" . $_SESSION['login']);
                    exit();
                }
                else
                {
                     header("location:index.php");
                }
            }
            else
            {
                    header("location:index.php");
            }
         }
         else
        {
                header("location:index.php");
        }

    }

   else{
       header("location:index.php");
   }

}

?>