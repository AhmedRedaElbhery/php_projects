<?php

$email = $_GET['email'];
$password = $_GET['password'];
$name = $_GET['name'];

$conn = mysqli_connect("localhost","root","","newproject");

$sql = "SELECT * FROM table1 WHERE email = '$email'";

$result = mysqli_query($conn,$sql);

$result = mysqli_fetch_assoc($result);

session_start();

if(isset($result['email'])){
	$_SESSION['email'] = "false";
	$_SESSION['alert_email'] = '<div class="alert alert-danger" role="alert"> This Email already Exist </div>';
	header("location:sign-up.php");
	exit;
}

else{
	
$password = password_hash($password,PASSWORD_DEFAULT);
session_start();

$_SESSION['login'] = "true";
$sql = "INSERT INTO `table1`(`name`, `email`, `password`) 
		VALUES ('$name','$email','$password')";

$result = mysqli_query($conn,$sql);

header("location:home.php?status=true");
exit;
}