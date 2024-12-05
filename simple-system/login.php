<?php


session_start();

if(!isset($_SESSION['status'])){
    $_SESSION['status'] = "true";
}

if(isset($_SESSION['login'])){
    $_SESSION['login'] = "false";
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <title>Login Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <style>
        .container {
            margin-top:150px;
            border-radius: 8px;
            border:1px solid black;
            max-width: 480px;
        }


    </style>
</head>

<body>
    <div class="container p-5">
        <h2 class="d-flex justify-content-center">Login</h2>
        <form id="form" action="submit_login_form.php">

            <?php

                if($_SESSION['status'] == "false"){
                echo $_SESSION['alert'];
                } 
                unset($_SESSION['status']);
            ?>


            <div class="form-group">
                <label for="email">Email:</label>
                <input class="w-100 p-1" type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input class="w-100 p-1" type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary login-button mt-2 p-2 w-100">Login</button>
            <a href="sign-up.php" class="btn btn-dark mt-2 p-2 w-100">Sign Up</a>
        </form>
    </div>
</body>
<script>
    document.getElementById("form").addEventListener("submit",function()
    {
        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value;

        this.action = "login-database.php?email=" + email + "&password="+password;
    })
    

</script>
</html>
