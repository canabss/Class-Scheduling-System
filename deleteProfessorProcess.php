<?php
   include('databaseConnection.php');
    $id = $_POST['id'];
    $sql = "delete from professors where professor_id ='$id'";
	  $result = mysqli_query($conn, $sql);
    $sql1 = "delete from user_accounts where username ='$id'";
    $result1 = mysqli_query($conn, $sql1);
    if(!$result || !$result1)
    {
        echo ("Unable to delete!" .mysqli_error());
    }
    else{
   			echo '<script type="text/javascript">
                      alert("Successfuly Deleted");
                      document.location="professors.php";
                   </script>';
    }
    mysqli_close($conn);

?>