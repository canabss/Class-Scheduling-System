<!DOCTYPE html>
<?php
session_start();
	require("databaseConnection.php");
	if(!isset($_SESSION["username"])){
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
			<title>Professors | Adding</title>
			<link rel="stylesheet" href="style.css">
			<link rel="icon" href="images/bsu.png">
		</head>
		<body>
			<?php
				include("header.php");
			?>
			<div class="menu">
				<nav >
	          		<ul >
	          			<li><a href="home.php">Home</a></li>
			            <li  class="current"  ><a href="professors.php">Professor</a></li>
			            <li><a href="students.php">Students</a></li>
			            <li><a href="courses.php">Courses</a></li>
			            <li><a href="sections.php">Year and Sections</a></li>
			            <li><a href="semester.php">Semester</a></li>
			            <li><a href="schedules.php">Schedules</a></li>
			            <li><a href="rooms.php">Rooms</a></li>
			            <li><a href="subjects.php">Subject</a></li>
			            <li><a href="logoutprocess.php" >Log out</a></li>
	          		</ul>
	        	</nav>
			</div>
			<div class="row">
				<div class="left" >
	     			<div class="card" style="background:orange; color:white;">
						<h1>Admin Page</h1>
	     			 	<p>Welcome ! Admin</p>
						<hr>
					</div>
				</div>
			<br>
			<div class="center">
				
				<a href="professors.php" class="button" style="float: left; margin: 20px; text-decoration: none;">Back</a>
				<br><br>
					<div class="bg-modal">
						<div class="main" style="left: 485px; top: 390px;">
							<form action="addProfessorProcess.php" method="POST">
						
								<h2> Add New Professor </h2>

								<div class="data">
									<input type="text" placeholder="ID" name="id" id="id" >
								</div>

								<div class="data">
									<input type="text" placeholder="First Name" name="fname" id="fname" style="text-transform: capitalize;">
								</div>

								<div class="data">
									<input type="text" placeholder="Middle Name" name="mname" id="mname" style="text-transform: capitalize;">
								</div>

								
								<div class="data">
									<input type="text" placeholder="Last Name" name="lname" id="lname" style="text-transform: capitalize;">
								</div>
								<div class="data">
									<input type="text" placeholder="Rank" name="rank" id="rank" style="text-transform: capitalize;">
								</div>

								<div class="data" style="font-size: 1.0em;font-weight: bold;">
									<label for="department">Department:</label><br/>
									<select name="department" id="department" style="border: white solid 2px; height:25px;  margin-top:10px;">
										<option value="">Select</option>
										<option value="Industrial and Information Technology Department">Industrial and Information Technology Department</option>
										<option value="Business Administration Department">Business Administration Department</option>
										<option value="General Academic and Teacher Education Department">General Academic and Teacher Education Department</option>
									</select>
								</div>


								<div class="data" style="font-size: 1.0em;font-weight: bold;  margin-top:2px;">
									<label for="type">Type:</label><br/>
									<select name="type" id="type" style="border: white solid 2px; height:25px; margin-top:10px;">
										<option value="">Select</option>
										<option value="regular">Regular</option>
										<option value="part-time">Part-time</option>	
										
									</select>
								</div>
								<br>
								<input type="submit" name="add" class="button2" value="ADD" style="width:100px;">
								
						
							</form>
							
								
						</div>
					</div>
				
			</div>
			<div class="right" >
	     			<div class="card" style="background:orange; color:white;">
						<h1>BULACAN STATE UNIVERSITY</h1>
						<hr>
						<h1> Departments</h1>
						<ul>
							<li>Industrial and Information Technology Department</li>
							<li>Business Administration Department</li>
							<li>General Academic and Teachers Education Department</li>
						</ul>
						<hr>
						<h1>Department Heads</h1>
						<ul>
							<li>Ms. Sansano, Lea (IIT)</li>
						</ul>
					
					</div>
				</div>	
			</div>
			<?php
				include("footer.php");
				
			?>
		</body>
		</html>
