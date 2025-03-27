<?php
include '../includes/header.php';


include '../connect.php';
if(isset($_POST['insert_brand'])){
    $brand_title=$_POST['brand_title'];
    //check if the brand exists in the database
    $select= "select * from `brands` where brand_title='$brand_title'";
    $result=mysqli_query($conn,$select);
    $num=mysqli_num_rows($result);
    if($num>0){
        echo "<script>alert('this brand already exists')</script>";
    }
    //insert brand in the database
    else{
        $insert="insert into `brands` (brand_title) values ('$brand_title')";
        $result=mysqli_query($conn,$insert);

        echo "<script>alert('brand entered successfully')</script>";
    }
}


?>

<h2 class="manage-details">Insert Details</h2>
    <div class="insert-category">
        <form method="post" action="">
            <button><img src="../images/insert-icon.png" class="insert-icon"></button><input type="text" placeholder="insert Brand" name="brand_title">
        <li><button class="insert-bt" name="insert_brand">Insert Brand</button></li>
    </div>
        </form>
    
</body>
</html>