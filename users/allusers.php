<?php 

$conn = mysqli_connect("localhost","root","");

if($conn)
{
	$conn = mysqli_connect("localhost","root","","users");

	$sql = "SELECT * FROM profiles WHERE 1";

	$result = mysqli_query($conn , $sql);

	$_SESSION['users'] = $result;
}


?>

