<?php
    $conn = mysqli_connect("localhost","root","","todoapp");
    $id = $_GET['id'];
    $sql = "SELECT * FROM todo WHERE id= '$id'";
    $tasks = mysqli_query($conn , $sql);
    $tasks = mysqli_fetch_assoc($tasks);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* General styles for body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Form container styling */
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: blue;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        @media (max-width: 600px) {
            form {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <form id="myForm" action="" method="post">
        <label for="task">Task:</label>
        <input type="text" id="task" name="task" value="<?php echo $tasks['title']; ?>">
        <br><br>
        <input type="submit" value="Submit">
    </form>

    <script>
        document.getElementById('myForm').addEventListener('submit', function(event) {
            var newtask = document.getElementById('task').value;
            this.action = 'udpateindatabase.php?id=' + <?php echo $id; ?> + '&title=' + newtask;
        });
    </script>
</body>
</html>
