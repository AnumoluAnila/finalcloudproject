<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
    <link rel="stylesheet" href="cart1.css">
</head>
<style>
.form-inline{
    position:relative;
    left:500px;

}
</style>
<body>
            <!-- <div class="container-fluid ml-0 mr-0"> -->
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
            <!-- </div> -->
            <div class="container ">
                <div class="row col-lg-12 mt-5">
                <h1 class="text-info text-center">Customer Details</h1>
  
                    <div class="form-inline float-right mt-5">
                        <label for="search" class="font-weight-bold lead text-primary">Search</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="text" name="search" id="serach_text" class="form-control form-control-lg rounded-2 border-dark" placeholder="Search Customer"> 
                    </div>
                
                <table class="table table-hover table-bordered mt-4" id="table-data">
                <tr class="bg-secondary text-white text-center">
                    <th>Customer Email</td>
                    <th>MedicineImg</th>
                    <th>MedicineName</th>
                    <th>Category</th>
                    <th>MedicineType</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>ordered date</th>
                    <!-- <th>Remove</th> -->
                    <!-- <th>Delete</th> -->
                </tr>
                <?php
           
            include 'dbconn.php';
            // $k=$_SESSION["mail"];
           
            $selectquery="select * from orders";
            $query=mysqli_query($con,$selectquery);
            
            while($result=mysqli_fetch_array($query)){
                $a=$result['mid'];
                
                $selectquery1="select * from medicine where mid='$a'";
                
                $query1=mysqli_query($con,$selectquery1);
                $result1=mysqli_fetch_array($query1);
                $numrows=mysqli_num_rows($query1);
                if($numrows){
                $q=$result['qty'];
                $p=$result1['price'];
                $t=$q*$p;
               
            
            ?>
        
                <tr> 
                <td><?php echo $result['cemail'] ;?></td>
                    <td><img src="<?php echo $result1['mlink'];?>" width="100" height="50"></td>  
                    <td><?php echo $result1['mname'] ;?></td>
                    <td><?php echo $result1['mcate']; ?> </td>
                    <td> <?php echo $result1['mtype']; ?></td>
                    <td ><?php echo $t?></td>
                    <!-- <input type="hidden" class='iprice' value=''> -->
                    <td><?php echo $result['qty']; ?> </td>
                    <td ><?php echo $result['date']?></td>
                   
                </tr>
                 
                   
        <?php
        }
    }
    ?>
    
 
       
        
            
            </table>
            </div>
            </div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#serach_text').keyup(function(){
            var search= $(this).val();
            $.ajax({
                url:'action3.php',
                method:'post',
                data:{query:search},
                success:function(response){
                    $("#table-data").html(response);
                }
            });
        });
    });
</script>           
 

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</body>
</html>