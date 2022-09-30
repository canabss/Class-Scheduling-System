<?php
   include('databaseConnection.php');
    $id = $_POST['id'];
    $sql = "delete from rooms where room_no ='$id'";
	$result = mysqli_query($conn, $sql);
    if(!$result)
    {
        echo ("Unable to delete!" .mysqli_error());
    }
    else{
   			echo '<script type="text/javascript">
                      alert("Successfuly Deleted");
                      document.location="rooms.php";
                   </script>';
    }
    mysqli_close($conn);
?>