<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

    if(!isset($_SESSION['adminId'])){
        echo "<script> alert('Please login ')</script>";
        echo "<script> window.open('../users_area/user_login.php','_self')</script>";
    }
    $adminId=$_SESSION['adminId'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user registration</title>
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font awesome link  -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    />

    <style>
body {
 background-image: url("../admin/media/lgback.jpg");
 background-color: #cccccc;
}
body{
    overflow-x: hidden;
}
.topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
    </style>


</head>
<body>
<div class="container-fluid" style=" border:8px; margin-top:20px; width: 800px; border-radius: 30px; opacity: 0.8; background:white; box-shadow: 2px 4px 8px 8px rgba(0, 0, 0, 0.1);">
<h2 class="text-center m-4 mt-5 pt-3">Add Announcements </h2>
    <h2 class="text-center m-4 mt-5 pt-3">  </h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">



 <!-- name -->
 <div class="form-outline mb-4">
                    <label for="announcement" class="form-label">announcement</label>
                    <input type="text" id="announcement" class="form-control" placeholder="Enter  announcement" autocomplete="off" required="required" name="announcement">
                </div>


                <!-- username -->
                <div class="form-outline mb-4">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" id="type" class="form-control" placeholder="Enter type of announcement " autocomplete="off" required="required" name="type">
                </div>

                
               

              

                

                
                <div class="mt-4 pt-2">
                    <input type="submit" value="Add" class="bg-secondary py-2 px-3 border-0" style='border-radius:50px; color:white;' name='user_register'>
                    <a href="index.php?announcements" class="bg-secondary py-2 px-3 border-0" style='text-decoration:none; border-radius:50px; color:white;' > Cancel</a>



    
                    
                </div>
            </form>
        </div>
    </div>
</div>

    
</body>
</html>

<!-- php code -->

<!-- is there anything wrong with the code below?
 -->



<?php



if(isset($_POST['user_register'])) {
    $type=$_POST['type'];
    $announcement=$_POST['announcement'];
    $addedBy=$_SESSION['adminId'];
    $adminId=$_SESSION['adminId'];
    
    

   

    
    // select query

   
    
        // insert query
    
    $insert_query="insert into `announcements` (announcement,addedBy,type) values ('$announcement','$adminId','$type')";
    
    $sql_execute=mysqli_query($con,$insert_query);
    

    echo "<script> alert('succesful')</script>";
    // echo "<script> window.open('profile.php','self')</script>";
    echo "<script> window.open('index.php?announcements','_self')</script>";
    



}

?>