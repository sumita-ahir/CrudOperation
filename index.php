<?php
     include "header1.php";
?>
<html>
    <head>
        <title>
            ALL OPERATION
        </title>
        <link rel="stylesheet" href="bootstrap.min.css">
        <style>
            .header{
                /* background-color:#555555; */
                background-color:black;
                color:white;
                font-family:serif;
            }
               .main
               {
                font-family:serif;
                /* background-image:linear-gradient(black,pink); */
                    background-image:rgba(0,0,0,0.5);
                 /* background-image: rgba(0.0.0.0.0); */
                 /* background-image: linear-gradient(lightgreen,pink); */
                 width: 500px;
                 margin-top:20px;
                 /* height:100%; */
                 /* text-align: center; */
                 /* margin: 50px auto; */
                 /* border-radius: 5px 5px 5px; */
                 border: 1px solid black;
                 box-shadow: 10px 10px 10px black;           
                 font-size: 20px;
               }
               .tital{
                /* border-bottom: 2px solid black; */
               }
               body{
            
   /* background-color:#FFA07A       */
/* background: radial-gradient(circle, #B7FFC9, #FFFFD6); */
 background-color:#D19C97;
                
                /* background-image: radial-gradient(yellow,violet); */
               }
               .agriment
               {
                   align-items: container;
                   margin: 20px 10px;
                   text-decoration: none;
                   cursor: pointer;
               }               
               .singup
               {
                   margin-left: 10px;
                   margin-top: 20px;
                   text-decoration: none;
               } 
               a{
                text-decoration:none;
               }         
               .btn{
                   width: 90px;
                   margin-left: 30px;
               }
        </style>
    </head>
    <body>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="container rounded main">
                <div class="row p-2">
                    <div class="col-12"><b><h1 class="tital"><b>Registration</b></h1></b></div>
                </div>
                <hr>
               <div class="row p-2">
                 <div class="col-4 ">picture: </div>
                  <div class="col-8">
                    <input type="file" name="file" required  class="form-control">
                   </div>
                  </div>                  
                <div class="row p-2">
                    <div class="col-4">Name:</div>
                    <div class="col-8">
                        <input type="text" name="name" placeholder="Enter name" pattern="[A-Za-z]*" title="Enter only Charector.....!" required class=" form-control">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-4">Password:</div>
                    <div class="col-8">
                        <input type="password" name="password" placeholder="Enter password" maxlength="8" minlength="8" title="Enter proper password.....!" required  class="form-control">
                    </div>
                </div>
                  <div class="row p-2">
                    <div class="col-4">Email: </div>
                       <div class="col-8">
                    <input type="text" name="email" required  class="input form-control" >
                   </div>
                </div>         
                <div class="row p-2">
                    <div class="col-4">Mobile:</div>
                    <div class="col-8">
                        <input type="text" name="mobile" placeholder="Enter Mobile" required pattern="[0-9]{10}" maxlength="10" minlength="10" title="Enter only 10 degit" class="form-control">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-4 ">Gender:</div>
                    <div class="col-4">
                        <input type="radio" class="form-check-input" name="gender" value="Male" checked>&nbsp Male 
                    </div>
                    <div class="col-4">
                        <input type="radio" class="form-check-input" name="gender" value="Female" > &nbsp Female
                    </div>
                </div>
         
                <!-- <div class="row p-2">
                   <div class="col-12 ">
                     <input type="checkbox" name="chek" class="agriment"><a class="agriment">Agree to terms and condition</a>
                   </div>
                </div>                -->
                <div class="row p-2 text-end">
                    <div class="col-12">
                        <input type="submit" name="add" value="Add" class="btn  bg-dark text-white">
                        <a href='show.php' class="btn btn  bg-dark text-white">Show</a>
                        <a href='search.php' class="btn bg-dark text-white">Search</a>

                        
                    </div>
                </div>
                   <div class="row p-2">   
                <div class="singup text-end">
                    <div class="col-12">allrady member ? <a href="login.php" class="sing">Login  Here</a></div>
                </div>    
                </div>               
            </div>
        </form>
    </body>
</html>

<?php
    require("conn.php");
   
    if(isset($_POST['add']))
    {
        $path="image/".$_FILES['file']['name'];
        $r=move_uploaded_file($_FILES ['file']['tmp_name'],$path);
        $name=$_POST['name'];
        $password=md5($_POST['password']);
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $gender=$_POST['gender'];
        $insert="insert into student1(image,name,password,email,mobile,gender)values('$path','$name','$password','$email','$mobile','$gender')";
        try
        {
            $r=mysqli_query($conn,$insert);
            if(!$r)
            {
                throw new Exception('This numder is allrady inserted enter new number.....');

            }
            else{
                echo "Data inserted succsessfully";
            }
        }
        catch(Exception $e)
        {
            echo $e->getmessage();
        }
    }
    
    if(isset($_POST['search']))
    {

         header("location:search.php");
    }
    
    

?>
<?php
    require"footer1.php";
?>