<?php
    
    $conn = mysqli_connect("localhost","root","");

    if($conn){
        
        $conn = mysqli_connect("localhost","root","","shop");

        if($conn){

            $sql = "SELECT * FROM clients";
            $clints = mysqli_query($conn , $sql);
        }
        
    }
    session_start();

    if($_SESSION['is_login'] == 'false'){
        header("location:index.php");
        exit;
    }

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Your Website Title</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.min.js" ></script>

</head>

<body>
    <div class="container">
        <h1 class="mt-5"> List Of Clients </h1>
        <a class="btn btn-primary mt-3" href="new_clint.php"> Add New Clicnt </a>
    </div>

    <div class="container mt-5">
        <table class="table">
            <thead >
                <tr>
                    <th>Name </th>
                    <th>Email </th>
                    <th>Phone </th>
                    <th>Address </th>
                    <th>Created At </th>
                    <th>Action </th>
                </tr>
            </thead>
            <tbody>

                <?php while ($row = mysqli_fetch_assoc($clints)): ?>

                    <tr>
                        <td><?php echo $row['name'] ?> </td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><?php echo $row['created_at'] ?></td>
                        <td class="mt-2">
                            <a class="btn btn-primary mb-1" href="edit.php?id=<?php echo $row['id'] ?>" > Edit</a>
                            <a class="btn btn-info mb-1" href="cars-index.php?id=<?php echo $row['id']?>">Show</a>
                            <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
                        </td>
                    </tr>
                

                <?php endwhile ?>
            
            </tdody>
        </table>


        <a id="back" class="btn btn-dark mt-3 ml-3" href="index.php?status=<?php echo $_SESSION['is_login'] ?>"> Logout </a>

    </div>
</body>

<script>

    let table = new DataTable('.table');

</script>

</html>
