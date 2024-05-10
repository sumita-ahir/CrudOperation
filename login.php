<?php
     include "header1.php";
    session_start();

    require("conn.php");
    if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $select="select email,password from student1 where email='$email' and password='$password'";
        $r=mysqli_query($conn,$select);
        if($r)
        {
            $_SESSION['email']=$email;
            header("location:show.php");
            
        }
        else {
            echo "Enter proper detail";
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
                    font-family:serif;
                    height:290px;
                    background:#D19C97;
                 /* background-image: linear-gradient(lightgreen,pink); */
                 width: 450px;
                 /* text-align: center; */
                 margin: 50px auto;
                 /* border-radius: 5px 5px 5px; */
                 border: 1px solid black;
                 box-shadow: 10px 10px 10px black;
               }
               .tital{
                /* border-bottom: 2px solid black; */
               }
               body{
                
                background:#D19C97;;
               }
              .forgetpass
               {
                   text-decoration: none;
                   text-align: center;
                   margin-left: 20px;
           
               }
               .singup{
                   margin-left: 10px;
                   margin-top: 20px;
                   text-decoration: none;
               }a{
                text-decoration:none;
               }
        </style>
    </head>
    <body>
        <form action="" method="POST">
            <div class="container rounded main">
                <div class="row p-2">
                    <div class="col-12"><b><h1 class="tital"><b> Login User </b></h1></b></div>
                </div>
                <hr>
                <div class="row p-2">
                    <div class="col-4"><h5>Email:</h5></div>
                    <div class="col-8">
                        <input type="text" name="email" placeholder="Enter Email" class=" form-control">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-4"><h5>Password:</h5></div>
                    <div class="col-8">
                        <input type="password" name="password" placeholder="Enter password" class="form-control">
                    </div>
                </div>
               <!-- <div>
                    <div class="col-12"><a href="" class="forgetpass"><h5>forget password ?</h5></a></div>
                </div>                     -->
               <div class="row p-2">
                    <div class="col-8">
                        <input type="submit" value="Login user" name="login"class="btn bg-dark text-white">  
                    </div>
                    <div class="col-4 p-3">
                    <a href="index.php" class="sing"><h5>Registration</h5></a> 
                    </div>
                </div>   
                <!-- <div class="row p-2 ">    
               <div class="singup text-end">
                    <div class="col-12"> <a href="insert.php" class="sing"><h5>Registration</h5></a></div>
                </div> 
                </div>               -->
            </div>
        </form>
    </body>
</html>
<?php
    require"footer1.php";
?>
