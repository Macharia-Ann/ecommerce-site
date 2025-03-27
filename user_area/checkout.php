<?php
session_start();
//check if session is set
if(isset($_SESSION['username'])){
    include 'payment.php';
}
else{
   
    include 'login.php';

}
?>



