<?php
session_start();

if(!isset($_SESSION['email'])){
    $_SESSION['email'] = "true";
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <title>Sign Up</title>
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>

        .container {
            border:1px solid black;
            border-radius: 8px;
            width:500px;
            margin-top:120px;
            
        }

    </style>
</head>

<body>
    <div class="container p-5">
        <h2 class="d-flex justify-content-center mb-4">Sign Up</h2>
        <form id="form" method="post">

            <?php
                
                if($_SESSION['email'] == "false"){
                    echo $_SESSION['alert_email'];
                } 
                unset($_SESSION['email']);
            ?>    

            <div class="form-group">
                <label for="username">Username:</label>
                <input class="w-100 p-1" type="text" id="name" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input class="w-100 p-1" type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input class="w-100 p-1" type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn-primary p-2 w-100 mt-2" id="submit">Sign Up</button>
        </form>
    </div>
</body>
<script>

    document.getElementById("form").addEventListener("submit",function(){
        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value;
        let name = document.getElementById("name").value;

        this.action = "sign-up-database.php?email="+email + "&name=" + name + "&password=" + password; 
    })


</script>


</html>
