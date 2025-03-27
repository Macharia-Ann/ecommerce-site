<?php

session_start();
session_unset();
session_destroy();
echo "<script>alert('you logged out')</script>";
echo "<script>window.open('login.php','_self')</script>";
?>









