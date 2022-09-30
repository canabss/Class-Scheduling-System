<table id="Ptable"> 
<thead> 
	<tr class="header"> 	
		<th>ID</th> 	                 	                 
		<th>Full Name</th> 	
		<th>Age</th>
		<th>Gender</th> 
		<th>Year</th>
		<th>Section</th>
		<th>Course</th>
		<th>Major</th>
		<th>Status</th>
		<th>Action</th>
	</tr> 	
</thead> 
	<tbody> 
	<?php
	include('databaseConnection.php');
			if($_POST['search']){
					$search = $_POST['search'];
					$sql="";
					if($search == " "){
						echo "<script>console.log('I got here');</script>";
						$sql = "select * from students";
					}
					else
						$sql = "select * from students where fname like '%$search%' OR lname like '%$search%' OR mname like '%$search%'";
				$result = mysqli_query($conn, $sql);
				$info = array();
				while($data = mysqli_fetch_assoc($result)){
				$info[] = $data;
				}
				foreach($info as $data){
					echo "<tr>
							<td>".$data["student_id"]."</td>
							<td>".$data["fname"]." ".$data["mname"]." ".$data["lname"]."</td>
							<td>".$data["age"]."</td>
							<td>".$data["gender"]."</td>
							<td>".$data["year"]."</td>
							<td>".$data["section"]."</td>
							<td>".$data["course_id"]."</td>
							<td>".$data["major"]."</td>
							<td>".$data["status"]."</td>
							<td><form method='post' action='editStudent.php' >
		                        <input name='id' type='hidden' value='".$data['student_id']."';>
		                        <input type='submit' class='button2 name='edit' value='Edit'>
	                        </form>
	                        <form  method='post' action='deleteStudentProcess.php'>
		                        <input name='id' type='hidden' value='".$data['student_id']."';>
		                         <input type='submit' class='button2 name='delete' value='Delete'>
	                        </form>
						  </tr>";
				}
			}
			mysqli_close($conn);
			?>		
	</tbody>
</table>