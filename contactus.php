<?php
session_start();
if(isset($_POST['btn-send']))
{
    $k=$_SESSION['mail'];
    $username=$_POST['Uname'];
    $email=$k;
    $subject=$_POST['Subject'];
    $msg=$_POST['msg'];



$insertquery="insert into order(name,email,subject,wam) values('$username','$email','$subject',' $msg')";
if (mysqli_query($conn, $insertquery)) {
    echo "New record created successfully";
    echo "<script>location.href='contactus.php'</script>";

  } else {
    echo "Error: " . $insertquery. "<br>" . mysqli_error($conn);
  }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="contactus.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <!-- <div class="container"> -->
                    <!-- <a class="navbar-brand" href="#">PMS</a> -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="customer.php">Home </a>
                    </li>
                   
                </ul> 
                </div>    
                <!-- </div> -->
              </nav>
    <div class="container">
        <div class="row">
        <div class="col-lg-6 m-auto">
        <div class="card mt-5">
        <div class="card-title">
        <h2 class="text-center py-2">Contact Us</h2>
        <hr>
        <div>
        <div class="card-body">
            <form  method="POST">
                <input type="text" name="Uname" placeholder="User name" class="form-control mb-2">
                <input type="text" name="Email" placeholder="Email" class="form-control mb-2">
                <input type="text" name="Subject" placeholder="Subject" class="form-control mb-2">
                <textarea name="msg" class="form-control" placeholder="Write the message"></textarea>
                <button class="btn btn-primary mt-3" name="btn-send">Send</button>
            </form>

        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

