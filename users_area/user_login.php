<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
global $con;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user login</title>
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

.container{
    margin-top:auto;}
    
    </style>
</head>
<body>

<div class="topnav">
  <a class="active" href="user_login.php">student login</a>
  <a href="faculty_login.php">faculty Login</a>
  <a href="admin_login.php">admin Login</a>
  
</div>




<div class="container-fluid my-3 p-5" style="border:8px; 
opacity: 0.8;
 width: 650px; height:600px; background:white; box-shadow: 2px 4px 8px 8px rgba(0, 0, 0, 0.05);">
    <h2 class="text-center p-3">User Login</h2>
    <div class="row d-flex align-items-center justify-content-center mt-5">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" >

                <!-- username -->
                <div class="form-outline mb-4">
                    <label for="regNo" class="form-label">registration Number</label>
                    <input type="text" id="regNo" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="regNo">
                </div>

            

                 <!-- password feild -->
                 <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="password">
                </div>

            
                <div class="mt-4 pt-2">
                    <input type="submit" value="LOGIN" class="bg-secondary py-2 px-3 border-0 " style='border-radius:50px; color:white;' name="user_login">

                    <a style='border-radius:50px' href='user_registration.php' class='btn btn-secondary'>register</a>
                    
                  
                </div>
            </form>
        </div>
    </div>
</div>

    
</body>
</html>


<?php
if (isset($_POST['user_login'])) {
   $regNo=$_POST['regNo'];
    $password=$_POST['password'];

    $select_query="select * from `students` where regNo='$regNo'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);

     // will only fetch one record(1st record) an cuz username is unique, only one record is needed
    $row_data=mysqli_fetch_assoc($result);
    
    



    //if there are cart items user redirected to cart

    // $select_query_cart="select * from `user_table` where username='$regNo'";
    // $select_cart=mysqli_query($con,$select_query_cart);
    // $row_count_cart=mysqli_num_rows($select_cart);


    
    if($row_count>0){
       
        if ($password== $row_data['password']) {
            // echo "<script> alert('login succesful')</script>";

            // if($row_count_cart==0 and $row_count==1)
            
            //user exists
            if($row_count==1){
                // find access field of user
                
                $_SESSION['regNo']=$regNo;
                $_SESSION['role']='student';
                
                // echo "<script> window.open('profile.php','self')</script>";
                
                echo "<script> window.open('../index.php?homePage','_self')</script>";
                }

// change ip of user in user_table

            
                



               
            }
            //instead of redirect to payment here, checkout -> payment

        }else{
            echo "<script> alert('invalid credentials')</script>";
           
        }

    }
    // else{
    //     echo "<script> alert('invalid credentials')</script>";
    // }
  


?>


