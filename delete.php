<?php

     session_start();
     if(!isset($_SESSION['email']))
     {
         header("location:login.php");
     }

?>

<?php
 include("conn.php");
 $email=$_REQUEST['email'];
 $delete="delete from student1 where email='$email'";
 $r=mysqli_query($conn,$delete);
 if($r)
 {
     
     header("location:show.php");
 }
 else {
     echo mysqli_error($conn);
 }
?>