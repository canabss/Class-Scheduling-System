<?php
	include('databaseConnection.php');
	include('countingRow.php');

	$title =  $_POST['title'];
	$acronym =  strtoupper($_POST['acronym']);
	$major =  ucfirst($_POST['major']);
	$description =  ucfirst($_POST['description']);

	$sql = "select * from course";
	$result =mysqli_query($conn, $sql);
	$row = 0;
	$row = getNumberOfRows($result, $row);
	$sql = "select * from course";
	$result = mysqli_query($conn, $sql);
	$info = array();
	while($data = mysqli_fetch_assoc($result)){
		$info[] = $data;
	}
	foreach ($info as  $value) {
		if($value['course_id'] == $row){
			$row++;
		}
	}
	if($title == "" || $description == ""){
		
		echo "<script>
					alert('All are Required!');
					document.location='addcourse.php';
			 </script>";
	}
	else {
		
		$sql = "insert course(course_id, course_title, course_acronym, major,course_description) into ('$row', '$title','$acronym','$major','$description')";
		mysqli_query($conn, $sql);
		echo "<script>alert('Successfully Added to Course List!');
					  document.location='courses.php';</script>";
	}
	mysqli_close($conn);
?>