<?php
session_start();
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

	$query = "select * from students";
	$studList = mysqli_query($conn, $query);
	$isExist = false;

	while($data = mysqli_fetch_assoc($studList)){
		if($id == $data['student_id']){
			$isExist = true;
			break;
		}
	}
	
	if($id == "" || $fname == "" || $mname == "" || $lname == "" || $age == "" || $gender == "" || $course == "" || $status == "" ||$year == "" || $section == "" || $major == ""){
		
		echo "<script>
					alert('All are Required!');
					document.location='addStudent.php';
			 </script>";
	}
	else if ($isExist){
		echo "<script>
					alert('Student ID is already taken!');
					document.location='addStudent.php';
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

		$sql = "insert into students(student_id, fname, mname, lname, age, gender,year, section, course_id, major, status) values ('$id', '$fname', '$mname', '$lname', '$age', '$gender', '$year', '$section','$course', '$major', '$status')";
		mysqli_query($conn, $sql);
		$sql1 = "insert into user_accounts(id, username, password, type) values ('$row', '$id', '$id', 'student')";
		mysqli_query($conn, $sql1);
		echo "<script>alert('Successfully Added to Students List!');
					 document.location='students.php';</script>";
					
	}
	mysqli_close($conn);
?>