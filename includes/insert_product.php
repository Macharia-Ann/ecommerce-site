

<?php
    include 'header.php';
    include '../connect.php';
if(isset($_POST['insert_product'])){


    $title=$_POST['product_title'];
    $descript=$_POST['product_descript'];
    $keywords=$_POST['product_keywords'];
    $category_id=$_POST['select_category'];
    $brand_id=$_POST['select_brand'];
   
    //accessing image name
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
    //accessing image temporary name
    $product_image1_tmp=$_FILES['product_image1']['tmp_name'];
    $product_image2_tmp=$_FILES['product_image2']['tmp_name'];
    $product_image3_tmp=$_FILES['product_image3']['tmp_name'];
    //move the images
    move_uploaded_file($product_image1_tmp,"../images/$product_image1");
move_uploaded_file($product_image2_tmp,"../images/$product_image2");
move_uploaded_file($product_image3_tmp,"../images/$product_image3");

$price=$_POST['product_price'];
$status='true';
//insert into database
$insert_products="insert into `products` (product_title,product_descript,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) values ('$title','$descript','$keywords','$category_id','$brand_id','$product_image1','$product_image2','$product_image3','$price',NOW(),'$status')";
$result=mysqli_query($conn,$insert_products);
if($result){
    echo "<script>alert('product inserted successfully')</script>";
}

 


}


?>
<h2 class="manage-details">Insert Products</h2>
<div class="insert_products">
    <form method="post" action="" enctype="multipart/form-data">
<div>
<label>Product Title</label>
<input type="text" placeholder="Enter product title" name="product_title">
</div>

<div>
<label>Product Description</label>
<input type="text" placeholder="Enter product description" name="product_descript">
</div>

<div>
<label>Product Keywords</label>
<input type="text" placeholder="Enter product keywords" name="product_keywords">
</div>

<div>
<select name="select_category">
<option value="select_category">--Select Category--</option>

<?php
$select_cat="select * from `categories`";
$result=mysqli_query($conn,$select_cat);
while($row=mysqli_fetch_assoc($result)){
    $cat_id=$row['category_id'];
    $cat_title=$row['category_title'];
    echo "<option value='$cat_id'>$cat_title</option>";

}
?>


</select>
</div>

<div>
<select name="select_brand">
    <option value="select_brand">--Select Brand--</option>
    
  <?php   
  $select_brands="select * from `brands`";
  $result=mysqli_query($conn,$select_brands);
  while($row=mysqli_fetch_assoc($result)){
    $brand_id=$row['brand_id'];
    $brand_title=$row['brand_title'];
    echo "<option value='$brand_id'>$brand_title</option>";
  }
  ?>
  </select>
</div>

<div>
<label>Product Image1</label>
<input type="file" name="product_image1">
</div>

<div>
<label>Product Image2</label>
<input type="file" name="product_image2">
</div>

<div>
<label>Product Image3</label>
<input type="file" name="product_image3">
</div>

<div>
<label>Product Price</label>
<input type="text" placeholder="Enter product price" name="product_price">
</div>


<div>
<button class="insert-product-bt" name="insert_product">Insert Product</button>

</div>

    </form>
</div>

