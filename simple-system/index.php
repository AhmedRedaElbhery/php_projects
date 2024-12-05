<?php

$conn = mysqli_connect("localhost","root","");

$sql = "CREATE DATABASE IF NOT EXISTS newproject";
mysqli_query($conn,$sql);



$conn = mysqli_connect("localhost","root","","newproject");
$sql = "CREATE TABLE IF NOT EXISTS table1(
		`id` INT(11) PRIMARY KEY AUTO_INCREMENT,
		`name` VARCHAR(255),
		`email` VARCHAR(255),
		`password` VARCHAR(255))";


mysqli_query($conn,$sql);

header("location:login.php");