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

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
    <!-- <link rel="stylesheet" href="medicine.css"> -->
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white">
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto  mr-3">
      
      <li class="nav-item">
        <a class="nav-link font-weight-bold text-white bg-dark rounded" href="customer.php">Home</a>
      </li>
      <li class="nav-item ml-3">
        <a class="nav-link  font-weight-bold text-white bg-dark rounded" href="mycart.php">Cart</a>
      </li>
      
    </ul>
  </div>
</nav>
<div class="row ml-0 mr-0 ">
<div class="col-lg-3 ml-5">
    <form  method="GET">
        <div class="card  mt-4">
            <div class="card-header">
                <h5>Categories
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
            <div class="card  mt-4 mx-4">
            <div class="card-header"><h5 class="text-center" id="textchange"> <?php echo $result1['mcate']; ?></h5></div>
           
            <div class="card-body">
            <div class="text-center">
                    <img src="200.gif" id="loader" width="100" style="display:none;">
            </div>
                <div class="row" >
                    <?php
                         include 'dbconn.php';
                         $d=$result1['mcate'];
                         $selectquery2="select * from medicine where mcate='$d'";
                        //  echo $selectquery;
                         $query=mysqli_query($con,$selectquery2) or die( mysqli_error($con));
                         while($result=mysqli_fetch_assoc($query)){
                           if($result['mqty']>0){
                    ?>
                    
                    <div class="col-md-3">
                    <form method="POST">
                        <div class="card mt-3 " style="width: 15rem; height:22rem">
                        <img src="<?php echo $result['mlink']; ?>"  height="180px" class="card-img-top px-4 py-4">
                            <div class="card-body">
                                
                                <p class="card-title " style=" height:5rem"><?php echo $result['mname']; ?></p>
                                <p class="card-text text-danger">Rs <?php echo $result['price']; ?>
                                
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
                </div>
                </div>
              </div> 
            <?php
                    }
                    ?>  
        </div>
</div>
</div>




<script type="text/javascript">
var king=$("#result").html();
  $(document).ready(function(){

    $(".product_check").click(function(){
      $("#loader").show();
      var action='data';
      var mcate=get_filter_text('mcate');
    console.log(mcate);
    if(mcate.length!=0){
      $.ajax({
        url:'action1.php',
        method:'POST',
        data:{action:action,mcate:mcate},
        success:function(response){
          $("#result").html(response);
          console.log(response);
          $("#loader").hide();
          // $("#textchange").text("Filtered medicine");
        }
      });
    }else{
      $("#result").html(king);
    }
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