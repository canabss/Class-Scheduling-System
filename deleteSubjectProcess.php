<?php
   include('databaseConnection.php');
    $id = $_POST['id'];
    $sql = "delete from subjects where subject_code ='$id'";
	$result = mysqli_query($conn, $sql);
    if(!$result)
    {
        echo ("Unable to delete!" .mysqli_error());
    }
    else{
   			echo '<script type="text/javascript">
                      alert("Successfuly Deleted");
                      document.location="subjects.php";
                   </script>';
    }
    mysqli_close($conn);
?>