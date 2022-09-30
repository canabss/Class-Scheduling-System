<?php
	include('databaseConnection.php');
	include('countingRow.php');

	$id = $_POST['id'];
	$term = $_POST['term'];
	$year = $_POST['year'];
	$description =  ucfirst($_POST['description']);

	
		$sql = "update semester set term='$term', academic_year='$year', description='$description' where id = '$id'";
		mysqli_query($conn, $sql);
		echo "<script>alert('Successfully Updated!');
					  document.location='semester.php';</script>";

	mysqli_close($conn);
?>