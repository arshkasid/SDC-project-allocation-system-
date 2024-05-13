<?php
 include('../includes/connect.php');
$tol=$_GET['tol'];



$sq="delete from `tol` where facultyId='$tol'";
$run=mysqli_query($con,$sq);



echo "<script> alert('Successfully Removed ')</script>";
echo "<script> window.open('index.php?tol','_self')</script>";





?>