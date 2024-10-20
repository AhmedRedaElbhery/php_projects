<?php 


$id = $_GET['id'];

$conn = mysqli_connect("localhost","root","","commerce");
$sql = "DELETE FROM `users` WHERE id = '$id'";

mysqli_query($conn , $sql);

header("location:index.php");