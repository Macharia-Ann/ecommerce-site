<?php
include '../connect.php';

if(isset($_GET['delete_category'])){
    $delete_category=$_GET['delete_category'];
    $delete="delete from `categories` where category_id=$delete_category";
    $result_delete=mysqli_query($conn,$delete);
    if($result_delete){
        echo "<script>alert('deleted')</script>";
        echo "<script>window.open('view_categories.php','_self')</script>";
    }
}

?>