<?php
    include 'dbconn.php';
    $output='';

    if(isset($_POST['query'])){
        $search=$_POST['query'];
        $stmt=$con->prepare("SELECT * FROM medicine WHERE mname LIKE CONCAT('%',?,'%')");
        $stmt->bind_param("s",$search);
    }
    else{
        $stmt=$con->prepare("select * from medicine");
        $mcate=array();
         if(isset($_POST['mcate'])){
          //  $mcate=implode("','",$_POST['mcate'])
             $mcate=$_POST['mcate'];
             
         }else{
          $selectquery="select distinct mcate from medicine order by mcate";
          $query=mysqli_query($con,$selectquery);
          while($result=mysqli_fetch_array($query)){
            array_push($mcate,$result['mcate']);


          }
          // $mtype=implode("','",$mcate1);




        }
         $mtype1=array();
         if(isset($_POST['mtype'])){
          $mtype1=$_POST['mtype'];
          $mtype=implode("','",$_POST['mtype']);
        }else{
          $selectquery="select distinct mtype from medicine order by mtype";
          $query=mysqli_query($con,$selectquery);
          while($result=mysqli_fetch_array($query)){
            array_push($mtype1,$result['mtype']);


          }
          $mtype=implode("','",$mtype1);




        }
         $output='';
        
       $finoutput="";


         if(1)
         {
            foreach ($mcate as $cate) {
              
            
               
                        
                           
                             $d=$cate;
                           
                             $selectquery2="select * from medicine where mcate='$d' and mtype IN ('$mtype')";
                             $output1="";
                            //  echo $selectquery;
                             $query=mysqli_query($con,$selectquery2) or die( mysqli_error($con));
                             $flag=0;
                             while($result=mysqli_fetch_assoc($query)){
                             
                              if($result['mqty']>0){

                                if($flag==0){

                                  $output ='<div class="card  mt-4 mx-4">
                                  <div class="card-header"><h5 class="text-center" id="textchange">'.$cate.'</h5></div>
                                 
                                  <div class="card-body">
                                 
                                      <div class="row" >';
                                        $flag=1;
                                   }








                       $output1.= '<div class="col-3">
                       <form method="POST">
                            <div class="card mt-3 " style="width: 15rem; height:22rem">
                            <img src="'. $result['mlink'].'"  height="180px" class="card-img-top px-4 py-4">
                                <div class="card-body">
                                   
                                    <p class="card-title " style=" height:5rem">'.$result['mname'].'</p>
                                    <p class="card-text text-danger">Rs '.$result['price'].'
                                    <button type="submit" name="addtocart" class="btn btn-primary btn-sm float-right">Add to cart</button> 
                                    
                                    <input type="text" name="name" style="display:none" value="'. $result['mid'].'">
                                    </p>
                                </div>
                            </div>
                            </form>
                        </div>';
                              }
                             }
                        if($flag==1){
                    $output3= '
                    </div>
                    </div>
                  </div> ';
    }
    $stmt->execute();
    $result=$stmt->get_result();