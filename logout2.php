<?php
    session_start();
    session_destroy();
    echo "<script>alert('Log Out Successful');</script>";
    echo "<script>location.href='login.html';</script>";
?>