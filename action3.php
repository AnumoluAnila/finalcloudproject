<?php
    include 'dbconn.php';
    $output='';

    if(isset($_POST['query'])){
        $search=$_POST['query'];
        $stmt=$con->prepare("SELECT * FROM orders WHERE cemail LIKE CONCAT('%',?,'%')");
        $stmt->bind_param("s",$search);
    }else{
        $stmt=$con->prepare("SELECT * FROM orders");
    }
    $stmt->execute();
    $result=$stmt->get_result();
    if($result->num_rows>0)
    {
        $output="<tr class='bg-secondary text-white text-center'>
                    <th>Customer Email</td>
                    <th>MedicineImg</th>
                    <th>MedicineName</th>
                    <th>Category</th>
                    <th>MedicineType</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>ordered date</th>
                </tr>";
                while($row=$result->fetch_assoc()){
                            $a=$row['mid'];
                        
                            $selectquery1="select * from medicine where mid='$a'";
                            
                            $query1=mysqli_query($con,$selectquery1);
                            $result1=mysqli_fetch_array($query1);
                            $numrows=mysqli_num_rows($query1);
                            if($numrows){
                            $q=$row['qty'];
                            $p=$result1['price'];
                            $t=$q*$p;
                    $output .="
                    <tr> 
                    <td>".$row['cemail']."</td>
                        <td><img src=".$result1['mlink']." width='100' height='50'></td>  
                        <td>".$result1['mname']."</td>
                        <td>".$result1['mcate']." </td>
                        <td>".$result1['mtype']."</td>
                        <td >".$t."</td>
                        <td>".$row['qty']."</td>
                        <td >".$row['date']."</td>
                    </tr>";
                }
            }
        echo $output;
    }
    else{
        echo "<h3 class='text-center text-danger'>No Customer with Such Name</h3>";
    }
?>