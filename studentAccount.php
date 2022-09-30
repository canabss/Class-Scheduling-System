<!DOCTYPE html>
<?php
session_start();
include("databaseConnection.php");

if (!isset($_SESSION["username"])) {
	header("Location: login.php");
	exit();
}

if (isset($_SESSION['username'])) {

	if ($_SESSION['usertype'] == "admin") {
		header("location: home.php");
	} else if ($_SESSION['usertype'] == "professor") {
		header("location: professorAccount.php");
	}
}
$id = $_SESSION["username"];
	$sql = "select * from students where student_id = '$id'";
	$result = mysqli_query($conn, $sql);
	$studInfo = array();
	$section = "";
	while($data = mysqli_fetch_assoc($result)){
		$studInfo[] = $data;
		$section =  $data['section'];
	}
	//echo json_encode($studInfo);

	$sql = "select * from semester";
	$result = mysqli_query($conn, $sql);
	$currentYear = "";
	$currentSem = "";
	while($data = mysqli_fetch_assoc($result)){
		$currentYear = $data['academic_year'];
		$currentSem = $data['term'];
	}
	
	//echo $profName ;
?>
<html lang="en">

<head>
	<title>My Account</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<link rel="icon" href="images/bsu.png">
	<style type="text/css">
		@media print {
			title * {
				display: none;
			}

			.menu * {
				display: none;
			}

			table * {
				font-size: 11px;
			}

			.footer * {
				display: none;
			}

			.crd * {
				font-size: 15px;
			}

			.rc {
				display: none;
			}

			body {
				font-size: 11px;
			}

			.lc {
				margin-bottom: 500px;
			}

		}
	</style>
</head>

<body>
	<?php
	include("header.php");
	?>
	<div class="menu" style="background:orange;">
		<nav>
			<ul>
				<li style="font-size: 20px;"><a href="logoutprocess.php">Log out</a></li>
				<p onclick="window.print()" style="font-size: 20px;">Print</p>
			</ul>
		</nav>
	</div>
	<!-- boxes -->
	<div class="rw">
		<div class="lc">
			<div class="crd">
				<table>
					<tr>
						<td><img src="images/us.png" style="width:150px;"></td>
						<td>
							<?php
							foreach($studInfo as $info){
								echo '<p style="font-size:10px">Student ID:</p>
								<p>'.$info["student_id"].'</p>
								<p style="font-size:10px">Name:</p>
								<p>'.$info["lname"].', '.$info["fname"].' '.$info["mname"].'</p>
								<p style="font-size:10px">Section:</p>
								<p>'.$info["section"].'</p>';
							}
							?>
						</td>
					</tr>
					<tr>
						<td>
							<table>
								<tr>
								<?php
									foreach($studInfo as $info){
									echo '<td>
											<p style="font-size:10px">Age:</p>
											<p>'.$info["age"].'</p>
										  </td>
											<td class="s">
												<p style="font-size:10px">Gender:</p>
												<p>'.$info["gender"].'</p>
											</td>';
									}
								?>
								</tr>
							</table>
						</td>
						<td>
							<?php
								foreach($studInfo as $info){
									echo '<p style="font-size:10px">Year Level:</p>
										<p>'.$info["year"].' Year</p>';
										}
								?>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="rc">
			<div class="crd" style="text-align:left;">
				<?php
					foreach($studInfo as $info){
						echo '<p style="font-size:10px">Program:</p>
							  <p>'.$info["course_id"].' - '.$info["major"].'</p>';
					}
						echo '<p style="font-size:10px">School Year:</p>
							  <p>'.$currentYear.'</p>';
					
				?>

				<hr>
				<p>Instructors</p>
				<ul>
				<?php
				$sql1 = "select distinct subject, professor from schedules where section = '$section' and semester = '$currentSem' and academic_year = '$currentYear'";
				$result1 = mysqli_query($conn, $sql1);
				$info = array();
					while($data = mysqli_fetch_assoc($result1)){
					$info[] = $data;
				}
					foreach($info as $in){
						echo '<li>'.$in["subject"]." - ".$in["professor"].'</li>';
					}
				?>
				</ul>
			</div>
		</div>
	</div>

	<!-- nav -->
	
	<!-- schedule -->
	<h1>Schedule</h1>
	<section id="sc">
		<div style="overflow-x:auto;">
			<table>
			<thead>
				<tr>
					<th>Room</th>
					<th>Day</th>
					<th>Time - in</th>
					<th>Time - out</th>
					<th>Subject</th>
					<th>Professor</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql1 = "select * from schedules where section = '$section' and semester = '$currentSem' and academic_year = '$currentYear' order by field(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'), field(time_in, '7:00 am', '7:30 am', '8:00 am', '8:30 am', '9:00 am', '9:30 am', '10:00 am', '10:30 am', '11:00 am', '11:30 am', '12:00 pm', '12:30 pm', '1:00 pm', '1:30 pm', '2:00 pm', '2:30 pm', '3:00 pm', '3:30 pm', '4:00 pm', '4:30 pm', '5:00 pm', '5:30 pm', '6:00 pm', '6:30 pm', '7:00 pm', '7:30 pm', '8:00 pm', '8:30 pm', '9:00 pm', '9:30 pm', '10:00 pm')";
					$result1 = mysqli_query($conn, $sql1);
					$info = array();
						while($data = mysqli_fetch_assoc($result1)){
						$info[] = $data;
					}
					//echo json_encode($info);
					foreach($info as $data){
							echo "<tr>
									<td>".$data["room_no"]."</td>
									<td>".$data["day"]."</td>
									<td>".$data["time_in"]."</td>
									<td>".$data["time_out"]."</td>
									<td>".$data["subject"]."</td>
									<td>".$data["professor"]."</td>
								  </tr>";
					}
				?>
			</tbody>
			</table>
		</div>
	</section>

	<div class="card1"></div>

	<?php
	include("footer.php");

	?>
</body>

</html>