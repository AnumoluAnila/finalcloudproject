
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="cart1.css">
</head>
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
            <!-- </div> -->
            <div class="container ">
                <div class="row col-lg-12">
                    <div class="col-lg-12 text-center text-primary mt-5 ">
                        <h1>MY CART</h1>
                    </div>
                
                <table class="table table-hover table-bordered mt-4">
                <tr class="bg-secondary text-white text-center">
                    <th>MedicineImg</th>
                    <th>MedicineName</th>
                    <th>Category</th>
                    <th>MedicineType</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>total</th>
                    <th>Remove</th>
                    <!-- <th>Delete</th> -->
                </tr>
                <?php
           
            include 'dbconn.php';
            session_start();
            $k=$_SESSION["mail"];
            
            $selectquery="select * from cart where cemail='$k'";
            $query=mysqli_query($con,$selectquery);
            
            while($result=mysqli_fetch_array($query)){
                $a=$result['mid'];;
                $selectquery1="select * from medicine where mid='$a'";
                $query1=mysqli_query($con,$selectquery1);
                $result1=mysqli_fetch_array($query1);
                $numrows=mysqli_num_rows($query1);
                if($numrows){
                    $a=$result['qty'];
                    if($result1['mqty']<$result['qty']){
                        $a=$result1['mqty'];
                    }
                    
            
        ?>
        <form method="POST" action="re.php">
                <tr> 
                    <td><img src="<?php echo $result1['mlink'];?>" width="100" height="50"></td>  
                    <td><?php echo $result1['mname'] ;?></td>
                    <td><?php echo $result1['mcate']; ?> </td>
                    <td> <?php echo $result1['mtype']; ?></td>
                    <td ><input type="hidden" class="iprice" value="<?php echo $result1['price']; ?>"><?php echo $result1['price']; ?></td>
                    <!-- <input type="hidden" class='iprice' value=''> -->
                    <td><input id="<?php echo $result1['mid']; ?>" type="number" class="text-center iquantity" 
                    onchange='fun(this)' value="<?php echo $a;?>" min='1' max='10'> </td>
                    <td class='itotal'></td>
                    <td> <button class="btn btn-sm btn-danger" ><a href="re.php?mid=<?php echo $result1['mid']; ?>" class="text-white">Remove</a></button></td>
                </tr>
                </form>   
                   
        <?php
        }
    }
    ?>
    
   <?php
   include 'dbconn.php';
   ?>
   <form method="POST" action="makepayment.php">
<tr>
    <td colspan="6" class='text-right font-weight-bold'>Grand Total</td>
    <td id="gtotal"></td>
    <input type="hidden" name="total" id="total">
    <td> <button type="submit" name="order" class="btn btn-sm btn-danger">Order</a></button></td>
</tr>
</form>
       
        
            
            </table>
            </div>
            </div>
            
 
            
<script>
    var gt=0;
    var iprice=document.getElementsByClassName("iprice");
    var iquantity=document.getElementsByClassName("iquantity");
    var itotal=document.getElementsByClassName("itotal");
    var gtotal=document.getElementById("gtotal");
    
    
        gt=0;
        for(i=0;i<iprice.length;i++)
        {

            itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
            gt=gt+(iprice[i].value)*(iquantity[i].value);
        }
        gtotal.innerText=gt;
        
        
        document.getElementById("total").value=gt;
        

        function fun(a){

            location.replace("up.php?mid="+a.id+"&qty="+a.value);

         }
    
    
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>