<?php

// Connect to the MySQL server
$conn = mysqli_connect("localhost", "root", "", "users");

// Check if the connection was successful
if ($conn) {
    // Get and sanitize input values
    $id = $_POST['id'];
    
    // SQL query to insert data into the `profiles` table
    $sql = "DELETE FROM `profiles` WHERE id = '$id' ";

    // Execute the query and check if successful
    if (mysqli_query($conn, $sql)) {
        $response = [
            "status" => true,
            "msg" => "Done"
        ];
        echo json_encode($response);
    } else {
        $response = [
            "status" => false,
            "msg" => "Error: " . mysqli_error($conn)  // Optional: add the error message from the database
        ];
        echo json_encode($response);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    $response = [
        "status" => false,
        "msg" => "Database connection failed"
    ];
    echo json_encode($response);
}

?>
