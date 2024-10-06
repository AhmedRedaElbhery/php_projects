<?php

$conn = mysqli_connect("localhost","root","","shop");

$id = $_GET['id'];

$sql = "SELECT * FROM `clients` WHERE id= '$id'";
$clint = mysqli_query($conn , $sql);

$clint = mysqli_fetch_assoc($clint);

?>


<!DOCTYPE html>
<html lang="en">
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
            width:400px;
            background : #e1e1e1;
        }
    </style>
</head>
<body>

<div class="container mt-5 p-5">
    <h2 class="mb-3">User Information</h2>

    <form id="userForm2" method="post" class="d-flex flex-column">
        
        <label for="name">Name:</label>
        <input class="mb-3" type="text" id="name" name="name" value="<?php echo $clint['name'] ?>">

        <label for="email">Email:</label>
        <input class="mb-3" type="email" id="email" name="email" value="<?php echo $clint['email'] ?>">

        <label for="phone">Phone Number:</label>
        <input class="mb-3" type="tel" id="phone" name="phone" value="<?php echo $clint['phone'] ?>" >

        <label for="address">Address:</label>
        <input class="mb-3" id="address" name="address" value="<?php echo $clint['address'] ?>">
        
        <button class="btn-success mt-2 mb-2 pt-1" type="submit">Submit</button>
        <a class="btn btn-dark mb-3" href="main.php"> Cancel </a>
    </form>
</div>

<script>
    document.getElementById("userForm2").addEventListener("submit", function(event) { 

        let name =  document.getElementById("name").value;
        let email = document.getElementById("email").value;
        let phone = document.getElementById("phone").value;
        let address = document.getElementById("address").value;
        
        this.action = 'editdatabase.php?id=' + <?php echo $id ?> + '&name=' + name + '&email=' + email + '&phone=' + phone + '&address=' + address;
    });
</script>

</body>
</html>
