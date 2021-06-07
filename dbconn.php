<?php
    $servername="localhost";
    $username="root";
    $password="anila";
    $dbname="cloudproject";

    $con=mysqli_connect($servername,$username,$password,$dbname);

    if(mysqli_connect_error()){
        echo "Failed to connect";
        exit();
    }
?>