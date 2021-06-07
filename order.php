<?php
include 'dbconn.php';
session_start();
$k=$_SESSION["mail"];
if(isset($_POST['order'])){
    $selectquery="select * from cart where cemail='$k'";
    $query=mysqli_query($con,$selectquery);
    while($result=mysqli_fetch_array($query)){
        $mid=$result['mid'];
        $cemail=$result['cemail'];
        $qty=$result['qty'];
        $date=date("Y-m-d h:i:s");
        
        
        $stmt=mysqli_stmt_init($con);
       $insert="insert into orders(mid,cemail,qty,date) values(?,?,?,?)";
       $upquery=" update medicine set mqty=mqty-? where mid=? and mqty-?>=0";
        // $query=mysqli_query($con,$upquery);
       if(!mysqli_stmt_prepare($stmt,$insert)){
        echo "my sql error";
        }else{
        mysqli_stmt_bind_param($stmt,"isis",$mid,$cemail,$qty,$date);
        mysqli_stmt_execute($stmt);

        if(!mysqli_stmt_prepare($stmt,$upquery)){
        echo "my sql error";
        // echo "<script>location.href='orderpage.php'</script>";
        }else{
        mysqli_stmt_bind_param($stmt,"iii",$qty,$mid,$qty);
        mysqli_stmt_execute($stmt);
        echo "<script>location.href='orderpage.php'</script>";

        }
        }
        $insert="delete from cart where cemail='$k'";
       if(!mysqli_stmt_prepare($stmt,$insert)){
        echo "my sql error";
        }else{
        // mysqli_stmt_bind_param($stmt1,"ss",$email,$compname);
                mysqli_stmt_execute($stmt);
                echo "<script>location.href='orderpage.php'</script>";

        }
    }
}
?>