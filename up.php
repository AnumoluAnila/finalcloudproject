<?php
include 'dbconn.php';
session_start();

$id=$_GET['mid'];
// echo $id;
$qty=$_GET['qty'];

$selectquery="select * from medicine where mid='$id'";
$query=mysqli_query($con,$selectquery);
            
$result=mysqli_fetch_array($query);
$v=$result['mqty'];

if($v>=$qty){


$upquery=" update cart set qty='$qty' where mid='$id'";

$query1=mysqli_query($con,$upquery);
// echo '<script>alert("Medicine details updated successfully")</script>';
  echo "<script>location.href='mycart.php'</script>";
}else{
  

  echo '<script>alert(" Only' .$v.' are left")</script>';
  echo "<script>location.href='mycart.php'</script>";
}


?>