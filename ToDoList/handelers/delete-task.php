<?php

$id = $_GET['id'];

if(isset($id)){

	session_start();

	$conn = mysqli_connect("localhost","root","","todoapp");

	$sql = "DELETE FROM todo WHERE id= '$id'";
	$tasks = mysqli_query($conn , $sql);
	

	header("location:../index.php");
}

?>