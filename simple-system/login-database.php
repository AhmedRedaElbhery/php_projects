<?php

$email = $_GET['email'];
$password = $_GET['password'];

$conn = mysqli_connect("localhost","root","","newproject");

$sql = "SELECT * FROM table1 WHERE email = '$email'";

$result = mysqli_query($conn,$sql);

$result = mysqli_fetch_assoc($result);

session_start();





if(!isset($result['email'])) {
	$_SESSION['status'] = "false";
	$_SESSION['alert'] = '<div class="alert alert-danger" role="alert"> This Email is not Exist </div>';
	header("location:login.php");
	exit;
}

if(!password_verify($password , $result['password'])) {

	$_SESSION['status'] = "false";
	$_SESSION['alert'] = '<div class="alert alert-danger" role="alert"> This password incorrect </div>';
	header("location:login.php");
	exit;
}

else{

	$_SESSION['login'] = "true";
	header("location:home.php");
	exit;

}


?>