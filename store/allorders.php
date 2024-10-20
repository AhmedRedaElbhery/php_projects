<?php 

session_start();

if(!isset($_SESSION['login'])){
    header("location:index.php");
}


$conn = mysqli_connect("localhost","root","","commerce");

$userid = $_SESSION['userid'];

$sql = "SELECT * FROM `myorders` WHERE userid = '$userid' ";

$result = mysqli_query($conn , $sql);


?>

<!DOCTYPE html>
<html>
<head>

    <title>Startup Page</title>
    <link rel="stylesheet" href="css.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
              


            </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
            </div>
        </nav>
    </header>

    <div class="p-3 mt-2">
        <h3 class="mt-3 d-flex justify-content-center">History Of Orders</h3>
    </div>


    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th >Name</th>
                    <th>Image</th>
                    <th >Price</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <th><?php echo $row['name'] ?></th>
                        <td class="w-25"><img class="w-50" src="<?php echo $row['img'] ?> " /></td>
                        <td><?php echo $row['price']; ?></td>
                        
                        
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
