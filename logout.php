<?php
    session_start();
    session_destroy();
    echo "<script>alert('Log Out Successful');</script>";
    echo "<script>location.href='adminlogin.php';</script>";
?>