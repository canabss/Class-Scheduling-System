<!DOCTYPE html>
<?php
session_start();
	include("databaseConnection.php");
	if(!isset($_SESSION["username"])){
		header("Location: login.php");
	exit(); }
?>
	<html lang="en">
		<head>
			<title>Class Scheduling System | Subjects</title>
			<link rel="stylesheet" href="style.css">
			<script src="js/jquery-3.5.1.min.js"></script>
			<link rel="icon" href="images/bsu.png">
			<style>
				@media only screen and (max-width: 800px), (min-device-width: 768px) and (max-device-width: 1024px){  
					/* Force table to not be like tables anymore */   
	   				.panel table {
	   					height: 350px;
	   				}
					.panel   table, thead, tbody, th, td, tr {
						display: block;
	      			} 
	          		/* Hide table headers (but not display: none;, for accessibility) */  
	          		thead tr {   
	    				position: absolute; 
					    top: -9999px;   
					    left: -9999px; 
	      			}   
	 				tr {
	   					border:  1px solid #ccc; 
	  				}  
	  				td {   
	        			/* Behave like a "row" */
					    border: none;     
					    border-bottom: 1px solid #eee;
					    position: relative;   
	      				padding-left: 50%;  
	      			}    
	      			td:before { 
	        			/* Now like a table header */
	        			position: absolute; 
	        			/* Top/left values mimic padding */
	        			top: 6px; 
					    left: 6px;    
					    width: 45%;   
	      				padding-right: 10px;  
	    				white-space: nowrap;  
	    			}
	        		/*  Label the data  */ 
	      			td:nth-of-type(1):before {
	       				content: "Subject Code";
	       			}  
	      			td:nth-of-type(2):before { 
	      				content: "Subject Title";
	       			} 
	       			td:nth-of-type(3):before { 
	      				content: "Subject Description";
	       			} 
	       			td:nth-of-type(4):before { 
	      				content: "Course";
	       			} 
	       			td:nth-of-type(5):before { 
	      				content: "Semester";
	       			} 
	       			td:nth-of-type(6):before { 
	      				content: "Year Level";
	       			} 
	       			td:nth-of-type(7):before { 
	      				content: "Action";
	       			} 
	        		
	        	}	
			</style>
			
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
			            <li><a href="rooms.php">Rooms</a></li>
			            <li  class="current"  ><a href="subjects.php">Subject</a></li>
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
			<div class="center">
	     		<div class="card" style="background:white; color:black;">
					<input style="border:1px solid maroon;outline:none; float: left; width: 200px;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
						
					<div class="start">
						<a href="addSubject.php" class="button" id="button" style="text-decoration:none;"> Add New Subject </a>
					</div>
					<br><br>
					<script>
							$(document).ready(function(){
								$("#myInput").keyup(function(){
								var value = $(this).val();
								if(value != ""){
									$.ajax({
										url: 'searchSubject.php',
										type: 'POST',
										data: {search:value},
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
										url: 'searchSubject.php',
										type: 'POST',
										data: {search:" "},
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
					
					<br><hr>

					<div id="panel" class="panel" style="overflow:scroll; height: 380px;">
						<div >
							<table id="Ptable"> 
								<thead> 
									<tr class="header"> 	
										<th>Subject Code</th> 	                 	                 
										<th>Subject Title</th>
										<th>Subject Description</th> 
										<th>Course</th>	
										<th>Semester</th> 
										<th>Year Level</th>	
										<th>Action</th> 
									</tr> 	
								</thead> 
		     					<tbody> 
		     						<?php
			     							$sql = "select * from subjects";
			     							$result = mysqli_query($conn, $sql);
			     							$info = array();
			     							while($data = mysqli_fetch_assoc($result)){
	    										$info[] = $data;
	    									}
			     							foreach($info as $data){
			     								echo "<tr>
			     										<td>".$data["subject_code"]."</td>
			     										<td>".$data["subject_title"]."</td>
			     										<td>".$data["subject_description"]."</td>
			     										<td>".$data["course"]."</td>
			     										<td>".$data["semester"]."</td>
			     										<td>".$data["year"]."</td>
			     										
			     										<td><form method='post' action='editSubject.php' >
										                        <input name='id' type='hidden' value='".$data['subject_code']."'>
										                        <input type='submit' class='button2' name='edit' value='Edit'>
									                        </form>
									                        <form  method='post' action='deleteSubjectProcess.php'>
										                        <input name='id' type='hidden' value='".$data['subject_code']."'>
										                        <input type='submit' class='button2' name='delete' value='Delete'>
									                        </form>
									                    </td>
			     									  </tr>";
			     							}

			     						?>		
		     					</tbody>
		     				</table>
		     			</div>
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
