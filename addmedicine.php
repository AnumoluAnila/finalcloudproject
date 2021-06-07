
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Add medicine</title>
    <link rel="stylesheet" href="addmedicine.css">
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
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="supplier.php">Home </a>
                    </li>
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="addmedicine.php">Add Medicine</a>
                    </li>
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="viewmedicine.php">View Medicine</a>
                    </li>
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="customerorders.php">Customer Orders</a>
                    </li>
                   
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                   
                </ul> 
                </div>    
                <!-- </div> -->
              </nav>
    <!-- <form method="POST">
    <button name="home" class="button1">home</button>
    <button name="view" class="button2">view medicine</button>
    </form> -->
    
    <div class="header1">
        <h2>Add Medicine</h2>
    </div>
    
    <div class="container">
        <div class="myform">
            <form method="POST" action="Medupload.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-6">
                        <label>Medicine Name</label>
                        <input type="text" class="form-control" name="Medname" placeholder="Medicine name" required/>
                    </div>   
                    <div class="form-group col-6">
                        <label>Price</label><br>
                        <input type="text" class="form-control" name="price" placeholder="Price per sheet" required/>
                    </div>
                </div> 

                <div class="row"> 
                    <div class="form-group col-6">
                        <label >Quantity</label><br>
                        <input type="number" class="form-control" name="Quantity" placeholder="Quantity" required/>
                    </div>
                    <div class="form-group col-6">
                        <label >Category</label><br>
                        <input type="text" class="form-control" name="category" placeholder="category" required/>   
                    </div>
                </div> 

                <div class="row"> 
                    <div class="form-group col-6">
                        <label>Manufacture Date</label>
                        <input type="date" class="form-control" name="Mdate" placeholder="Manufacture Date" required/>    
                    </div>
                    <div class="form-group col-6">   
                        <label >Expire Date</label>
                        <input type="date" class="form-control" name="Edate" placeholder="Expire Date" required/>    
                    </div>
                </div> 
                
                <div class="row"> 
                <div class="form-group col-6">
                        <label>Medicine Type</label>
                        <input type="text" class="form-control" name="Mtype" placeholder="Medicine Type" required/>     
                    </div>
                    <div class="form-group col-6">
                        <label>Image Upload</label><br>
                        <input type="text" class="form-control" name="img" placeholder="Image link" required/>

                    </div> 
                </div> 

                <div class="row "> 
                    <div class="form-group col-6"></div>
                    <div class="form-group col-6">
                        <br>
                        <button type="submit" class="btn1" name="reset" >Reset</button>
                        <button type="submit" class="btn2" name="add" >Add</button>
                    </div>
                </div>     
      </form>
      </div>
    </div>
<?php
//  include 'dbconn.php';
//     if(isset($_POST['home'])){
//         echo "<script>location.href='supplier.php';</script>";
//     }
?>
<?php
//  include 'dbconn.php';
//     if(isset($_POST['view'])){
//         echo "<script>location.href='viewmedicine.php';</script>";
//     }
?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


