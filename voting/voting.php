<?php

$id = $_GET['id'];
$name = $_GET['name'];

$conn = mysqli_connect("localhost","root","","voting");

$sql = "UPDATE `table` SET `status`=1 WHERE id = '$id' ";


mysqli_query($conn , $sql);


$sql = "SELECT `votes` FROM `table` WHERE name = '$name' ";


$result = mysqli_query($conn , $sql);

$result = mysqli_fetch_assoc($result);

$vote = $result['votes'] + 1;

$sql = "UPDATE `table` SET `votes` = '$vote' WHERE name = '$name' ";


mysqli_query($conn , $sql);

header("location:main.php?id=" . $id);

?>