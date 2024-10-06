<?php

	session_start();
	$user_id = $_GET['userid'];
	$id = $_GET['id'];
	$model = $_GET['model'];
	$submodel = $_GET['submodel'];
	$year = $_GET['year'];
	$ride = $_GET['ride'];


	$conn = mysqli_connect("localhost","root","","shop");
	
	$sql = "SELECT TO_DAYS(CURRENT_DATE) AS current";
	$info = mysqli_query($conn , $sql);
	$info = mysqli_fetch_assoc($info);

	$sql = "SELECT TO_DAYS('$ride') AS past";
	$past = mysqli_query($conn , $sql);
	$past = mysqli_fetch_assoc($past);

	$_SESSION['test_edit'] = 'false';
	

	if($past['past'] > $info['current']){
		$_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Enter a valid date</div>';
		header("location:edit_car.php?id=" . $id);
		exit;
	}

	$sql = "SELECT YEAR(CURDATE()) AS this_year";
	$past = mysqli_query($conn , $sql);
	$past = mysqli_fetch_assoc($past);

	if ($year > $past['this_year'] || $year < "2000" ) {
		$_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Enter a valid year From 2000 to this year</div>';
		header("location:edit_car.php?id=" . $id);
		exit;
	}
	
	if (strlen($model) > 5 || strlen($submodel) > 5 ) {
		$_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Enter a valid name</div>';
		header("location:edit_car.php?id=" . $id);
		exit;
	}

	else{

		$sql = "UPDATE `cars` SET `model`='$model',
						`submodel`='$submodel',
						`day_of_first_ride`='$ride',
						`car_year`='$year' WHERE id = $id ";

		mysqli_query($conn,$sql);
		unset($_SESSION['test_edit']);
		header('location:../cars-index.php?id=' . $user_id);
		exit;
	}

?>