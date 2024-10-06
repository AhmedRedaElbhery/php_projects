<?php

    require_once("database.php");

    session_start();

    if(isset($_GET['status']))
    {
        $_SESSION['is_login'] = 'false';
    }
    else{
        $_SESSION['is_login'] = 'false';
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .container{
            background:#d6d6d6;
            border-radius:20px;
            width:600px;
            
        }
        .container button{
            border-radius:20px;
        }
        .container input{
            border-radius:20px;
        }
    </style>
</head>

<body>
    <div class="container mt-5 p-5">
        <h2  class="d-flex flex-column align-items-center pt-3"> Login Form </h2>
        <?php 
            if(isset($_SESSION['test_login']))
            {
                echo $_SESSION['alert'];
            }
            unset($_SESSION['test_login']);
        ?>
        <form id="loginform" class="mt-5" method="post" >
          <div class="form-group d-flex flex-row">
            <label class="ml-2 mr-3" for="email">Email address</label>
            <input type="email" class="form-control w-50" id="email" required >
          </div>
          <div class="form-group d-flex flex-row mt-3">
            <label class="ml-2 mr-5" for="password">Password</label>
            <input type="password" class="form-control w-50" id="password" required>
          </div>

          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mt-4 w-50 mb-5">Submit</button>
          </div>

        </form>
    </div>

    <script>

        document.getElementById("loginform").addEventListener("submit", function(event) { 

            let email = document.getElementById("email").value;
            let password = document.getElementById("password").value;

            this.action = 'valid_login.php?email='+ email + '&password=' + password;
        });

    </script>


</body>
</html>
