<?php

SESSION_start();

$conn = mysqli_connect("localhost","root","","todoapp");


if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["title"] != ""){

	$title = $_POST["title"];

	$sql = "INSERT INTO `todo` (`title`) VALUES ('$title')";

	mysqli_query($conn , $sql);
	
	header("location:../index.php");

}