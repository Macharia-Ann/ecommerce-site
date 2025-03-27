<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php
include '../connect.php';
include '../includes/functions.php';
session_start();

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
                <img src="../images/cart1.png" class="cart_logo" style='width:50px; margin-top:10px;'>
                    <li><a href="../home_page.php">Home</a></li>
                    <li><a href="../shop.html">Shop</a></li>
                    <li><a href="register.php">Account</a></li>
                    <li><a href="total_price.php">Total Price: <?php TotalCartPrices(); ?></a></li>
                    <a href="../cart.php"><img src="../images/cart2.jfif" class="cart" style='width:50px; margin-left:10px;'></a><sup style='margin-top:10px;color:white;'><?php echo CountCartItems(); ?></sup>
                    
                    <li class="search-bar">
                        <form action="search.php" method="GET" class="search">
                            <input type="text" name="search_data" placeholder="Search products...">
                            <button type="submit" name="search">Search</button>
                        </form>
                    </li>
                </ul>
            </nav>
<div class="welcome">
 
 
    <h3 class='welcome-guest'>Welcome Guest</h3><h3 class='login'> <a href='login.php'>Login</a></h3>

<?php
//get the user id


?>


</div>
<h3 class="hidden-store">Pocket-Friendly Store</h3>

<p class="hidden-store-par">Communication is at the heart of e-commerce community</p>


    
<?php

$user_ip=getIpAddress();

?>
<?php
//insert data into the orders table
if(isset($_GET['user_id'])){
    #get user id and ip
    $user_id=$_GET['user_id'];

}
$select_user="select * from `users` where user_ip='$user_ip'";
$result=mysqli_query($conn,$select_user);
$row_userid=mysqli_fetch_assoc($result);
$user_id=$row_userid['user_id'];
    
    $total_price=0;
    #invoice number
    $invoice=mt_rand();
    $order_status='pending';
    $subtotal=1;
    $qty=1;

    #get amount due and total products
$select_cart="select * from `cart` where ip_address='$user_ip'";
$result_cart=mysqli_query($conn,$select_cart);
$num_rows=mysqli_num_rows($result_cart);

#fetch product_id
while($row=mysqli_fetch_array($result_cart)){
    $product_id=$row['product_id'];
    $select_productid="select * from`products` where product_id=$product_id";
    $result_products=mysqli_query($conn,$select_productid);
    while($row_productprice=mysqli_fetch_array($result_products)){
        $product_price=array($row_productprice['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
        
    }
}
   #get quantity of products
   $select_qty="select * from `cart`";
   $result_qty=mysqli_query($conn,$select_qty);
   $row_qty=mysqli_fetch_assoc($result_qty);
   $qty=$row_qty['quantity'];
   if($qty==0){
       $qty=1;
       $subtotal=$total_price;
   }
   else{
       $qty=$qty;
       $subtotal=$qty*$total_price;
   }
   

$insert="insert into `orders` (user_id,amount_due,invoice_number,total_products,order_date,order_status) values($user_id,$subtotal,$invoice,$num_rows,NOW(),'$order_status')";
$result_insert=mysqli_query($conn,$insert);
if($result_insert){

    echo "<script>alert('order submitted')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}

//insert data to pending orders table
$insert_pending_orders="insert into `pending_orders` (user_id,invoice_number,product_id,quantity,order_status) values($user_id,$invoice,$product_id,$qty,'$order_status')";
$result_insert_pending=mysqli_query($conn,$insert_pending_orders);


//delete cart after submitting items to the orders table
$delete_cart="delete from cart where ip_address='$user_ip'";
$result_cart=mysqli_query($conn,$delete_cart);






?>


   
 <?php
include '../footer.php';
   ?>
</body>
</html>

