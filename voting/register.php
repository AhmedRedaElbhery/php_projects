<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="A startup project template">
    <meta name="author" content="Your Name">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Your Startup Project</title>
</head>
<body>

    <div class="container-fluid bg-dark text-light p-4 d-flex justify-content-center">
        <h1>Voting System</h1>
    </div>

    <div class="container w-50 mt-5 d-flex flex-column justify-content-center">
        <div class="d-flex justify-content-center mb-3">
            <h2>Register Account</h2>
        </div>
        
        <form id="form" method="POST" action="registerdata.php" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone number" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="custom-file mb-3">
                <input name="pic" type="file" class="custom-file-input" id="pic" required>
                <label class="custom-file-label" for="pic">Choose file</label>
            </div>
            <select id="select" name="select" class="form-control form-control-md" required>
                <option value="group">Group</option>
                <option value="voter">Voter</option>
            </select>

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" id="submit" class="btn btn-dark">Register</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>
