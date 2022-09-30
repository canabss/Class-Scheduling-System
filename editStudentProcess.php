<?php
	include('databaseConnection.php');
	include('countingRow.php');

	$id =  $_POST['id'];
	$fname =  ucfirst($_POST['fname']);
	$mname =  ucfirst($_POST['mname']);
	$lname =  ucfirst($_POST['lname']);
	$age =  $_POST['age'];
	$gender =  $_POST['gender'];
	$year =  $_POST['year'];
	$section =  $_POST['section'];
	$course =  $_POST['course'];
	$major =  ucfirst($_POST['major']);
	$status =  $_POST['status'];

		
		$sql = "update students set fname='$fname', mname='$mname', lname='$lname', age='$age', year='$year', section='$section', course_id='$course', major='$major', status='$status' where student_id = '$id'";
		mysqli_query($conn, $sql);
		
		echo "<script>alert('Successfully Updated!');
					 document.location='students.php';</script>";

	mysqli_close($conn);
?>