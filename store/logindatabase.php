<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$email = $_POST['email'];
	$password = $_POST['password'];

	$conn = mysqli_connect("localhost","root","","commerce");

	$sql = "SELECT * FROM `users` WHERE email = '$email' ";

	$result = mysqli_query($conn , $sql);

	$result = mysqli_fetch_assoc($result);

	if(isset($result)){

		if(password_verify($password , $result['password'])){
			$_SESSION['login'] = 1;
			$id = $result['id'];
			header("location:index.php?id=$id");
			exit;
		}
		header("location:login.php");
	}
	header("location:login.php");

}




?>