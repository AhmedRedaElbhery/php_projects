<?php 


	$id = $_GET['id'];

	$conn = mysqli_connect("localhost","root","","shop");

	$sql = "SELECT * FROM cars WHERE id = $id ";

	$info = mysqli_query($conn , $sql);
    $info = mysqli_fetch_assoc($info);
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
            width:500px;
            background : #e1e1e1;
        }
    </style>
</head>
<body>

<div class="container mt-5 p-5">

    <h2 class="mb-3 d-flex justify-content-center">Car Information</h2>
    <?php 
            session_start();
            if(isset($_SESSION['test_edit']))
            {
                echo $_SESSION['alert'];
            }
            unset($_SESSION['test_edit']);
     ?>
    <form id="carForm2" method="post" class="d-flex flex-column">

            <div class="mb-4 mt-4">
                <label class="mr-1" for="model">Model:</label>
                <input class="w-75 mb-2 ml-4" type="text" id="model" name="model" value="<?php echo$info['model']?>">
            </div>

            <div class="mb-4">
                <label for="Submodel">SubModel:</label>
                <input class="w-75 mb-2" type="text" id="submodel" name="Submodel" value="<?php echo$info['submodel']?>">
            </div>

            <div class="mb-4">
                <label class="mr-3"for="year">Year:</label>
                <input class="w-75 mb-2 ml-4" type="number" id="year" name="year" value="<?php echo$info['car_year']?>">
            </div>

            <div class="mb-4">
                <label class="mr-1" for="ride">First Ride:</label>
                <input class="w-75 mb-2" type="date" id="ride" name="ride" value="<?php echo$info['day_of_first_ride']?>">
            </div>

            <button class="btn btn-primary mt-4 py-2" type="submit">submit</button>
            <a class="btn btn-dark py-2 mt-4" href="../cars-index.php?id=<?php echo$info['user_id'] ?>">Cancel </a>
    </form>
</div>

<script>
    document.getElementById("carForm2").addEventListener("submit", function(event) { 

        let model = document.getElementById("model").value;
        let submodel = document.getElementById("submodel").value;
        let year = document.getElementById("year").value;
        let ride = document.getElementById("ride").value;

        this.action = 'update_database.php?id='+ <?php echo $id ?> + '&userid=' + <?php echo$info['user_id']?> + '&model=' + model + '&submodel=' + submodel + '&year=' + year + '&ride=' + ride ;
    });
</script>

</body>
</html>