<?php
	include('databaseConnection.php');

	$roomNo =  $_POST['room_no'];
	$buildingName = ucfirst($_POST['building_name']);
	$description =  ucfirst($_POST['description']);
  	echo $roomNo.$buildingName.$description;
		$sql = "update rooms set room_no = '$roomNo', building_name = '$buildingName', room_description = '$description' where room_no = '$roomNo'";
		mysqli_query($conn, $sql);
		echo "<script>alert('Successfully Updated!');
					  document.location='rooms.php';</script>";

	mysqli_close($conn);
?>