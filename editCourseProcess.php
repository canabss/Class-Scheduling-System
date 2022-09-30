<?php
session_start();
	include('databaseConnection.php');

	$id = $_POST['id'];
	$title =  $_POST['title'];
	$acronym =  strtoupper($_POST['acronym']);
	$major =  ucfirst($_POST['major']);
	$description =  ucfirst($_POST['description']);

	if($title == "" || $description == ""){
		
		echo "<script>
					alert('All are Required!');
					document.location='addcourse.php';
			 </script>";
	}
	else {
		
		$sql = $sql = "update course set course_title = '$title', course_acronym = '$acronym', major = '$major', course_description = '$description' where course_id = '$id'";
		mysqli_query($conn, $sql);
		echo "<script>alert('Successfully Updated!');
					  document.location='courses.php';</script>";
	}
	mysqli_close($conn);
?>