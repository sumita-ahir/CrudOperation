
<?php
     include "header1.php";
     session_start();
     if(!isset($_SESSION['email']))
     {
         header("location:login.php");
     }

?>

<?php
     require("conn.php");
     $email=$_REQUEST['email'];
     $select="select * from student1 where email='$email'";
     $r=mysqli_query($conn,$select);
     foreach($r as $row){

     }
?>

<?php

    if(isset($_POST['update']))
    {
        $path="image/".$_FILES['file']['name'];
        $r=move_uploaded_file($_FILES ['file']['tmp_name'],$path);
             
        $name=$_POST['name'];
        $password=md5($_POST['password']);
        $gender=$_POST['gender'];
        $update="update student1 set image='$path', name='$name',password='$password',gender='$gender' where email='$email'";
        $r=mysqli_query($conn,$update);
        if($r)
        {
          header("location:show.php");
        }
        else {
          echo mysqli_error($conn);
        }
    }
?>
<html>
    <head>
        <title>
            ALL OPERATION
        </title>
        <link rel="stylesheet" href="bootstrap.min.css">
        <style>
            .header{
                background-color:black;
                color:white;
                font-family:serif;
            }
               .main
               {
                    background:transparent;
                    font-family:serif;
                 /* background-image: rgba(0.0.0.0.4);
                 background-image: linear-gradient(lightgreen,pink); */
                 width: 500px;
                 /* text-align: center; */
                 margin: 50px auto;
                 border-radius: 5px 5px 5px;
                 border: 1px solid black;
                 box-shadow:10px 10px 10px black;
               }
               .tital{
                /* border-bottom: 2px solid black; */
               }
               body{
                background:#D19C97;
                /* background-image: radial-gradient(yellow,violet); */
               }
        </style>
    </head>
    <body>
        <form action="" method="POST">
            <div class="container main">
                <div class="row p-2">
                    <div class="col-12"><b><h1 class="tital"><b>Update Record</b></h1></b></div>
                </div>
                <hr>
               <div class="row p-2">
                 <div class="col-4 "><h5>pictur: </h5></div>
                  <div class="col-8">
                    <input type="file" name="uplodfile" class="form-control"  value="<?php  echo "<img src='$row[image]' height='50px' width='50px'>";    ?>">
                   </div>
                  </div>                        
                <div class="row p-2">
                    <div class="col-4"><h5>Name:</h5></div>
                    <div class="col-8">
                        <input type="text" name="name" class=" form-control" value="<?php echo @$row['name']; ?>" />
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-4"><h5>Password:</h5></div>
                    <div class="col-8">
                        <input type="password" name="password"  class="form-control" value="<?php echo $row['password']; ?>">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-4"><h5>Gender:</h5></div>
                    <div class="col-4">
                        <input type="radio" class="form-check-input" name="gender" value="male"  <?php if($row['gender'] =='male') echo 'checked'; ?>            
                        > Male
                    </div>
                    <div class="col-4">
                        <input type="radio" name="gender" class="form-check-input" value="female"  <?php if($row['gender'] == 'female') echo 'checked'; ?>            
                        > Female
                    </div>
                </div>
                <div class="row p-2 text-end">
                    <div class="col-12">
                        <input type="submit" name="update" value="Update" class="btn bg-dark text-white">
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
<?php
    require"footer1.php";
?>
