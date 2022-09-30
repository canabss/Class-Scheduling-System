<?php
session_start();
	include('databaseConnection.php');
	include('countingRow.php');

	$room =  $_POST['room'];
	$department =  ucfirst($_POST['department']);
	$day =  ucfirst($_POST['day']);
	$timeIn =  $_POST['time-in'];
	$timeOut =  $_POST['time-out'];
	$section =  ucfirst($_POST['section']);
	$semester =  ucfirst($_POST['semester']);
	$academicYear =  ucfirst($_POST['year']);
	$subject =  ucfirst($_POST['subject']);
	$professor =  ucfirst($_POST['professor']);
	echo "<script>console.log('$room');</script>";
	echo "<script>console.log('$department');</script>";
	echo "<script>console.log('$day');</script>";
	echo "<script>console.log('$timeIn');</script>";
	echo "<script>console.log('$timeOut');</script>";
	echo "<script>console.log('$section');</script>";
	echo "<script>console.log('$semester');</script>";
	echo "<script>console.log('$academicYear');</script>";
	echo "<script>console.log('$subject');</script>";
	echo "<script>console.log('$professor');</script>";

	$sql = "select * from schedules";
	$result = mysqli_query($conn, $sql);
	$row = 0;
	$row = getNumberOfRows($result, $row);
	$sql = "select * from schedules";
	$result = mysqli_query($conn, $sql);
	$info = array();
	while($data = mysqli_fetch_assoc($result)){
		$info[] = $data;
	}
	foreach ($info as  $value) {
		if($value['schedule_id'] == $row){
			$row++;
		}
	}
	echo "<script>console.log('$row');</script>";
	
	if($room == "" || $department == "" || $day == "" || $timeIn == "" || $timeOut == "" || $section == "" || $semester == "" || $academicYear == "" || $subject == "" || $professor == ""){
		
		echo "<script>
					alert('All are Required!');
					document.location='addSchedule.php';
			 </script>";
	}
	else {
		
		$sql = "insert into schedules(schedule_id, room_no, department, day, time_in, time_out, section, semester, academic_year, subject, professor) values ('$row', '$room','$department', '$day','$timeIn', '$timeOut', '$section', '$semester','$academicYear', '$subject', '$professor')";
		$results = mysqli_query($conn, $sql);
		if($results){
		echo "<script>alert('Successfully Added to Schedule List!');
					  document.location='schedules.php';</script>";
		}
		else

			echo "<script>console.log('$timeOut');</script>";
	}
	mysqli_close($conn);
?>