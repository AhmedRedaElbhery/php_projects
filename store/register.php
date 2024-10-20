<?php

if(isset($_GET["error"]))
{
     echo '<script>
        alert("This Email is Exist. Please try again.");
        window.location.href = "register.php";
    </script>';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-6NTeD5/Yx1ZpX7gFQd9rT81HUGeJ6vjpU8RE2kExFdIvc1XLqmpPzjzuh7x2uBPSYxlVEW7B4H7ttQt+tzYwNQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .register-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 100%;
        }
        .register-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="register-container">
        <h2>Register</h2>
        <form enctype="multipart/form-data" action="registerdata.php" method="POST">
            <div class="form-group mt-4">

                <input type="text" class="form-control" name="name" id="username" placeholder="Enter username" required>
            </div>
            <div class="form-group mt-4">

                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required >
            </div>

            <div class="form-group mt-4">

                <input type="phone" class="form-control" name="phone" id="phone" placeholder="Enter phone" required>
            </div>

            <div class="form-group mt-4">
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
            </div>
            <div class="input-group mt-4">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="img" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-4">Register</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
