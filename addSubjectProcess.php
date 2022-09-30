<?php
session_start();
	include('databaseConnection.php');

	$subjectCode =  strtoupper($_POST['subject_code']);
	$subjectTitle =  ucfirst($_POST['subject_title']);
	$description =  ucfirst($_POST['description']);
	$course =  $_POST['course'];
	$term = $_POST['term'];
	$year =  $_POST['year'];

	$sql = "select * from subjects";
	$subjectList =mysqli_query($conn, $sql);
	$isExist = false;

	while($data = mysqli_fetch_assoc($subjectList)){
		if($subjectCode == $data['subject_code']){
			$isExist = true;
			break;
		}
	}
	
	if($subjectCode == "" || $subjectTitle == "" || $description == "" || $course == "" || $term == "" || $year == ""){
		
		echo "<script>
					alert('All are Required!');
					document.location='addSubject.php';
			 </script>";
	}
	else if ($isExist){
		echo "<script>
					alert('Subject code is already taken!');
					document.location='addSubject.php';
			 </script>";
	}
	else {
		
		$sql = "insert into subjects(subject_code, subject_title, subject_description, course, semester, year) values ('$subjectCode', '$subjectTitle', '$description', '$course','$term','$year')";
		mysqli_query($conn, $sql);
		echo "<script>alert('Successfully Added to Subjects List!');
					  document.location='subjects.php';</script>";
	}
	mysqli_close($conn);
?>