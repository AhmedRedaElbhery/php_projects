<?php


$conn = mysqli_connect("localhost","root","","commerce");

$userid = $_GET['userid'];


if(isset($_GET['category'])){

    $id = $_GET['id'];
    $category = $_GET['category'];
    $sql = "SELECT * FROM `viewmore` WHERE id = '$id' ";

    $result = mysqli_query($conn , $sql);

    $result = mysqli_fetch_assoc($result);

    $sql = "INSERT INTO `cart` (`userid` , `name`, `img`, `price`) 
        VALUES ('$userid' , '" . $result['name'] . "', '" . $result['img'] . "', '" . $result['price'] . "')";

    mysqli_query($conn , $sql);
    header("Location: viewmore.php?category=" . $category . "&id=" . $userid . "&stat=true");

}
else{

    $id = $_GET['id'];

    $sql = "SELECT * FROM `products` WHERE id = '$id' ";

    $result = mysqli_query($conn , $sql);

    $result = mysqli_fetch_assoc($result);

    $sql = "INSERT INTO `cart`(`userid`, `name`, `img`, `price`)
            VALUES ('$userid' , '" . $result['name'] . "', '" . $result['img'] . "', '" . $result['price'] . "')";

    mysqli_query($conn , $sql);
    header("location:index.php?stat=true&id=" . $userid);
}
?>