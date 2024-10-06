<?php 

$id = $_GET['id'];

require_once("car/delete_all_cars.php");


$conn = mysqli_connect("localhost","root","","shop");

$sql = "DELETE FROM `clients` WHERE id = '$id'";

mysqli_query($conn,$sql);
header("location:main.php");


?>