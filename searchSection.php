<table id="Ptable"> 
	<thead> 
		<tr class="header"> 	
			<th>Course</th> 	                 	                 
			<th>Major</th> 
			<th>Year</th> 	                 	                 
			<th>Section</th>	
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
							$sql = "select * from section";
						}
						else
							$sql = "select * from section where course_title like '%$search%' OR major like '%$search%' OR section like '%$search%'";
					$result = mysqli_query($conn, $sql);
					$info = array();
					while($data = mysqli_fetch_assoc($result)){
					$info[] = $data;
					}
					foreach($info as $data){
						echo "<tr>
								<td>".$data["course_title"]."</td>
								<td>".$data["major"]."</td>
								<td>".$data["year_level"]."</td>
								<td>".$data["section"]."</td>
								
								<td><form method='post' action='editSection.php' >
			                        <input name='id' type='hidden' value='".$data['section_id']."'>
			                        <input type='submit' class='button2' name='edit' value='Edit'>
		                        </form>
		                        <form  method='post' action='deleteSectionProcess.php'>
			                        <input name='id' type='hidden' value='".$data['section_id']."'>
			                        <input type='submit' class='button2' name='delete' value='Delete'>
		                        </form>
		                        </td>
							  </tr>";
					}
				}
				?>	
		</tbody> 
</table>