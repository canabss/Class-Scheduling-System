<!DOCTYPE html>
<?php
	session_start();
	include("databaseConnection.php");
	if (!isset($_SESSION["username"])) {
		header("Location: login.php");
		exit();
	}

	if(isset($_SESSION['username'])){
		
		if ($_SESSION['usertype'] == "professor"){
			header("location: professorAccount.php");
			}
		
		else if ($_SESSION['usertype'] == "student"){
			header("location: studentAccount.php");
		}
	}


?>

<html lang="en">

<head>
	<title>Schedule | Adding</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<link rel="icon" href="images/bsu.png">
	<script src="js/jquery-3.5.1.min.js"></script>
</head>

<body>
	<?php
	include("header.php");
	?>
	<div class="menu">
		<nav>
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="professors.php">Professor</a></li>
				<li><a href="students.php">Students</a></li>
				 <li><a href="courses.php">Courses</a></li>
				<li><a href="sections.php">Year and Sections</a></li>
				<li><a href="semester.php">Semester</a></li>
				<li class="current"><a href="schedules.php">Schedules</a></li>
				<li><a href="rooms.php">Rooms</a></li>
				<li><a href="subjects.php">Subject</a></li>
				<li><a href="logoutprocess.php">Log out</a></li>
			</ul>
		</nav>

	</div>
	<script>
		$(document).ready(function(){
			$("#department").on('change', function(){
				var value = $(this).val();
				$.ajax({
					url: 'getProfessors.php',
					type: 'POST',
					data: 'request='+value,
					success:function(data){
						$('#prof').html(data);
					},
				});
			});
		});

		$(document).ready(function(){
			$("#room").on('change', function(){
				var value = $(this).val();
				$.ajax({
					url: 'getDay.php',
					type: 'POST',
					data: 'request='+value,
					success:function(data){
						$('#da').html(data);
					},
				});
			});
		});

		$(document).ready(function(){
			$("#time-in").on('change', function(){
				var value = $(this).val();
				$.ajax({
					url: 'getTimeOut.php',
					type: 'POST',
					data: 'request='+value,
					success:function(data){
						$('#out').html(data);
					},
				});
			});
		});

		$(document).ready(function(){
			$("#room").on('change', function(){
				var value = $(this).val();
				if(value != ""){
					$.ajax({
						url: 'getRoomSchedule.php',
						type: 'POST',
						data: {request: value},
						dataType: "text",
						beforeSend: function(){
							$('#panel').html('Processing');
						},
						success:function(data){
							$('#panel').html(data);
						},
					});
				}
				else{
					$.ajax({
						url: 'getRoomSchedule.php',
						type: 'POST',
						data: {request:" "},
						dataType: "text",
						beforeSend: function(){
							$('#panel').html('Processing');
						},
						success:function(data){
							$('#panel').html(data);
						},
					});
				}
			});
		});

	</script>
	<div class="row" style="border:none;">
		<div class="l">
			<a href="schedules.php" class="button" style="float: left; margin: 10px; text-decoration: none;">Back</a><br/><br/>
			<div class="card" style="background:white; color:white; align-content: center; border:3px solid maroon;">
				<form action="addScheduleProcess.php" method="POST">
					<table style="border: solid transparent;">

						<tr style="background-color:transparent;">
							<td colspan="2" style="border: solid transparent;">
								<h2 style="color:black;">Add New Schedule</h2>
							</td>
						</tr>

						<tr style="background-color:transparent;">


							<td style="border: solid transparent;">
								<div class="data" style="font-size: 1.0em;font-weight: bold;">
									<label for="room" style="color:black;">Room:</label>
								</div>
							</td>
							<td>

								<div class="data" style="font-size: 1.0em;font-weight: bold;">
									<select name="room" id="room" style="border: orange solid 2px; height:25px;  margin-top:10px;  width:110px">
										<option value="">Select</option>
										<?php
											
											$sql = "select * from rooms";
											$result = mysqli_query($conn, $sql);
											while($data = mysqli_fetch_assoc($result)){
												echo "<option value='".$data['room_no']."'>".$data['room_no']."</option>\n";
											}
			     							
											
										?>
									</select>
								</div>
							</td>
						</tr>

						<tr style="background-color:transparent;">
							<td style="border: solid transparent;">
								<div class="data" style="font-size: 1.0em;font-weight: bold;">
									<label for="department" style="color:black;">Department:</label><br />
								</div>
							</td>

							<td style="border: solid transparent;">
								<div id="dept" class="data" style="font-size: 1.0em;font-weight: bold;">
									<select name="department" id="department" style="border: orange solid 2px; height:25px;  margin-top:10px; width:110px;">
										<option value="">Select</option>
										<option value="Industrial and Information Technology Department">Industrial and Information Technology Department</option>
										<option value="Business Administration Department">Business Administration Department</option>
										<option value="General Academic and Teacher Education Department">General Academic and Teacher Education Department</option>
									</select>
								</div>
							</td>
						</tr>

						<tr style="background-color:transparent;">
							<td style="border: solid transparent;">
								<div class="data" style="font-size: 1.0em;font-weight: bold;">
									<label for="day" style="color:black;">Day:</label>
								</div>
							</td>
							<td style="border: solid transparent;">
								<div id="da" class="data" style="font-size: 1.0em;font-weight: bold;">
									<select name="day" id="day" style="border: orange solid 2px; height:25px;  margin-top:10px;  width:110px">
										<option value="">Select</option>
										
									</select>
								</div>
							</td>
						</tr>

						<tr style="background-color:transparent;">
							<td style="border: solid transparent;">
								<div class="data" style="font-size: 1.0em;font-weight: bold;">
									<label for="time-in" style="color:black;">Time-in:</label>
								</div>
							</td>
							<td style="border: solid transparent;">
								<div id="in" class="data" style="font-size: 1.0em;font-weight: bold;">
									<select name="time-in" id="time-in" style="border: orange solid 2px; height:25px;  margin-top:10px;  width:110px">
										<option value="">Select</option>
										
									</select>
								</div>
							</td>
						</tr>
						<tr style="background-color:transparent;">
							<td style="border: solid transparent;">
								<div class="data" style="font-size: 1.0em;font-weight: bold;">
									<label for="time-out" style="color:black;">Time-out:</label>
								</div>
							</td>
							<td style="border: solid transparent;">
								<div id="out" class="data" style="font-size: 1.0em;font-weight: bold;">
								<select name="time-out" id="time-out" style="border: orange solid 2px; height:25px;  margin-top:10px;  width:110px">
									<option value="">Select</option>
									
								</select>
								</div>
							</td>
						</tr>
						<tr style="background-color:transparent;">
							<td style="border: solid transparent;">
								<div class="data" style="font-size: 1.0em;font-weight: bold;">
									<label for="section" style="color:black;">Section:</label>
								</div>
							</td>
							<td style="border: solid transparent;">
								<div class="data" style="font-size: 1.0em;font-weight: bold;">
								<select name="section" id="section" style="border: orange solid 2px; height:25px;  margin-top:10px;  width:110px">
									<option value="">Select</option>
									<?php
										$sql = "select * from section";
										$result = mysqli_query($conn, $sql);
										while($data = mysqli_fetch_assoc($result)){
											echo "<option value='".$data['section']."'>".$data['section']."</option>\n";
										}
									
									?>
								</select>
								</div>
							</td>
						</tr>
						<tr style="background-color:transparent;">
							<td style="border: solid transparent;">
								<div class="data" style="font-size: 1.0em;font-weight: bold;">
									<label for="year" style="color:black;">Academic Year:</label>
								</div>
							</td>
							<td style="border: solid transparent;">
								<div class="data" style="font-size: 1.0em;font-weight: bold;">
								<select name="year" id="year" style="border: orange solid 2px; height:25px;  margin-top:10px;  width:110px">
									<option value="">Select</option>
									<?php
										$sql = "select * from semester";
										$result = mysqli_query($conn, $sql);
										$currentYear = "";
										while($data = mysqli_fetch_assoc($result)){
											$currentYear = $data['academic_year'];
										}
											echo "<option value='".$currentYear."'>".$currentYear."</option>\n";
									?>
								</select>
								</div>
							</td>
						</tr>

						<tr style="background-color:transparent;">
							<td style="border: solid transparent;">
								<div class="data" style="font-size: 1.0em;font-weight: bold;">
									<label for="semester" style="color:black;">Semester:</label>
								</div>
							</td>
							<td style="border: solid transparent;">
								<div id="sem" class="data" style="font-size: 1.0em;font-weight: bold;">
								<select name="semester" id="semester" style="border: orange solid 2px; height:25px;  margin-top:10px;  width:110px">
									<option value="">Select</option>
									<?php
										$sql = "select * from semester";
										$result = mysqli_query($conn, $sql);
										$currentSem = "";
										while($data = mysqli_fetch_assoc($result)){
											$currentSem = $data['term'];
										}
											echo "<option value='".$currentSem."'>".$currentSem."</option>\n";
									?>
								</select>
								</div>
							</td>
						</tr>
						
						<tr style="background-color:transparent;">
							<td style="border: solid transparent;">
								<div class="data" style="font-size: 1.0em;font-weight: bold;">
									<label for="subject" style="color:black;">Subject:</label>
								</div>
							</td>
							<td style="border: solid transparent;">
								<div class="data" style="font-size: 1.0em;font-weight: bold;">
								<select name="subject" id="subject" style="border: orange solid 2px; height:25px;  margin-top:10px;  width:110px">
									<option value="">Select</option>
									<?php
										$sql = "select * from subjects";
										$result = mysqli_query($conn, $sql);
										while($data = mysqli_fetch_assoc($result)){
											echo "<option value='".$data['subject_title']."'>".$data['subject_title']."</option>\n";
										}
										
									?>
								</select>
								</div>
							</td>
						</tr>
						<tr style="background-color:transparent;">
							<td style="border: solid transparent;">
								<div class="data" style="font-size: 1.0em;font-weight: bold;">
									<label for="professor" style="color:black;">Professor:</label>
								</div>
							</td>
							<td style="border: solid transparent;">
								<div id="prof" class="data" style="font-size: 1.0em;font-weight: bold;">
								<select name="professor" id="professor" style="border: orange solid 2px; height:25px;  margin-top:10px;  width:110px">
									<option value="">Select</option>
								</select>
								</div>
							</td>
						</tr>
	
						<tr style="background-color:transparent;">
							<td colspan="2" style="border: solid transparent;">
								<input type="submit" name="add" class="button2" value="ADD" style="width:100px; margin-top: 25px;">
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<div class="r">
			<div class="card" style="background:white; color:black;">
				<h1>Room</h1>
				<section id="sc">
					<div id="panel" style="overflow: scroll; height: 610px;">
					<?php
						echo "<script>
							$.ajax({
								url: 'getRoomSchedule.php',
								type: 'POST',
								data: {request:' '},
								dataType: 'text',
								beforeSend: function(){
									$('#panel').html('Processing');
								},
								success:function(data){
									$('#panel').html(data);
								},
							});
						</script>";
					?>
					</div>
				</section>
			</div>
		</div>
	</div><!-- row -->

	<?php
	include("footer.php");

	?>
</body>

</html>