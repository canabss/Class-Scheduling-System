<?php
session_start();
	include('databaseConnection.php');

	$roomNo =  $_POST['room_no'];
	$buildingName = ucfirst($_POST['building_name']);
	$description =  ucfirst($_POST['description']);

	$sql = "select * from rooms";
	$roomList = mysqli_query($conn, $sql);
	$isExist = false;

	while($data = mysqli_fetch_assoc($roomList)){
		if($roomNo == $data['room_no']){
			$isExist = true;
			break;
		}
	}
	
	if($roomNo == "" || $buildingName == "" || $description == ""){
		
		echo "<script>
					alert('All are Required!');
					document.location='addRoom.php';
			 </script>";
	}
	else if ($isExist){
		echo "<script>
					alert('Room No. is already taken!');
					document.location='addRoom.php';
			 </script>";
	}
	else {
		
		$sql = "insert into rooms(room_no, building_name, room_description) values ('$roomNo', '$buildingName', '$description')";
		mysqli_query($conn, $sql);
		echo "<script>alert('Successfully Added to Rooms List!');
					  document.location='rooms.php';</script>";
	}
	mysqli_close($conn);
?>