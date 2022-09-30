<?php
   include('databaseConnection.php');
    $id = $_POST['id'];
    $sql = "delete from semester where id ='$id'";
	  $result = mysqli_query($conn, $sql);

    if(!$result)
    {
        echo ("Unable to delete!" .mysqli_error());
    }
    else{
   			echo '<script type="text/javascript">
                      alert("Successfuly Deleted");
                      document.location="semester.php";
                   </script>';
    }
    mysqli_close($conn);
?>