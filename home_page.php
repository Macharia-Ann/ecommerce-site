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
                    <?php

if(isset($_SESSION['username'])){
    echo "<li><a href='user_area/register.php'>My account</a></li>";
}
else{
    echo "<li><a href='user_area/register.php'>Register</a></li>";
   
}

?>
                    <li><a href="total_price.php">Total Price: <?php TotalCartPrices(); ?></a></li>
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


?>
<?php
if(isset($_SESSION['username'])){
    echo "<h3 class='welcome-guest'>Welcome ".$_SESSION['username']." </h3>";
}
else{
    echo "<h3 class='welcome-guest'>Welcome Guest</h3>"; 
   
}



?>
 
    <?php
if(isset($_SESSION['username'])){
    echo "<h3 class='login'><a href='user_area/logout.php'>Logout</a></h3></h3>";
 
   
}
else{
    echo "<h3 class='login'><a href='user_area/login.php'>Login</a></h3>"; 
   
}



?>

</div>
<h3 class="hidden-store">Pocket-Friendly Store</h3>

<p class="hidden-store-par">Communication is at the heart of e-commerce community</p>
       <!-- Product Listings -->
            <div class="product-container">
          <?php  
          
           searchProducts();
       getuniquebrands();
          getProducts();
          getuniquecategories();
          $ip = getIPAddress();  
          echo 'User Real IP Address - '.$ip;  
          AddToCart();
          CountCartItems();
          ?>

               

                <!-- Additional product cards here -->
            </div>
        </div>
       
    </div>
   <?php
include 'footer.php';
   ?>
</body>

</html>