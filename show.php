<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="bootstrap.min.css">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <style>
      .header{
                background-color:black;
                color:white;
                font-family:serif;
            }
            .main{
               background:#D19C97;
               width:400px;
               font-family:serif;
            }
            body{
               background-color:#D19C97;
            }
            .detail{
               background:white;;
               /* color:white; */
               font-family:serif;
               text-align:center;
               margin-top:500px;
            }
   </style>
</head>
<body class=" background:#D19C97">
   

<?php
      include "header1.php";
     session_start();

     if(!isset($_SESSION['email']))
     {
         header("location:login.php");
     }

?>
<?php

  include("conn.php");
  echo "<link rel='stylesheet' href='bootstrap.min.css'>";
  echo "<table class='table  main container table-table-hover rounded mt-5'>";
 echo"<div class='row detail'>";
//  echo "<tr class=''>";
// echo"<div class='col-12'><h1><b>User Details<b></h1>";
// echo"</div>";
     echo "<div col-12 class='m-3'><h1><b>User Information<b></h1></td>";
     echo"<hr>";
     echo"</div>";
     echo "<tr class='text-end'>";
     echo "<td class='text-end'><a href='logout.php' class='btn bg-dark text-white float-end'>Logout</a></td>";
   //   echo "<td><a href='insert.php' class='btn bg-dark text-white float-end'>InsertData</a></td>";
     echo "</tr>";
   //   echo "<td><a href='logout.php' class='btn bg-info text-white float-end'>LOGOUT</a></td>";
   //   echo "<td><a href='insert.php' class='btn bg-info text-white float-end'>ADD</a></td>";
   
  echo "</tr>";
  echo "<tr class='bg-dark text-white'>";
     echo "<th>Image</th>";
     echo "<th>Name</th>";     
     echo "<th>Password</th>";
     echo "<th>Email</th>";     
     echo "<th>Mobile</th>";     
     echo "<th>Gender</th>";     
     echo "<th colspan='2'>#Action</th>";     
  echo "</tr>";
  $select="select * from student1";
  $r=mysqli_query($conn,$select);
   foreach ($r as $row)
   {
     echo "<tr>";
     echo "<td><img src='$row[image]' height='50px' width='50px'></td>";         
     echo "<td>$row[name]</td>";
     echo "<td>$row[password]</td>";
     echo "<td>$row[email]</td>";     
     echo "<td>$row[mobile]</td>";     
     echo "<td>$row[gender]</td>";    
      echo "<td><a href='update.php?email=$row[email]' class='btn btn-outline-dark'>Update</a></td>";     
      echo "<td><a href='delete.php?email=$row[email]' class='btn btn-outline-dark'>Delete</a></td>";   
     echo "</tr>"; 
   //   echo "<tr class='text-end'>";
   //   echo "<td><a href='logout.php' class='btn bg-dark text-white float-end'>LOGOUT</a></td>";
   //   echo "<td><a href='insert.php' class='btn bg-dark text-white float-end'>ADD</a></td>";
   //   echo "</tr>"; 
          
   }
   
  
  
?>
</body>
</html>
<?php
    require"footer1.php";
?>