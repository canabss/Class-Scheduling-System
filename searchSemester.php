<table id="Ptable"> 
	<thead> 
		<tr class="header"> 	
			<th>Term</th> 	                 	                 
			<th>Academic Year</th> 
			<th>Description</th> 	
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
							$sql = "select * from semester";
						}
						else
							$sql = "select * from semester where term like '%$search%' OR academic_year like '%$search%'";
					$result = mysqli_query($conn, $sql);
					$info = array();
					while($data = mysqli_fetch_assoc($result)){
					$info[] = $data;
					}
					foreach($info as $data){
						echo "<tr>
								<td>".$data["term"]."</td>
								<td>".$data["academic_year"]."</td>
								<td>".$data["description"]."</td>
								
								<td><form method='post' action='editSemester.php' >
			                        <input name='id' type='hidden' value='".$data['id']."'>
			                        <input type='submit' class='button2' name='edit' value='Edit'>
		                        </form>
		                        <form  method='post' action='deleteSemesterProcess.php'>
			                        <input name='id' type='hidden' value='".$data['id']."'>
			                        <input type='submit' class='button2' name='delete' value='Delete'>
		                        </form>
		                        </td>
							  </tr>";
					}
				}
				?>		
		</tbody> 
</table>