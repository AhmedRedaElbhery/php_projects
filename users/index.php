<?php

$conn = mysqli_connect("localhost","root","");

$sql = "CREATE DATABASE IF NOT EXISTS users";
mysqli_query($conn,$sql);



$conn = mysqli_connect("localhost","root","","users");
$sql = "CREATE TABLE IF NOT EXISTS profiles(
		`id` INT(11) PRIMARY KEY AUTO_INCREMENT,
		`name` VARCHAR(100),
		`email` VARCHAR(150),
		`phone` VARCHAR(20),
		`photo` VARCHAR(255))";


mysqli_query($conn,$sql);


header("location:home.php");