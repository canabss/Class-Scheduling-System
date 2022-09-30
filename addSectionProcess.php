<?php
session_start();
	include('databaseConnection.php');
	include('countingRow.php');

	$course =  $_POST['course'];
	$major =  ucfirst($_POST['major']);
	$year_level =  $_POST['year'];
	$section =  strtoupper($_POST['section']);

	$sql = "select * from section";
	$result =mysqli_query($conn, $sql);
	
	$row = 0;
	$row = getNumberOfRows($result, $row);
	$sql = "select * from section";
	$result = mysqli_query($conn, $sql);
	$info = array();
	while($data = mysqli_fetch_assoc($result)){
		$info[] = $data;
	}
	foreach ($info as  $value) {
		if($value['section_id'] == $row){
			$row++;
		}
	}
	if($course == "" || $major == "" || $year_level == ""|| $section == ""){
		
		echo "<script>
					alert('All are Required!');
					document.location='addSection.php';
			 </script>";
	}
	else {

		$sql = "insert into section(section_id, course_title, major, year_level, section) values ('$row', '$course', '$major', '$year_level', '$section')";
		mysqli_query($conn, $sql);
		echo "<script>alert('Successfully Added to Section List!');
					  document.location='sections.php';</script>";
	}
	mysqli_close($conn);
?>