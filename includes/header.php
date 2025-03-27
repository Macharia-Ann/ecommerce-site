<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php
include '../connect.php';


?>
    <div class="welcome-admin">
        <img src="../images/cart1.png" class="admin-cart-image">
        <h2 class="welcome-admin-header">Welcome Admin</h2>
    </div>
    <h2 class="manage-details">Manage Details</h2>
    <div class="buttons">
<div>
    <img src="../images/dp.png" class="admin-image">
    <p class="admin-image-par">Admin</p>

</div>
<div class="button-operations">
    <ul>
        <li><button><a href="insert_product.php?insert_products">Insert Products</a></button></li>
        <li><button><a href="view_products.php?view_products">View Products</a></button></li>
        <li><button><a href="insert_categories.php?insert_categories">Insert Categories</a></button></li>
        <li><button><a href="view_categories.php?view_categories">View Categories</a></button></li>
        <li><button><a href="insert_brands.php?insert_brands">Insert brands</a></button></li>
        <li><button><a href="view_brands.php?view_brands">View brands</a></button></li>
        <li><button><a href="">All Orders</a></button></li>
        <li><button><a href="">All Payments</a></button></li>
        <li><button><a href="">List Users</a></button></li>
        <li><button class="logout"><a href="../user_area/logout.php">Logout</a></button></li>


    </ul>
</div>
    </div>

    <?php


    ?>


