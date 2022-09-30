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
				include('databaseConnection.php');
					if($_POST['search']){
						$search = $_POST['search'];
						$sql="";
						if($search == " "){
							echo "<script>console.log('I got here');</script>";
							$sql = "select * from subjects";
						}
						else
							$sql = "select * from subjects where subject_code like '%$search%' OR subject_title like '%$search%'";
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
				}
				?>		
		</tbody>
</table>