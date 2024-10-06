
<?php 
    $id = $_GET['id'];
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title>Car Input Form</title>
    <style>
    
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h3{
            margin-right:150px;
        }
        .container{
            background : #e5e8ea;
            border : 1px solid gray;
            border-radius:20px;
        }
        
    </style>

</head>
<body>

    <div class="container w-50 mt-5 p-5">

        <h3 class="mb-4 d-flex justify-content-center"> Car Form </h3>
        <?php 
            session_start();
            if(isset($_SESSION['test_new']))
            {
                echo $_SESSION['alert'];
            }
            unset($_SESSION['test_new']);
        ?>
        <form id="carForm" class=" d-flex flex-column justify-content-center" method="POST">

                <div class="mb-4 ml-5 mt-3">
                  <label class="mr-4" for="model">Model:</label>
                  <input class="w-50 mb-2 ml-4" type="text" id="model" name="model" required>
                </div>

                <div class="mb-4 ml-5 mt-3">
                  <label class="mr-4" for="Submodel">SubModel:</label>
                  <input class="w-50 mb-2 ml-1" type="text" id="submodel" name="Submodel" required>
                </div>

                <div class="mb-4 ml-5 mt-3">
                  <label class="mr-5" for="year">Year:</label>
                  <input class="w-50 mb-2 ml-3" type="number" id="year" name="year" required>
                </div>

                <div class="mb-4 ml-5 mt-3">
                  <label class="mr-4" for="ride">First Ride:</label>
                  <input class="w-50 mb-2" type="date" id="ride" name="ride" required>
                </div>


                <div class="ml-5">
                    <button class="btn btn-success w-50 ml-5 mt-4 py-2" type="submit">submit</button>
                    <a class="btn btn-dark py-2 mt-4 w-50 ml-5" href="../cars-index.php?id=<?php echo$id?>">Cancel </a>
                </div>

         </form>

    </div>

<script>

    document.getElementById("carForm").addEventListener("submit", function(event) { 

        let model = document.getElementById("model").value;
        let submodel = document.getElementById("submodel").value;
        let year = document.getElementById("year").value;
        let ride = document.getElementById("ride").value;

        this.action = 'cars_database.php?userid='+ <?php echo $id ?> + '&model=' + model + '&submodel=' + submodel + '&year=' + year + '&ride=' + ride;
    });

</script>

</body>
</html>
