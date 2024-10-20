<?php

session_start();

$category = $_GET['category'];

if(isset($_SESSION['login']) && $_SESSION['login'] == 1)
{
    $id = $_SESSION['userid'];
    $stat = "true";
}
else{
    $stat = false;
}

$conn = mysqli_connect("localhost","root","","commerce");

$sql = "SELECT * FROM viewmore WHERE category = '$category'";

$result = mysqli_query($conn , $sql);

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
                <a class="nav-link text-light" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active px-2">
                <a class="nav-link text-light" href="#">Products</a>
              </li>

              <li class="nav-item active px-2">
                <a class="nav-link text-light" href="register.php">Register</a>
              </li>
              
              <li class="nav-item active px-2">
                <a class="nav-link text-light" href="#">Contact</a>
              </li>

              <li class="nav-item active px-2">
                <a class="nav-link text-light" href="#">Total Price :</a>
              </li>


            </ul>

            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
        </nav>
    </header>

     <?php if($stat != "true"): ?>
        <div class="p-2 d-flex justefy-content-start mb-3">
            <h4 class="ml-2">Welcome Guest</h4>
            <a href="login.php" class="btn btn-primary ml-5"> Login </a>
        </div>
    <?php endif; ?>


    <?php if($stat == "true"): ?>
        <div class="p-2 d-flex justefy-content-start mb-3">
            <h4 class="ml-2">Welcome </h4>
            <a href="profile.php?id=<?php echo $id?>" class="btn btn-primary ml-3 px-3 py-1"> Profile </a>
            <a href="cart.php?userid=<?php echo $id ?>" class="btn btn-primary ml-3 px-4 py-1">Cart</a>
            <a href="logout.php" class="btn btn-primary ml-3 px-3 py-1"> Logout </a>
        </div>
    <?php endif; ?>


    <div class="p-2 mb-3">
        <h4 class="font-weight-bold text-primary d-flex justify-content-center">Related Items</h4>
    </div>

    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-2 mt-3 mr-2 ml-2">
                <h4 class="bg-primary text-light p-2"> Brands</h4>
                <a href="index.php?brand=<?php echo "zara" ?> " class="btn btn-dark w-100 mt-1 py-2"> zara</a>
                <a href="index.php?brand=<?php echo "juice" ?> " class="btn btn-dark w-100 mt-1 py-2"> juice</a>
                <a href="index.php?brand=<?php echo "hp" ?> " class="btn btn-dark w-100 mt-1 py-2"> hp</a>


                <h4 class="bg-primary text-light p-2 mt-4"> Catigories</h4>
                <a href="index.php?category=<?php echo "Books" ?> " class="btn btn-dark w-100 py-2"> Books</a>
                <a href="index.php?category=<?php echo "clothes" ?> " class="btn btn-dark w-100 mt-1 py-2"> clothes</a>
                <a href="index.php?category=<?php echo "laptops" ?> " class="btn btn-dark w-100 mt-1 py-2"> laptops</a>
                <a href="index.php?category=<?php echo "juice" ?> " class="btn btn-dark w-100 mt-1 py-2"> juice</a>

            </div>

            <div id="p1" class="col-lg-9">
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <div>
                        <img class="w-75 h-50" src="<?php echo $row['img'] ?> " />
                        <h4><?php echo $row['name'] ?> </h4>

                        <p><?php echo $row['description'] ?> </p>

                         <p>price: <?php echo $row['price'] ?> </p>

                        <div>
                        <?php if($stat == true): ?>
                            <a href="addtocart.php?id=<?php echo $row['id'] ?>&category=<?php echo $category?>&userid=<?php echo $id ?>" class="btn btn-primary">Add To Cart </a>
                        <?php endif; ?>
                        <?php if($stat != true): ?>
                        <a href="login.php" class="btn btn-primary">Add To Cart </a>
                        <?php endif; ?>
                        


                        </div>

                    </div>
                <?php endwhile; ?>
            </div>
        </div>     
    </div>

   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>