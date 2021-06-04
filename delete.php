<?php 

include 'dbconn.php';

$mid=$_GET['mid'];
$q="delete from medicine where mid=$mid";
mysqli_query($con,$q);
header('location:viewmedicine.php');
?>
