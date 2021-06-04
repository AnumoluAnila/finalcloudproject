<?php

include 'dbconn.php';
     

if(isset($_POST['submit'])){
    
    $idupdate=$_GET['mid'];

    $medname=$_POST['Medname'];
    $price=$_POST['price'];
    $quantity=$_POST['Quantity'];
    $category=$_POST['category'];
    $Mtype=$_POST['Mtype'];
    $Mdate=$_POST['Mdate'];
    $Edate=$_POST['Edate'];
    $file=$_POST['img'];

// print_r($file);

//    $filename=$file['name'];
//    $filepath=$file['tmp_name'];
//    $fileerror=$file['error'];

// if($fileerror==0){
//     $destfile='upload/'.$filename;
//     echo "$destfile";
//     move_uploaded_file($filepath,$destfile);

    // $insertquery="insert into addmedicine(medname,price,quantity,category,medtype,Mdate,Edate,img) values('$medname','$price','$quantity','$category','$Mtype','$Mdate','$Edate','$destfile')";
    $upquery=" update medicine set mid=$idupdate, mname='$medname', price='$price', mqty='$quantity', mcate='$category', mtype='$Mtype', mmfg='$Mdate', mexp='$Edate', mlink='$file' where mid=$idupdate ";
    
    $query=mysqli_query($con,$upquery);
    echo '<script>alert("Medicine details updated successfully")</script>';
      echo "<script>location.href='viewMedicine.php'</script>";
    
    
   
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Update medicine</title>
    <link rel="stylesheet" href="addmedicine.css">
</head>
<body>
    <div class="header1">
        <h2>Update Medicine</h2>
    </div>
    
    <div class="container">
        <div class="myform">
            <form method="POST" action="">
                <div class="row">
                <?php

        include 'dbconn.php';
        $ids=$_GET['mid'];

    $showquery= "select * from medicine where mid={$ids}";
    $showdata=mysqli_query($con,$showquery);
    $arrdata=mysqli_fetch_array($showdata);
    ?>
  


                    <div class="form-group col-6">
                        <label>Medicine Name</label>
                        <input type="text" class="form-control" name="Medname" placeholder="Medicine name" value="<?php echo $arrdata['mname']; ?>" required/>
                    </div>   
                    <div class="form-group col-6">
                        <label>Price</label><br>
                        <input type="text" class="form-control" name="price" placeholder="Price per sheet" value="<?php echo $arrdata['price']; ?>" required/>
                    </div>
                </div> 

                <div class="row"> 
                    <div class="form-group col-6">
                        <label >Quantity</label><br>
                        <input type="number" class="form-control" name="Quantity" placeholder="Quantity" value="<?php echo $arrdata['mqty']; ?>" required/>
                    </div>
                    <div class="form-group col-6">
                        <label >Category</label><br>
                        <input type="text" class="form-control" name="category" placeholder="category" value="<?php echo $arrdata['mcate']; ?>" required/>   
                    </div>
                </div> 

                <div class="row"> 
                    <div class="form-group col-6">
                        <label>Manufacture Date</label>
                        <input type="date" class="form-control" name="Mdate" placeholder="Manufacture Date" value="<?php echo $arrdata['mmfg']; ?>" required/>    
                    </div>
                    <div class="form-group col-6">   
                        <label >Expire Date</label>
                        <input type="date" class="form-control" name="Edate" placeholder="Expire Date" value="<?php echo $arrdata['mexp']; ?>" required/>    
                    </div>
                 </div> 
                
                <div class="row"> 
                <div class="form-group col-6">
                        <label>Medicine Type</label>
                        <input type="text" class="form-control" name="Mtype" placeholder="Medicine Type" value="<?php echo $arrdata['mtype']; ?>" required/>     
                    </div>
                    <div class="form-group col-6">
                        <label>Image Upload</label><br>
                        <input type="text" class="form-control" name="img" placeholder="Image link" value="<?php echo $arrdata['mlink']; ?>" required/>

                    </div> 
                </div> 

                <div class="row "> 
                    <div class="form-group col-6"></div>
                    <div class="form-group col-6">
                        <br>
                        <button type="submit" class="btn1" name="submit" >Update</button>
                        
                    </div>
                </div>     
      </form>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>