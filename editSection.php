<!DOCTYPE html>
<?php
session_start();
	include("databaseConnection.php");
	if(!isset($_SESSION["username"])){
		header("Location: login.php");
	exit(); }

	if(isset($_SESSION['username'])){
	
		if ($_SESSION['usertype'] == "professor"){
			header("location: professorAccount.php");
			}
		
		else if ($_SESSION['usertype'] == "student"){
			header("location: studentAccount.php");
		}
		}
	$id = $_POST['id'];
	$sql = "select * from section where section_id = '$id'";
	$result = mysqli_query($conn, $sql);
	$section = mysqli_fetch_array($result);
?>
	<html lang="en">
		<head>
			<title>Edit | Section</title>
			<link rel="stylesheet" href="style.css">
			<script src="js/jquery-3.5.1.min.js"></script>
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
			            <li  class="current"  ><a href="sections.php">Year and Sections</a></li>
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
				
				<a href="sections.php" class="button" style="float: left; margin: 20px; text-decoration: none;">Back</a>
				<br><br>
					<div class="bg-modal">
								<div class="main" style="left: 485px; top: 390px; position:-ms-page;">
									<form action="editSectionProcess.php" method="POST">
									
										<h2> Edit Section </h2>
										<?php
								
											$value = $section['course_title'];
											echo "<script>
													$(document).ready(function(){
														$('#course').val('$value');
													});</script>";

											$value = $section['major'];
											echo "<script>
													$(document).ready(function(){
														$('#major').val('$value');
													});</script>";
											$value = $section['year_level'];
											echo "<script>
													$(document).ready(function(){
														$('#year').val('$value');
													});</script>";
											
										?>
										<div class="data">
											<input type="hidden" placeholder="ID" name="id" id="id"  value="<?php echo $section['section_id'];?>">
										</div>
										<div class="data" style="font-size: 1.0em;font-weight: bold;">
											<label for="course">Course:</label>
											<select name="course" id="course" style="border: white solid 2px; height:25px;">
												<option value="">Select</option>
												<?php
													$sql = "select distinct course_title from course";
													$result = mysqli_query($conn, $sql);
													while($data = mysqli_fetch_assoc($result)){
														echo "<option value='".$data['course_title']."'>".$data['course_title']."</option>";
													}

												?>
											</select>
										</div>

										<div class="data" style="font-size: 1.0em;font-weight: bold;">
											<label for="major">Major:</label>
											<select name="major" id="major" style="border: white solid 2px; height:25px;  margin-top:10px;">
												<option value="">Select</option>
												<?php
													$sql = "select distinct major from course";
													$result = mysqli_query($conn, $sql);
													while($data = mysqli_fetch_assoc($result)){
														echo "<option value='".ucfirst($data['major'])."'>".ucfirst($data['major'])."</option>";
													}
													mysqli_close($conn);
													
												?>
											</select>
										</div>

										<div class="data" style="font-size: 1.0em;font-weight: bold;">
											<label for="year">Year Level:</label>
											<select name="year" id="year" style="border: white solid 2px; height:25px;  margin-top:5px;">
												<option value="">Select</option>
												<option value="1st">1st</option>
												<option value="2nd">2nd</option>	
												<option value="3rd">3rd</option>
												<option value="4th">4th</option>
											</select>
										</div>

										<div class="data" style="margin-top:5px;">
											<input type="text" placeholder="Section" name="section" id="section" style="text-transform: uppercase;" value="<?php echo $section['section'];?>">
										</div>

										<br>
										<input type="submit" name="add" class="button2" value="UPDATE" style="width:100px;">
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


