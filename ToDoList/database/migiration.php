<?php


$conn = mysqli_connect("localhost", "root","");
if($conn){

	mysqli_query($conn , "CREATE DATABASE IF NOT EXISTS todoapp");
	mysqli_close($conn);

}

$conn = mysqli_connect("localhost", "root","","todoapp");

if($conn){
	
	$sql = "CREATE TABLE IF NOT EXISTS todo(
		`id` INT(11) PRIMARY KEY AUTO_INCREMENT,
		`title` VARCHAR(255) NOT NULL
		)";
	mysqli_query($conn , $sql);
	mysqli_close($conn);

}




?>