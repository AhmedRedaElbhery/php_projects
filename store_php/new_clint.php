<?php session_start(); ?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title>User Input Form</title>
    <style>
    
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container{
            width:600px;
            background : #e1e1e1;
        }
        a , button{
            width:225px
        }
    </style>

</head>
<body>

    <div class="container mt-5 p-5">

        <h3 class="mb-4 d-flex justify-content-center mr-5">User Information Form</h3>

        <form id="userForm" >

                <div class="mb-3">
                  <label class="mr-5" for="name">Name:</label>
                  <input class="w-75 mb-2 ml-3" type="text" id="name" name="name" required>
                </div>

                <div class="mb-3">
                  <label class="mr-5" for="email">Email:</label>
                  <input class="w-75 mb-2 ml-3" type="email" id="email" name="email" required>
                </div>

                <div class="mb-3">
                  <label for="phone">Phone Number:</label>
                  <input class="w-75 mb-2" type="tel" id="phone" name="phone" required>
                </div>

                <div class="mb-3">
                  <label class="mr-5" for="address">Address:</label>
                  <input class="w-75 mb-2" id="address" name="address" required>
                </div>

                <button class="btn btn-success ml-5 mt-4 py-2" type="submit">submit</button>
                <a class="btn btn-dark py-2 mt-4" href="main.php">Cancel </a>
            </form>

    </div>

<script>
    document.getElementById("userForm").addEventListener("submit", function(event) { 

        let name = document.getElementById("name").value;
        let email = document.getElementById("email").value;
        let phone = document.getElementById("phone").value;
        let address = document.getElementById("address").value;

        this.action = 'clint_database.php?name=' + name + '&email' + email + '&phone' + phone + '&Address' + address;
    });

</script>

</body>
</html>
