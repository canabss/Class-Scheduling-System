<?php
session_start();
	include('databaseConnection.php');
	include('countingRow.php');

	$id = $_POST['id'];
	$fname = ucfirst($_POST['fname']);
	$mname = ucfirst($_POST['mname']);
	$lname = ucfirst($_POST['lname']);
	$rank =  ucfirst($_POST['rank']);
	$department = $_POST['department'];
	$type =  $_POST['type'];

	$query = "select * from professors";
	$profList = mysqli_query($conn, $query);
	$isExist = false;

	while($data = mysqli_fetch_assoc($profList)){
		if($id == $data['professor_id']){
			$isExist = true;
			break;
		}
	}

	if($id == "" || $fname == "" || $mname == "" || $lname == "" || $rank == "" || $department == "" || $type == ""){
		
		echo "<script>
					alert('All are Required!');
					document.location='addProfessor.php';
			 </script>";
	}
	else if ($isExist){
		echo "<script>
					alert('Professor ID is already taken!');
					document.location='addProfessor.php';
			 </script>";
	}

	else {
	$sql = "select * from user_accounts";
	$accounts = mysqli_query($conn, $sql);
	$row = 0;
	$row = getNumberOfRows($accounts, $row);
	$sql = "select * from user_accounts";
	$result = mysqli_query($conn, $sql);
	$info = array();
	while($data = mysqli_fetch_assoc($result)){
		$info[] = $data;
	}
	foreach ($info as  $value) {
		if($value['id'] == $row){
			$row++;
		}
	}	
		$sql = "insert into professors(professor_id, fname, mname, lname, rank, department, type) values ('$id', '$fname', '$mname', '$lname', '$rank', '$department', '$type')";
		mysqli_query($conn, $sql);
		
		$sql1 = "insert into user_accounts(id, username, password, type) values ('$row', '$id', '$id', 'professor')";
		mysqli_query($conn, $sql1);
		echo "<script>alert('Successfully Added to Professors List!');
					  document.location='professors.php';</script>";
	}

	mysqli_close($conn);
?>