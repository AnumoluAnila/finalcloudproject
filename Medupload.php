<?php

include 'dbconn.php';

if(isset($_POST['add'])){

    $mname=$_POST['Medname'];
    $mtype=$_POST['Mtype'];
    $mcate=$_POST['category'];
    $mqty=$_POST['Quantity'];
    $mmfg=$_POST['Mdate'];
    $mexp=$_POST['Edate'];
    $price=$_POST['price'];
    $mlink=$_POST['img'];

   // print_r($file);

      $insertquery="insert into medicine(mname,mtype,mcate,mqty,mmfg,mexp,price,mlink) values('$mname','$mtype','$mcate','$mqty','$mmfg','$mexp','$price','$mlink')";
      $query=mysqli_query($con,$insertquery);

      echo '<script>alert("successfull")</script>';
      echo "<script>location.href='addmedicine.php'</script>";


}
?>