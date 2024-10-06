<?php


$conn = mysqli_connect("localhost", "root","");
if($conn){

	mysqli_query($conn , "CREATE DATABASE IF NOT EXISTS shop");
	mysqli_close($conn);

}

$conn = mysqli_connect("localhost", "root","","shop");

if($conn){
	
	$sql = "CREATE TABLE IF NOT EXISTS clients(
		`id` INT(11) PRIMARY KEY AUTO_INCREMENT,
		`name` VARCHAR(255),
		`email` VARCHAR(255),
		`phone` VARCHAR(255),
		`address` VARCHAR(255),
		`created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
		`password` VARCHAR(255),
		`is_admin` tinyint(1)
		)";
	mysqli_query($conn , $sql);
	mysqli_close($conn);

}




?>