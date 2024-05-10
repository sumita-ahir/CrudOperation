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
?>
<html>
    <head>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <style>
        .header{
                background-color:black;
                color:white;
                font-family:serif;
            }
            body{
                font-family:serif;
                background:white;
                background:#D19C97;
            }
            .style{
                width:450px;
                font-family:serif;
                margin-top:50px;
                box-shadow:10px 10px 10px black;
                color:black;font-family:serif;
                border:1px solid black;
            }
    </style>
    <body>
        <form method="post">
            <div class="container style rounded main  bg-#D19C97;">
                <div class="row p-2">
                    <div class="col-12">
                    <h1 class=" align-center"><b>Search Records</b></h1>
                    </div>
                </div>
                <hr>
                <div class="row p-2">
                    <div class="col-4"><h5>Search Record</h5></div>
                    <div class="col-8"><input type="text" name="email" placeholder="Enter Email Id"  class="form-control"></div>
                </div>
                <div class="row p-2 text-end">
                    <div class="col-12">
                       <h5> <input type="submit" name="search" value="Search" class="btn bg-dark text-white"></h5>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
<?php
   if (isset($_POST['search']))
   {
       $email=$_POST['email'];
       $select="select * from student1 where email=$email";
       $r=mysqli_query($conn,$select);
       $count=mysqli_num_rows($r);
       if($count<=0)
       {
           echo "Records not found";
       }
       else {
           echo "<table class='table container bg-dark text-white w-80'>";
                echo "<tr class='bg-dark text-white'>";
                  echo "<th>Name</th>";
                  echo "<th>Email</th>";                  
                  echo "<th>Mobile</th>";     
                  echo "<th>Gender</th>";     
                echo "</tr>";   
                foreach ($r as $p)
                {}
                echo "<tr>";
                 echo "<td>$p[name]</td>";
                 echo "<td>$p[email]</td>";  
                 echo "<td>$p[mobile]</td>";     
                 echo "<td>$p[gender]</td>";    
               echo "</tr>";   
          echo "</table>";         
       }
   }
?>
<?php
    require"footer1.php";
?>
