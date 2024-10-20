<?php

session_start();

$userid = $_SESSION['userid'];

$conn = mysqli_connect("localhost","root","","commerce");

$sql = "SELECT * FROM `cart` WHERE userid = '$userid'";

$result = mysqli_query($conn , $sql);

while($row = mysqli_fetch_assoc($result)){
	$img = $row['img'];
	$name = $row['name'];
	$price = $row['price'];

	$sql = "INSERT INTO `myorders`(`userid`,`name`, `img`, `price`) VALUES ('$userid', '$name' , '$img', '$price') ";
	mysqli_query($conn , $sql);

}

$sql = "DELETE FROM `cart` WHERE userid = '$userid'";

mysqli_query($conn , $sql);

header("location:index.php");