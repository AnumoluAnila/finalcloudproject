<?php 

include 'dbconn.php';

$mid=$_GET['mid'];
$q="delete from cart where mid=$mid";
mysqli_query($con,$q);
header('location:mycart.php');

?>