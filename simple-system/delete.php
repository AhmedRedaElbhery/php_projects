<?php 

$id = $_GET['id'];

$conn = mysqli_connect("localhost","root","","newproject");

$sql = "DELETE FROM `table1` WHERE id = '$id'";

mysqli_query($conn,$sql);
header("location:home.php");


?>