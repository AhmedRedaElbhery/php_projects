<?php 

$id = $_GET['id'];

$conn = mysqli_connect("localhost","root","","users");

$sql = "SELECT * FROM profiles WHERE id = '$id' ";

$result =mysqli_query($conn, $sql);

if ($result) {
        $response = mysqli_fetch_assoc($result);
        echo json_encode($response);
    }

?>