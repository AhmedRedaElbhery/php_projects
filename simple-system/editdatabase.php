<?php


	$conn = mysqli_connect("localhost","root","","newproject");

	$id = $_GET['id'];
	$name = $_GET['name'];
	$email = $_GET['email'];

	$sql = "UPDATE `table1` SET `name`='$name',`email`='$email' WHERE id=$id";
	mysqli_query($conn , $sql);

	header("location:home.php");
	

?>