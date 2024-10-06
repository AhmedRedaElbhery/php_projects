<?php

session_start();
$conn = mysqli_connect("localhost","root","","shop");

$email = $_GET['email'];
$password = $_GET['password'];

$sql = "SELECT * FROM `clients` WHERE email = '$email'";

$info = mysqli_query($conn , $sql);

$info = mysqli_fetch_assoc($info);

$_SESSION['test_login'] = 'false';


if(!isset($info['email'])){
	$_SESSION['alert'] = '<div class="alert alert-danger" role="alert"> The email is not exist </div>';
	header("location:index.php");
	exit;
}

if(password_verify($password , $info['password'])){
	$_SESSION['alert'] = '<div class="alert alert-danger" role="alert"> The password is not correct </div>';
	header("location:index.php");
	exit;
}

if($info['is_admin'] == 1){
	unset($_SESSION['test_login']);
	$_SESSION['is_login'] = 'true';
	header("location:main.php");
	exit;
}

else {

	unset($_SESSION['test_login']);
	$_SESSION['is_login'] = 'true';
	header("location:cars-index.php?id=" . $info['id']);
	
}



?>