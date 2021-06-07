<?php
  include 'dbconn.php';
  session_start();

if(isset($_POST['addtocart']))
{
  $mid=$_POST['name'];
  $email=$_SESSION['mail'];
  $quantity=1;
  $date=date("Y-m-d H:i:s");
  
  $select="select * from cart where mid='$mid'";
  $query=mysqli_query($con,$select);
  $a=mysqli_num_rows($query);
echo $a;
if($a==0){
  $insertquery="insert into cart(mid,cemail,qty,date) values('$mid','$email','$quantity','$date')";
$query1=mysqli_query($con,$insertquery);
echo '<script>alert("Medicine added to cart successfully")</script>';
echo "<script>location.href='medicine.php'</script>";
}
else{
  echo '<script>alert("Medicine already added in cart")</script>';
  echo "<script>location.href='mycart.php'</script>";
}
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
    <!-- <link rel="stylesheet" href="medicine.css"> -->
</head>
<style>
  #serach_text{
    width:500px;
    height:40px;
    margin-left:430px;
    
  }
  </style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-3 pb-">
                <!-- <div class="container"> -->
                    <!-- <a class="navbar-brand" href="#">PMS</a> -->
                    <form class="form-inline">
                      <!-- <i class="fa fa-search" style="font-size:24px"></i> -->
                      <input type="text" name="search" id="serach_text" class="form-control form-control-lg rounded-2 border-dark " placeholder="Search Medicine"> 
                </form>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="customer.php">Home </a>
                    </li>
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="about.php">AboutUs</a>
                    </li>
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="medicine.php">Medicine</a>
                    </li>
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="mycart.php">Cart</a>
                    </li>
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="orderpage.php">Orders</a>
                    </li>
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="logout2.php">Logout</a>
                    </li>
                </ul> 
                </div>      
                <!-- </div> -->
              </nav>
              <!-- <div class="form-inline">
              <i class="fa fa-search" style="font-size:24px"></i>
            <input type="text" name="search" id="serach_text" class="form-control form-control-lg rounded-2 border-dark" placeholder="Search Medicine"> 
       </div> -->
              
<div class="row ml-0 mr-0 ">
<div class="col-lg-3 ml-5">
    <form  method="GET">
        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                <h5>Categories</h5>
                <!-- <button type="submit" class="btn btn-primary btn-sm float-right">Search</button></h5> -->
            </div>
            <div class="card-body">
                <div class=" row row1">
                  <ul class="list-group">
                  <?php 
                    include 'dbconn.php';
                    $selectquery="select distinct mcate from medicine order by mcate";
                    $query=mysqli_query($con,$selectquery);
                    while($result=mysqli_fetch_array($query)){
                    ?>
                    
                    <label class="form-check-label"> 
                    <div class="col-md-12 ml-4 mb-2">
                        <input type="checkbox" class="form-check-input product_check" value="<?= $result['mcate']; ?>" id="mcate" ><?=$result['mcate'];?>
                    </div>
                     </label>
                   
                    <?php
                    }
                    ?>
                    </ul>
                </div>

            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                <h5>Types</h5>
                <!-- <button type="submit" class="btn btn-primary btn-sm float-right">Search</button></h5> -->
            </div>
            <div class="card-body">
                <div class=" row row1">
                  <ul class="list-group">
                  <?php 
                    include 'dbconn.php';
                    $selectquery="select distinct mtype from medicine order by mtype";
                    $query=mysqli_query($con,$selectquery);
                    while($result=mysqli_fetch_array($query)){
                    ?>
                    
                    <label class="form-check-label"> 
                    <div class="col-md-12 ml-4 mb-2">
                        <input type="checkbox" class="form-check-input product_check" value="<?= $result['mtype']; ?>" id="mtype" ><?=$result['mtype'];?>
                    </div>
                     </label>
                   
                    <?php
                    }
                    ?>
                    </ul>
                </div>
                
            </div>
        </div>

    </form>
</div>

<div class="col-md-8 ml-4 ">
        <div class="card  mt-4" id="result">
            <!-- <div class="card-header" >
            <h5 class="text-center" id="textchange">Medicine</h5>
            </div> -->
            <?php 
                    include 'dbconn.php';
                    $selectquery1="select distinct mcate from medicine order by mcate";
                    $query1=mysqli_query($con,$selectquery1);
                    while($result1=mysqli_fetch_assoc($query1)){
                    ?>
          
                    <?php
                         include 'dbconn.php';
                         $d=$result1['mcate'];
                         $selectquery2="select * from medicine where mcate='$d'";
                        //  echo $selectquery;
                         $query=mysqli_query($con,$selectquery2) or die( mysqli_error($con));
                         $a=mysqli_num_rows($query);
                         $flag=0;
                         while($result=mysqli_fetch_assoc($query)){
                           if($result['mqty']>0){
                             if($flag==0){


                              ?>
                                <div class="card  mt-4 mx-4">
            <div class="card-header"><h5 class="text-center" id="textchange"> <?php echo $result1['mcate']; ?></h5></div>
           
            <div class="card-body">
            <div class="text-center">
                    <img src="200.gif" id="loader" width="100" style="display:none;">
            </div>
                <div class="row" >

                              <?php

                              $flag=1;
                             }
                    ?>
                    
                    <div class="col-3">
                    <form method="POST">
                        <div class="card mt-3 " style="width: 13rem; height:22rem">
                        <img src="<?php echo $result['mlink']; ?>"  height="180px" class="card-img-top px-4 py-4">
                            <div class="card-body">
                                
                                <p class="card-title " style=" height:5rem"><?php echo $result['mname']; ?></p>
                                <p class="card-text text-danger font-weight-bold">Rs <?php echo $result['price']; ?>
                                
                                <button type="submit" name="addtocart" class="btn btn-primary btn-sm float-right">Add to cart</button>
                                <!-- <a href="#" class="btn btn-primary btn-sm float-right">Add to cart</a> -->
                                </p>
                                <input type="text" name="name" style="display:none" value="<?php echo $result['mid']; ?>">
                            </div>
                        </div>
                        </form> 
                    </div>
                    <?php
                    }
                  }
                    ?>
<?php


if($flag==1){

  ?>



  </div>
  </div>
              </div> 
  <?php


}
?>
                  
                
               
            <?php
                    }
                    ?>  
        </div>
</div>
</div>




<script type="text/javascript">
var king=$("#result").html();
  $(document).ready(function(){

    $('#serach_text').keyup(function(){
            var search= $(this).val();
            $("#loader").show();
      var action='data';
      var mcate=get_filter_text('mcate');
      var mtype=get_filter_text('mtype');
    console.log(mcate);
      $.ajax({
        url:'action1.php',
        method:'POST',
        data:{action:action,mcate:mcate,mtype:mtype,search:search},
        success:function(response){
          $("#result").html(response);
          console.log(response);
          $("#loader").hide();
   
        }
      });
            
        });



    

    $(".product_check").click(function(){
      $("#loader").show();
      var search= $('#serach_text').val();
      var action='data';
      var mcate=get_filter_text('mcate');
      var mtype=get_filter_text('mtype');
    console.log(mcate);
      $.ajax({
        url:'action1.php',
        method:'POST',
        data:{action:action,mcate:mcate,mtype:mtype,search:search},
        success:function(response){
          $("#result").html(response);
          console.log(response);
          $("#loader").hide();
   
        }
      });

    });
    function get_filter_text(text_id){
      var filterData=[];
      $('#'+text_id+':checked').each(function(){
          filterData.push($(this).val());
      });
      return filterData;
    }
  });
</script>
</body>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>   -->

</html>