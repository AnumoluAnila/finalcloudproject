<?php 
session_start();
include 'dbconn.php';

if(isset($_POST['register'])){

    $cname=$_POST['cname'];
    $cemail=$_POST['cemail'];
    $pwd=$_POST['pwd'];
    $rpwd=$_POST['rpwd'];
    $phno=$_POST['phno'];
    $city=$_POST['city'];
    $pincode=$_POST['pincode'];
    
    if($pwd!=$rpwd){
        echo '<script>alert("reenteres password is not matching")</script>';
        echo "<script>location.href='login.html'</script>";
    }else{
    
    $selectquery="select * from customer where cemail='$cemail'";
    $query=mysqli_query($con,$selectquery);
    $a=mysqli_num_rows($query);
    if($a==0){
        $insertquery="insert into customer(cname,cemail,pwd,rpwd,phno,city,pincode) values('$cname','$cemail','$pwd','$rpwd','$phno','$city','$pincode')";
        $query=mysqli_query($con,$insertquery);
        echo '<script>alert("successfully registered")</script>';
        echo "<script>location.href='login.html'</script>";


    }else{
        echo '<script>alert("you cannot register if you are already registered")</script>';
        echo "<script>location.href='login.html'</script>";
    }
}

}
 ?>


<?php
// include 'dbconn.php';
//     if(isset($_POST['register'])){
//         $user_exist_query="select * from customer where cname='$_POST['cname']' OR cemail='$_POST['cemail']'";
//         $result=mysqli_query($con,$user_exist_query);
//         if($result)
//         {
//             if(mysqli_num_rows($result)>0)
//             {
//                 $result_fetch=mysqli_fetch_assoc($result);
//                 if($result_fetch['cname']==$_POST['$cname'])
//                 {
//                     echo"
//                     <script>
//                         alert('user already exist');
//                         window.location.href='login.html';
//                     </script>
//                     ";
//                 }
//                 else{
//                     echo"
//                     <script>
//                         alert('Email Id already exist');
//                         window.location.href='login.html';
//                     </script>
//                     "; 
//                 }
//             }
//             else{
               
//                 if($_POST['pwd']!=$_POST['rpwd']){
//                         echo '<script>alert("reenteres password is not matching")</script>';
//                         echo "<script>location.href='login.html'</script>";
//                     }
//                     $insertquery="insert into customer(cname,cemail,pwd,rpwd,phno,city,pincode) values('$_POST['cname']','$_POST['cemail']','$_POST['pwd']','$_POST['rpwd']','$_POST['phno']','$_POST['city']','$_POST['pincode']')";
//                     $query=mysqli_query($con,$insertquery);
//                     if($query)
//                     {
//                         echo"
//                         <script>
//                             alert('Registered Successfully');
//                             window.location.href='customer.html';
//                         </script>
//                         ";
//                     }


//             }
//         }
//         else{
//             echo"
//             <script>
//                 alert('Not yet registered');
//                 window.location.href='login.html';
//             </script>
//             ";

//         }
//     }
?>
