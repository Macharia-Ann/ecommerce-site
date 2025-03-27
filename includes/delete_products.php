<?php
include 'header.php';
include '../connect.php';

if(isset($_GET['delete_id'])){
    $delete_id=$_GET['delete_id'];
    $delete_query="delete from `products` where product_id=$delete_id";
    $result=mysqli_query($conn,$delete_query);
    echo "<script>alert('product deleted successfully!')</script>";
}

?>