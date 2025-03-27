
<?php
include '../includes/header.php';
include '../connect.php';
if(isset($_POST['insert_category'])){
    $category_title=$_POST['category_title'];
    //check if category exists
    $select="select * from `categories` where category_title='$category_title'";
    $result=mysqli_query($conn,$select);
    $num=mysqli_num_rows($result);
    if($num>0){
        echo "<script>alert('this category already exists')</script>";
    }
    //insert category
    else{
    $insert="insert into `categories` (category_title) values('$category_title')";
    $result=mysqli_query($conn,$insert);
    echo "<script>alert('category entered successfully')</script>";

}
}
?>

<h2 class="manage-details">Insert Details</h2>
    <div class="insert-category">
        <form method="post" action="">
            <button class="insert-icon-bt"><img src="../images/insert-icon.png" class="insert-icon"></button><input type="text" placeholder="insert category" name="category_title">
        <li><button  name="insert_category">Insert Category</button></li>
    </div>
        </form>
    
</body>
</html>