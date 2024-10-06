<?php

echo "hello";

$conn = mysqli_connect("localhost","root","","shop");

$sql = "DELETE FROM `cars` WHERE user_id = '$id'";

mysqli_query($conn,$sql);

?>