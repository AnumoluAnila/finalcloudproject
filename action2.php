<?php
    include 'dbconn.php';
    $output='';

    if(isset($_POST['query'])){
        $search=$_POST['query'];
        $stmt=$con->prepare("SELECT * FROM medicine WHERE mname LIKE CONCAT('%',?,'%')");
        $stmt->bind_param("s",$search);
    }
    else{
        $stmt=$con->prepare("SELECT * FROM medicine");
    }
    $stmt->execute();
    $result=$stmt->get_result();

    if($result->num_rows>0)
    {
        $output="<tr class='bg-dark text-white text-center'>
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
                </tr>";
                while($row=$result->fetch_assoc()){
                    $output .="
                         <tr>
                         
                            <td>". $row['mid']."</td>
                            <td>". $row['mname']."</td>
                            <td>". $row['price']."</td>
                            <td>". $row['mqty']."</td>
                            <td>". $row['mcate']."</td>
                            <td>". $row['mtype']."</td>
                            <td>". $row['mmfg']."</td>
                            <td>". $row['mexp']."</td>
                            <td><img src=".$row['mlink']." width='100' height='50'></td>
                            <td> <button class='btn-primary btn'><a href='edit.php?mid=".$row['mid']."' class='text-white'>Edit</a></button></td>
                            <td> <button class='btn-danger btn'><a href='delete.php?mid=".$row['mid']."' class='text-white'>Delete</a></button></td>
                        </tr>";
                }
                echo $output;
    }
    else{
        echo "<h3 class='text-center text-danger'>No Medicine Found</h3>";
    }

?>    