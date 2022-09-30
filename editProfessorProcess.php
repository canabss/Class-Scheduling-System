<?php
	include('databaseConnection.php');

	$id = $_POST['id'];
	$fname = ucfirst($_POST['fname']);
	$mname = ucfirst($_POST['mname']);
	$lname = ucfirst($_POST['lname']);
	$rank =  ucfirst($_POST['rank']);
	$department = $_POST['department'];
	$type =  $_POST['type'];

		$sql = "update professors set fname='$fname', mname='$mname', lname='$lname', rank='$rank', department='$department', type='$type' where professor_id = '$id'";
		mysqli_query($conn, $sql);
		
		echo "<script>alert('Successfully Updated!');
					  document.location='professors.php';</script>";

	mysqli_close($conn);
?>