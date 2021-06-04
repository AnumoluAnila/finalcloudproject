<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title>viewmedicine</title>
    <!-- <style>
        .search-form{
            margin-top:15px;
            float:right;
            margin-right:10px;
            margin-bottom:30px;
        }
        input[type==text]
        {
            padding:10px;
        }
        button{
            float:right;
            background:blue;
            border-radius:2px;
            position:relative;
            /* padding:5px; */
            border-color:blue;    
        }
        
        </style> -->
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
                        <a class="nav-link" href="supplier.php">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addmedicine.php">Add Medicine</a>
                    </li>
                   
                </ul> 
                </div>    
                <!-- </div> -->
              </nav>
<div class="container">
<div class="col-lg-12">   
    <br><br>
    <h1 class="text-warning text-center">Medicine</h1>
  
       
                <!-- <form class="search-form"> 
                    <input type="text" name="getname" id="name" placeholder="Search Medicine" onkeyup="searchfub()" required>
                    <button type="submit" name="search">Search</button>
                </form>
            -->
    <br> 

    <table class="table table-striped table-hover table-bordered" id="tab">
        <tr class="bg-dark text-white text-center">
            <th>Id</th>
            <th>MedicineName</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>MedicineType</th>
            <th>ManufactureDate</th>
            <th>ExpireDate</th>
            <th>Photo</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
       
                <?php
                include 'dbconn.php';
                $selectquery="select * from medicine ";
                $query=mysqli_query($con,$selectquery);
                    while($result=mysqli_fetch_array($query)){
                ?>

                        <tr>
                         
                            <td> <?php echo $result['mid']; ?></td>
                            <td> <?php echo $result['mname']; ?></td>
                            <td> <?php echo $result['price']; ?></td>
                            <td> <?php echo $result['mqty']; ?></td>
                            <td> <?php echo $result['mcate']; ?></td>
                            <td> <?php echo $result['mtype']; ?></td>
                            <td> <?php echo $result['mmfg']; ?></td>
                            <td> <?php echo $result['mexp']; ?></td>
                            <td><img src="<?php echo $result['mlink'];?>" width="100" height="50"></td>
                            <td> <button class="btn-primary btn"><a href="edit.php?mid=<?php echo $result['mid']; ?>" class="text-white">Edit</a> </button></td>
                            <td> <button class="btn-danger btn"><a href="delete.php?mid=<?php echo $result['mid']; ?>" class="text-white">Delete</a></button></td>
                        </tr>
                            
                    <?php
                        }
                    ?>
    </table>
</div>
</div> 
<script>
    const searchfun=()=>{
        let f=document.getElementById('name').value;
        let table=document.getElementById('tab');
        let tr=table.getElementByTagName('tr');
        for(var i=0;i<tr.length;i++)
        {
            let td=tr[i].getElementByTagName('td')[0];
            if(td){
                let textvalue=td.textContent || td.innerHTML;
                if(textvalue.indexOf(f)>-1){
                    tr[1].style.display="";
                }
                else{
                    tr[i].style.display="none";
                }
            }
        }
    }
    </script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
</body>
</html>

