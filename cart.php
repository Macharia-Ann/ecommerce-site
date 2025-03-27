
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php
include 'connect.php';
include './includes/functions.php';
@session_start();

?>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        
        <!-- Sidebar -->
        <div class="sidebar">
            <h3>Categories</h3>
            <ul>
       <?php    
       getCategories(); 
       
        
       
       ?>    
            </ul>

            <h3>Brands</h3>
            <ul>
                <?php
getbrands();

                ?>
                
                
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content">
            <!-- Navbar -->
            <nav class="navbar">
                <ul>
                <img src="./images/cart1.png" class="cart_logo" style='width:50px; margin-top:10px;'>
                    <li><a href="home_page.php">Home</a></li>
                    <li><a href="shop.html">Shop</a></li>
                    <li><a href="user_area/register.php">Account</a></li>
                    
                    <a href="cart.php"><img src="./images/cart2.jfif" class="cart" style='width:50px; margin-left:10px;'></a><sup style='margin-top:10px;color:white;'><?php echo CountCartItems(); ?></sup>
                    
                    <li class="search-bar">
                        <form action="search.php" method="GET" class="search">
                            <input type="text" name="search_data" placeholder="Search products...">
                            <button type="submit" name="search">Search</button>
                        </form>
                    </li>
                </ul>
            </nav>
            <div class="welcome">
 
 <?php

if(!isset($_SESSION['username'])){
 echo "<h3 class='welcome-guest'>Welcome Guest</h3><h3 class='login'><a href='login.php'>Login</a></h3>";  
}
else{
    echo "<h3 class='welcome-guest'>Welcome ".$_SESSION['username']." </h3><h3 class='login'><a href='logout.php'>Logout</a></h3>";  
}
 ?>




</div>

<h3 class="hidden-store">Pocket-Friendly Store</h3>

<p class="hidden-store-par">Communication is at the heart of e-commerce community</p> 
<form method="post" action="">
<div class="table">
    <table>
    <thead>
    <?php
//fetching data from the database(cart table) to the cart file
global $conn;
$ip=getIPAddress();
$total_price=0;
$select_totalprice="select * from `cart` where ip_address='$ip'";
$result_totalprice=mysqli_query($conn,$select_totalprice);
$num=mysqli_num_rows($result_totalprice);
if($num>0){
echo "
<tr>
        <th><a href=''>Product Title</a></th>
        <th><a href=''>product Image</a></th>
        <th><a href=''>Quantity</a></th>
        <th><a href=''>Total price</a></th>
        <th><a href=''>Remove</a></th>
        <th><a href=''>Operations</a></th>
        
    </tr>
     ";

while($row=mysqli_fetch_array($result_totalprice)){

/*fetch the products*/
$product_id=$row['product_id'];
$select_products="select * from `products` where product_id=$product_id";
$result_products=mysqli_query($conn,$select_products);
while($row=mysqli_fetch_array($result_products)){

/*fetch product prices*/
$product_tableprice=$row['product_price'];
$product_title=$row['product_title'];
$product_image=$row['product_image1'];
$product_price=array($row['product_price']);
$product_values=array_sum($product_price);
$total_price+=$product_values;


?>
</thead>
<tbody>

    <tr>
        <td><a href=""><?php echo $product_title; ?></a></td>
        <td><img src="./images/<?php echo $product_image; ?>" class="form_image"></td>
        <td><input type="text" name="quantity"></td>
   
   

           



    
        <td><a href=""><?php echo $product_tableprice; ?></a></td>
        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id; ?>"></td>
   
        <td><button name="update_id">update cart</button></td><td><button name="remove_item">remove cart</button></td>
   
</tr>

<?php
 //delete an item from the cart

 if(isset($_POST['remove_item'])){
    foreach($_POST['removeitem'] as $product_id){
        $delete_query="delete from `cart` where product_id=$product_id";
        $result_deletequery=mysqli_query($conn,$delete_query);
       
        if($result_deletequery){
            echo "<script>window.open('home_page.php')</script>";
        }
    }
 }
    
   




?>

     <?php

//getting the total prices for the number of quantities entered
$ip=getIPAddress();
if(isset($_POST['update_id'])){
  
   $quantity=$_POST['quantity'];

   $update_query="update `cart` set quantity=$quantity where ip_address='$ip'";
   $result_update_query=mysqli_query($conn,$update_query);
   $total_price=$total_price * $quantity;
   echo $total_price;
   
}


    ?>
    </tbody>
<?php
   
}

}
}
else{
    echo "<h2 style='color:red;  font-weight:normal; padding:20px;'>cart is empty!</h2>";   
}

?>


 </div>    

</table>

<?php
$ip=getIPAddress();

$select_totalprice="select * from `cart` where ip_address='$ip'";
$result_totalprice=mysqli_query($conn,$select_totalprice);
$num=mysqli_num_rows($result_totalprice);
if($num>0){
echo "<h3 style='margin-top:15px; margin-left:20px; color: #2980b9;'>Subtotal: $total_price/-</h3>
    <button style='margin-top:15px; margin-left:20px;'><a href='home_page.php'>continue shopping</a></button><button style='background-color: black;'><a href=
    'user_area/checkout.php'>check out</a></button>
    ";
}
else{
    echo "<button style='margin-top:15px; margin-left:20px;'><a href='home_page.php'>continue shopping</a></button>";
}
 
?>



</form>   
       <!-- Product Listings -->
            <div class="product-container">
          <?php  
          
           searchProducts();
       getuniquebrands();
          
          getuniquecategories();
          $ip = getIPAddress();  
        
          AddToCart();
        
         
          
          ?>
          </div>
</div>
 

     
 <?php
include 'footer.php';
   ?>
</body>

</html>









































<?php



?>

