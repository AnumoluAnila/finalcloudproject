<?php
     include 'dbconn.php';     
     if(isset($_POST['action'])){
         $sql="select * from medicine where mcate !=''";

         if(isset($_POST['mcate'])){
             $mcate=implode("','",$_POST['mcate']);
             $sql.="AND mcate IN('".$mcate."')";
         }

         $result=mysqli_query($con,$sql);
         $output='';
         $a=mysqli_num_rows($result);
         if($a>0)
         {
            while($row=mysqli_fetch_assoc($result)){
                $output .='  <div class="col-md-3">
                <div class="card" style="width: 15rem; height:22rem">
                <img src="' .$row['mlink'].'"  height="180px" class="card-img-top">
                    <div class="card-body">
                        
                        <p class="card-title" style=" height:5rem">' .$row['mname'].'</p>
                        <p class="card-text text-danger">Rs '.$row['price'].'
                        <!-- <button type="submit" class="btn btn-primary btn-sm float-right">Add to cart</button> -->
                        <a href="#" class="btn btn-primary btn-sm float-right">Add to cart</a>
                        </p>
                    </div>
                </div>

            </div>';
            }
         }
         else{
            $output="<h3>NO Products Found!</h3>" ;
         }
         echo $output;
     }
?>