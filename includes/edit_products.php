<?php
include 'header.php';
include '../connect.php';




?>
<?php
//display items on the input bars
if(isset($_GET['edit_id'])){
  $edit_id=$_GET['edit_id'];
$select_products="select * from `products` where product_id=$edit_id";
$result=mysqli_query($conn,$select_products);
$row=mysqli_fetch_assoc($result);
$product_id=$row['product_id'];
$product_title=$row['product_title'];
$product_descript=$row['product_descript'];
$product_keywords=$row['product_keywords'];
$product_image1=$row['product_image1'];
$product_image2=$row['product_image2'];
$product_image3=$row['product_image3'];
$product_price=$row['product_price'];
$category_id=$row['category_id'];
$brand_id=$row['brand_id'];
echo "";
}


?>
<h2 class="manage-details">Edit Product</h2>
<div class="insert_products">
    <form method="post" action="" enctype="multipart/form-data">
<div>
<label>Product Title</label>
<input type="text" placeholder="Enter product title" name="product_title" value="<?php  echo $product_title ?>" >
</div>

<div>
<label>Product Description</label>
<input type="text" placeholder="Enter product description" name="product_descript" value="<?php  echo $product_descript ?>">
</div>

<div>
<label>Product Keywords</label>
<input type="text" placeholder="Enter product keywords" name="product_keywords" value="<?php  echo $product_keywords ?>">
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
<input type="text" placeholder="Enter product price" name="product_price" value="<?php  echo $product_price ?>">
</div>


<div>

<button name="edit_products"><a href='edit_products.php?edit_id=<?php echo $product_id?>'>Update Product</a></button>
<?php
if(isset($_POST['edit_products'])){
  $edit_products=$_POST['edit_products'];
  $product_title=$_POST['product_title'];
  $product_descript=$_POST['product_descript'];
  $product_keywords=$_POST['product_keywords'];
  $select_category=$_POST['select_category'];
$select_brand=$_POST['select_brand'];
$product_image1=$_FILES['product_image1']['name'];
$product_image2=$_FILES['product_image2']['name'];
$product_image3=$_FILES['product_image3']['name'];

$product_image1_tmp=$_FILES['product_image1']['tmp_name'];
$product_image2_tmp=$_FILES['product_image2']['tmp_name'];
$product_image3_tmp=$_FILES['product_image3']['tmp_name'];

move_uploaded_file($product_image1_tmp,"../images/product_image1");
move_uploaded_file($product_image2_tmp,"../images/product_image2");
move_uploaded_file($product_image3_tmp,"../images/product_image3");
$product_price=$_POST['product_price'];
$update_query="update `products` set product_title='$product_title',product_descript='$product_descript',product_keywords='$product_keywords',category_id='$select_category',brand_id='$select_brand',
product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',product_price='$product_price' where product_id=$edit_id";
$result_update=mysqli_query($conn,$update_query);
echo "<script>alert('product updated succefully!')</script>";





}

?>
</div>

    </form>
</div>
