<?php

session_start();


if($_SESSION['login'] === "true")
{
    echo "hello";
    $id = $_GET['id'];

    $conn = mysqli_connect("localhost","root","","voting");

    $sql = "SELECT * FROM `table` WHERE id = '$id'";

    $result = mysqli_query($conn , $sql);

    $result = mysqli_fetch_assoc($result);


    if($result['select'] == "voter"){
        
        $sql = "SELECT * FROM `table` WHERE `select` = 'group' ";

        $group = mysqli_query($conn , $sql);
    }
    else
    {
        
        $group = mysqli_query($conn , $sql);
    }
   
}

else{

    header("location:index.php");   
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Web Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
    </style>
</head>
<body>

    <div class="container mt-5">

        <h1 class="mt-5">Voting System</h1>
        
        <div class="row">
            
            <div class="col-lg-7 mt-5 mr-2">

                <?php if(!isset($group)):?>
                
                <h4> No Groups avaliable right now </h4>
                <p>----------------------------------------------------------------</p>
                <?php endif; ?>

                
                <?php while($row = mysqli_fetch_assoc($group) ): ?>
                <div class="d-flex flex-row justify-content-start mb-4">

                    <div class="d-flex flex-column justify-content-start w-25 mr-5">
                        <img class="w-100 mb-5" src="<?php echo $row['pic']?> " />

                        <?php  if($result['select'] == "voter"):?>
                        <?php  if($result["status"] == 0):?>
                        <a href="voting.php?name=<?php echo $row['name']?>&id=<?php echo $id?> " class="btn btn-dark w-75 ">Vote</a>
                        <?php endif; ?>
                        <?php endif; ?>

                        <?php  if($result["status"] != 0):?>
                        <a class="btn btn-success w-75 disabled">Voted</a>
                        <?php endif; ?>
                    </div>

                    <div class="ml-5">
                         <h4 class="mt-3">Group Name: <span> <?php echo $row["name"] ?> </span> </h4>
                         <h4 class="mt-3">Votes: <span> <?php echo $row["votes"] ?> </span> </h4>
                    </div>
                </div>
                <p>-------------------------------------------------------------------------------------------</p>
                
                <?php endwhile; ?>
                
            
            </div>

            <div class="col-lg-3 p-4 border h-25 ml-2">
                <img class="w-75 h-50" src="<?php echo $result['pic'] ?>" />
                <h4 class="mt-3">Name: <span> <?php echo $result["name"] ?> </span> </h4>
                <h4 class="mt-3">phone: <span> <?php echo $result["phone"] ?> </span> </h4>
                <?php  if($result['select'] == "voter"):?>
                <?php  if($result["status"] == 0):?>
                <h4 class="mt-3">status: <span> Not Voted </span> </h4>
                <?php endif; ?>
                <?php endif; ?>

                <?php  if($result["status"] != 0):?>
                <h4 class="mt-3">status: <span class="text-success">Voted </span> </h4>
                <?php endif; ?>
                
                <div class="pt-4 mt-4 ml-5">
                    <a class="btn btn-dark" href="index.php">LogOut</a>
                </div>

            </div>
            
        </div>

    </div>

    <!-- Bootstrap 4 JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>
