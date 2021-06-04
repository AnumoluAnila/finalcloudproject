<?php

include 'dbconn.php';

if(isset($_POST['login'])){
   
    $cemail=$_POST['cemail'];
    $pwd=$_POST['pwd'];
  

    
    
    
    
    $selectquery="select * from customer where cemail='$cemail'";
    $query=mysqli_query($con,$selectquery);
    $a=mysqli_num_rows($query);
    if($a==0){
    
    echo '<script>alert("please register")</script>';
         echo "<script>location.href='login.html'</script>";


    }else{
        $selectquery="select * from customer where cemail='$cemail' and pwd='$pwd'";
        $query=mysqli_query($con,$selectquery);
        $a=mysqli_num_rows($query);
        if($a){


            
   
            session_start();
            $_SESSION['mail']=$cemail;
            
            echo '<script>alert("login successful")</script>';
         echo "<script>location.href='customer.php'</script>";

        }else{
            echo '<script>alert("password incorrect")</script>';
            echo "<script>location.href='login.html'</script>";

        }
        
    }

}

?>