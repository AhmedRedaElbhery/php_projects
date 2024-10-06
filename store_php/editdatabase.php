<?php


	$conn = mysqli_connect("localhost","root","","shop");

	$id = $_GET['id'];
	$name = $_GET['name'];
	$email = $_GET['email'];
	$phone = $_GET['phone'];
	$address = $_GET['address'];

	$sql = "UPDATE `clients` SET `name`='$name',`email`='$email',`phone`='$phone',`address`='$address' WHERE id=$id";
	mysqli_query($conn , $sql);

	header("location:main.php");
	

?>