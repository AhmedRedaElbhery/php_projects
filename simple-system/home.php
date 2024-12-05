<?php


$conn = mysqli_connect("localhost","root","");

    if($conn){
        
        $conn = mysqli_connect("localhost","root","","newproject");

        if($conn){

            $sql = "SELECT * FROM table1";
            $result = mysqli_query($conn , $sql);
        }
        
    }

session_start();

if(!isset($_SESSION['login']) || $_SESSION['login'] == "false"){ 
	header("location:login.php");
    exit;
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <title>Log Out</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div id="container" class="container">

        <h1 class="d-flex justify-content-center mt-5 mb-5"> Home Page  </h1>
        <a class="btn btn-primary" href="new_clint.php" >Add New Client</a>

        <div class="mt-5">
            <table class="table">
                <thead >
                    <tr>
                        <th>iD </th>
                        <th>Name </th>
                        <th>Email </th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>

                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?> </td>
                        <td><?php echo $row['email'] ?></td>
                        <td class="mt-2">
                            <a class="btn btn-primary mb-1" href="edit.php?id=<?php echo $row['id'] ?>" > Edit</a>
                            <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
                        </td>
                    </tr>
                

                <?php endwhile ?>
            
                </tdody>
            </table>
        </div>

    <form id="form">
            <button type="submit" class="btn btn-danger">Log Out</button>
    </form>
</body>
<script>
        
    document.getElementById("form").addEventListener("submit" , function(){

        this.action = "login.php";

    })

</script>

</html>
