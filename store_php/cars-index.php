<?php 

session_start();

if($_SESSION['is_login'] == 'false'){
    header("location:index.php");
    exit;
}

else{
    $id = $_GET['id'];

    $conn = mysqli_connect("localhost","root","","shop");

    $sql = "SELECT * FROM cars WHERE user_id = $id ";

    $info = mysqli_query($conn , $sql);

    $sql = "SELECT name FROM clients WHERE id = $id ";
    $name = mysqli_query($conn , $sql);
    $name=mysqli_fetch_assoc($name);
}


?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Your Website Title</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.min.js"></script>





</head>

<body>

    <div class="container mt-5">
        <h1><?php echo$name['name']?>'s Cars</h1>
        <a class="btn btn-primary mt-3" href="car/new_car.php?id=<?php echo$id?>"> Add New Car </a>
    </div>

    <div class="container mt-5">

        <table class="table">
          <thead>
            <tr>
                <th> modle </th>
                <th> submodle</th>
                <th> year</th>
                <th> first ride</th>
                <th> days of using the car</th>
                 <th> Action</th>
            </tr>
          </thead>

          <tbody>

            <?php while($row = mysqli_fetch_assoc($info)): ?>
            <?php

                $I = $row['id'];
                $date = $row['day_of_first_ride'];
                $sql = "SELECT TO_DAYS(CURRENT_DATE) - TO_DAYS('$date') AS days ";

                $date = mysqli_query($conn , $sql);
                $date = mysqli_fetch_assoc($date); ?>

            <tr>
                    <td> <?php echo $row['model'] ?></td>
                    <td> <?php echo $row['submodel'] ?></td>
                    <td> <?php echo $row['car_year'] ?></td>
                    <td> <?php echo $row['day_of_first_ride'] ?></td>
                    <td> <?php echo $date['days'] ?></td>

                    <td>
                        <a class="btn btn-primary mb-1" href="car/edit_car.php?id=<?php echo $row['id'] ?>">Edit</a>
                        <a class="btn btn-danger" href="car/delete_car.php?id=<?php echo $row['id'] ?>&userid=<?php echo $id ?>">Delete</a>
                    </td>
            </tr>
            <?php endwhile ?>
          </tbody>
        </table>
        <a id="back" class="btn btn-dark mt-3 mb-5" href="index.php?status=<?php echo $_SESSION['is_login'] ?>"> Logout </a>
    </div>

   
</body>

<script>

    let table = new DataTable('.table');

</script>

</html>
