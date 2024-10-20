<?php 
session_start();

if(!isset($_SESSION['login'])){
    header("location:index.php");
}

$id = $_SESSION['userid'];

$conn = mysqli_connect("localhost","root","","commerce");

$sql = "SELECT * FROM `users` WHERE id = '$id' ";

$result = mysqli_query($conn , $sql );

$result = mysqli_fetch_assoc($result);

if(isset($_GET['pending'])){
    
}

if(isset($_GET['myorders'])){
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>Your Page Title</title>
    <link rel="stylesheet" href="css.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    <header class="bg-primary text-light py-3">
        <nav class="navbar navbar-expand-lg navbar-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
             <li class="nav-item active">
                <i id="icon" class="fa-solid fa-cart-shopping px-4"></i>
              </li>
              <li class="nav-item active px-2">
                <a class="nav-link text-light" href="index.php?id=<?php echo $id ?> &stat=true">Home <span class="sr-only">(current)</span></a>
              </li>
              
              <li class="nav-item active px-2">
                <a class="nav-link text-light" href="#">Contact</a>
              </li>

              <li class="nav-item active px-2">
                <a class="nav-link text-light" href="#">Total Price :</a>
              </li>


            </ul>
          </div>
        </nav>
    </header>

    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-2 mt-4 mr-2">
                <h4 class="bg-primary text-light px-3 py-1">Your Profile</h4>

                <?php if(isset($result['img']) && $result['img'] != "") :?>
                <img class="w-75 ml-3" src="<?php echo $result['img'] ?> " alt="https://www.ledr.com/colours/white.jpg" />
                <?php endif ; ?>

                <?php if(isset($result['img']) && $result['img'] == "") :?>
                <img class="w-75 ml-3" src="https://www.ledr.com/colours/white.jpg "/>
                <?php endif ; ?>

                <a href="profile.php?id=<?php echo $id ?>&pending" class="btn btn-dark w-100 mt-1">pending orders</a>
                <a href="profile.php?id=<?php echo $id ?>&edit" class="btn btn-dark w-100 mt-2">Edit Profile</a>
                <a href="allorders.php?id=<?php echo $id ?>" class="btn btn-dark w-100 mt-2">my orders</a>
                <a href="deleteaccount.php?id=<?php echo $id ?>" class="btn btn-dark w-100 mt-2">Delete Account</a>
                <a href="logout.php" class="btn btn-dark w-100 mt-2"> Logout </a>

            </div>

            <?php if(isset($_GET['edit'])):?>
                <div class="col-lg-7 mt-4 ml-5">
                    <form enctype="multipart/form-data" action="updateaccount.php?id=<?php echo $id ?>" method="POST">
                        <div class="form-group mt-4">

                            <input type="text" class="form-control" name="name" id="username" value="<?php echo $result['name']?>">
                        </div>
                        <div class="form-group mt-4">

                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $result['email']?>" >
                        </div>

                        <div class="form-group mt-4">

                            <input type="phone" class="form-control" name="phone" id="phone" value="<?php echo $result['phone']?>">
                        </div>

                        <div class="input-group mt-4">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="img" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-4">Save</button>
                    </form>
                </div>
            <?php endif; ?>

        </div>     
    </div>

   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>