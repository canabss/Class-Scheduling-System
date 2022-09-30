<!DOCTYPE html>
<?php
session_start();
	include("databaseConnection.php");
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
			<title>Rooms | Adding</title>
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
			            <li><a href="professors.php">Professor</a></li>
			            <li><a href="students.php">Students</a></li>
			             <li><a href="courses.php">Courses</a></li>
			            <li><a href="sections.php">Year and Sections</a></li>
			            <li><a href="semester.php">Semester</a></li>
			            <li><a href="schedules.php">Schedules</a></li>
			            <li  class="current"  ><a href="rooms.php">Rooms</a></li>
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
				
				<a href="rooms.php" class="button" style="float: left; margin: 20px; text-decoration: none;">Back</a>
				<br><br>
					<div class="bg-modal">
								<div class="main" style="left: 485px; top: 390px; position:-ms-page;">
									<form action="addRoomProcess.php" method="POST">
									
										<h2> Add New Room </h2>

										<div class="data">
											<input type="text" placeholder="Room No." name="room_no" id="room_no">
										</div>

										<div class="data">
											<input type="text" placeholder="Building Name" name="building_name" id="building_name" style="text-transform: capitalize;">
										</div>
										<div class="data">
											<input type="text" placeholder="Description" name="description" id="description" style="text-transform: capitalize;">
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


