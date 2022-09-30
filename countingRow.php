<?php 

	function getNumberOfRows($accounts, $row){
		while($data  = mysqli_fetch_assoc($accounts)){
			$row++;
		}
		return $row + 1;
	}
?>