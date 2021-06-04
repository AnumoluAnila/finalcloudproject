<?php
    require("dbconn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="adminlogin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="hero">
    <div class="header">
        <h2>Admin Login</h2>
    </div>

    <form method="POST" >
        <div class="input-group">
            <input type="text" placeholder="Admin Name" name="name" autocomplete="off">
        </div>
        <div class="input-group">
            <input type="password" placeholder="Password" name="pwd" autocomplete="off">
        </div>
        <div class="input-group">
            <button type="submit" name="login" value="" class="btn">Login</button>
        </div>
    </form>
</div>
    

<?php
    if(isset($_POST['login']))
    {
        $query="select * from adminlogin where aname='$_POST[name]' and apwd='$_POST[pwd]' ";
        $result=mysqli_query($con,$query);
        if(mysqli_num_rows($result)==1)
        {
            session_start();
            $_SESSION['username']=$_POST['name'];
            // echo"<script>alert('Successful');</script>";
            echo "<script>location.href='supplier.php';</script>";
        }
        else{
            echo"<script>alert('Incorrect password');</script>";
            echo "<script>location.href='adminlogin.php';</script>";
        }
    }
?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>