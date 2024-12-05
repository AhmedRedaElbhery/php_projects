<?php

$conn = mysqli_connect("localhost","root","","newproject");

$id = $_GET['id'];

$sql = "SELECT * FROM `table1` WHERE id= '$id'";
$result = mysqli_query($conn , $sql);

$result = mysqli_fetch_assoc($result);

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
        <input class="mb-3" type="text" id="name" name="name" value="<?php echo $result['name'] ?>">

        <label for="email">Email:</label>
        <input class="mb-3" type="email" id="email" name="email" value="<?php echo $result['email'] ?>">
        
        <button class="btn-primary mt-2 mb-2 pt-1" type="submit">Submit</button>
        <a class="btn btn-dark mb-3" href="home.php"> Cancel </a>
    </form>
</div>

<script>
    document.getElementById("userForm2").addEventListener("submit", function(event) { 

        let name =  document.getElementById("name").value;
        let email = document.getElementById("email").value;
        
        this.action = 'editdatabase.php?id=' + <?php echo $id ?> + '&name=' + name + '&email=' + email;
    });
</script>

</body>
</html>
