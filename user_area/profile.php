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
@session_start();

?>
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
<?php


if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page
    exit(); // Stop further execution
}
?> 
 
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

<div style='text-align:center; margin-top:3%; font-size:25px; font-weight:bold;'>

</div>

    <div class="profile">
        <div class="profile-title">
        
        <h3 class="profile-header">Your profile</h3>
  
<img src='../images/dp.png' class='profile-image'>

        <p class="profile-par"><a href="profile.php">Pending orders</a></p>
        <p class="profile-par"><a href="profile.php?edit-account">Edit account</a></p>
        <p class="profile-par"><a href="profile.php?my-orders">My orders</a></p>
        <p class="profile-par"><a href="profile.php?delete-account">Delete account</a></p>
        <p class="profile-par"><a href="logout.php">Logout</a></p>
</div>

<div class="profile-operations">
   
    <?php
    if(!isset($_GET['edit-account'])){
        if(!isset($_GET['my-orders'])){
            if(!isset($_GET['delete-account'])){
             //check if the user is logged in
             if(!isset($_SESSION['username'])){
                echo "you are logged out";

             }  
             $username=$_SESSION['username'];
             $select_pending="select * from `orders` where order_status='pending'";
             $result=mysqli_query($conn,$select_pending);
             $row=mysqli_fetch_assoc($result);
                $num_pending=mysqli_num_rows($result);
                if($num_pending>0){
                echo "<h3>You have <span style='color:red;'>$num_pending</span> pending orders</h3>";
                echo "<p class='profile-par2'><a href='profile.php?my-orders' style='color:black;'>My Orders</a>";
                }
                else{
                    echo "<h3>You have <span style='color:red;'>zero</span> pending orders</h3>";
                    echo "<p class='profile-par2'><a href='profile.php?my-orders' style='color:black;'>Explore Products</a>";  
                }
             } 
            }
        }
    
        //edit account
if(isset($_GET['edit-account'])){
    include 'edit_account.php';
}

//display my orders
if(isset($_GET['my-orders'])){
    include 'my_orders.php';
}

//delete account
if(isset($_GET['delete-account'])){
    include 'delete_account.php';
}
    ?>
</div>
</div>
  
<?php
include '../footer.php';
   ?>
   </body>
   </html>
    
    

  