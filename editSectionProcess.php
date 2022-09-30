<?php
	include('databaseConnection.php');
	include('countingRow.php');
	$id = $_POST['id'];
	$course =  $_POST['course'];
	$major =  ucfirst($_POST['major']);
	$year_level =  $_POST['year'];
	$section =  strtoupper($_POST['section']);

		$sql = "update section set course_title='$course', major='$major', year_level='$year_level', section='$section' where section_id = '$id'";
		mysqli_query($conn, $sql);
		echo "<script>alert('Successfully Updated!');
					  document.location='sections.php';</script>";
	mysqli_close($conn);
?>