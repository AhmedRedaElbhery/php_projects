<?php

	$conn = mysqli_connect("localhost","root","","shop");

	$name = $_GET['name'];
	$email = $_GET['email'];
	$phone = $_GET['phone'];
	$address = $_GET['address'];

	$sql = "INSERT INTO `clients`(`name`, `email`, `phone`, `address`) VALUES ('$name','$email','$phone','$address') ";
	mysqli_query($conn , $sql);

	header("location:main.php");

?>