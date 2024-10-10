<?php

$id = $_GET['id'];
$task = $_GET['title'];

$conn = mysqli_connect("localhost","root","","todoapp");
$sql = "UPDATE `todo` SET `title`='$task' WHERE id='$id'";

mysqli_query($conn , $sql);

header("location:../index.php");


?>