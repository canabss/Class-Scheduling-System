<?php
   include('databaseConnection.php');
    $id = $_POST['id'];
    $sql = "delete from schedules where schedule_id ='$id'";
	 $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        echo ("Unable to delete!" .mysqli_error());
    }
    else{
   			echo '<script type="text/javascript">
                      alert("Successfuly Deleted");
                      document.location="schedules.php";
                   </script>';
    }
    mysqli_close($conn);
?>