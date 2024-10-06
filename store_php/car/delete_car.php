<?php 

echo "hello";
$user_id = $_GET['userid'];
$id = $_GET['id'];

$conn = mysqli_connect("localhost","root","","shop");

$sql = "DELETE FROM `cars` WHERE id = '$id' ";

mysqli_query($conn,$sql);

header('location:../cars-index.php?id=' . $user_id);


?>