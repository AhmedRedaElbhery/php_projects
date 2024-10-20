<?php


$userid = $_GET['userid'];

$id = $_GET['id'];


$conn = mysqli_connect("localhost","root","","commerce");

$sql = "DELETE  FROM `cart` WHERE id = '$id' ";
mysqli_query($conn , $sql);

header("location:cart.php?userid=" . $userid);

?>