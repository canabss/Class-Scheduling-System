<?php
	include('databaseConnection.php');

	$subjectCode =  strtoupper($_POST['subject_code']);
	$subjectTitle =  ucfirst($_POST['subject_title']);
	$description =  ucfirst($_POST['description']);
	$acronym =  $_POST['course'];
	$term = $_POST['term'];
	$year =  $_POST['year'];


		$sql1 = "select course_title from course where course_acronym = '$acronym'";
		$result = mysqli_query($conn, $sql1);
		$course="";
		while($data = mysqli_fetch_assoc($result))
			$course .= $data['course_title'];
		
		$sql = "update subjects set subject_code='$subjectCode', subject_title='$subjectTitle', subject_description='$description', course='$course', semester='$term', year='$year' where subject_code = '$subjectCode'";
		mysqli_query($conn, $sql);
		echo "<script>alert('Successfully Updated!');
					  document.location='subjects.php';</script>";
	
	mysqli_close($conn);
?>