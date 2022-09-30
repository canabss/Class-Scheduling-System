<?php
session_start();
	include('databaseConnection.php');
	include('countingRow.php');

	$term = $_POST['term'];
	$year = $_POST['year'];
	$description =  ucfirst($_POST['description']);

	$sql = "select * from semester";
	$semesterList =mysqli_query($conn, $sql);
	$isExist = false;

	while($data = mysqli_fetch_assoc($semesterList)){
		if($term == $data['term'] && $year ==  $data['academic_year']){
			$isExist = true;
			break;
		}
	}

	if($term == "" || $year == "" || $description == ""){
		
		echo "<script>
					alert('All are Required!');
					document.location='addSemester.php';
			 </script>";
	}
	else if($isExist){
		
		echo "<script>
					alert('The Semester is already set!');
					document.location='addSemester.php';
			 </script>";
	}
	else {
		$sql = "select * from semester";
		$accounts = mysqli_query($conn, $sql);
		$row = 0;
		$row = getNumberOfRows($accounts, $row);
		$sql = "select * from semester";
		$result = mysqli_query($conn, $sql);
		$info = array();
		while($data = mysqli_fetch_assoc($result)){
			$info[] = $data;
		}

		foreach ($info as  $value) {
			if($value['semester_id'] == $row){
				$row++;
			}
		}
		
		$sql = "insert into semester(id, term, academic_year, description) values ('$row', '$term', '$year', '$description')";
		mysqli_query($conn, $sql);
		echo "<script>alert('Successfully Added to Professors List!');
					  document.location='semester.php';</script>";
	}

	mysqli_close($conn);
?>