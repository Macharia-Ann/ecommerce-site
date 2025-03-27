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
<?php
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
$username=$_SESSION['username'];
$select_orders="select * from `orders` where order_id=$order_id";
$result_orders=mysqli_query($conn,$select_orders);
$row_orders=mysqli_fetch_assoc($result_orders);
$invoice=$row_orders['invoice_number'];
$amount_due=$row_orders['amount_due'];
echo "";

}

//insert data into the database
if(isset($_POST['confirm_payment'])){
 
    $invoice=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    
    $insert_query="insert into `payments` (invoice_number,amount,payment_mode) values($invoice,$amount,'$payment_mode')";
    $result_insert=mysqli_query($conn,$insert_query);
    if($result_insert){
        echo "<script>alert('you have made your payment')</script>";
        echo "<script>window.open('profile.php','_self')</script>";
    }

    }
    $update_orders="update `orders` set order_status='Complete'";
$result=mysqli_query($conn,$update_orders);



?>

<form method="post" action="" class="form">
<h2 class="confirm_payment_header">Confirm Payment</h2>
<div>
    <label>Invoice Number</label>
<input type="text" name="invoice_number" value="<?php echo $invoice; ?>">
</div>

<div>
    <label>Amount</label>
<input type="text" name="amount" value="<?php echo $amount_due; ?>">
</div>

<div>
    <select name="payment_mode">
    <option>--select a payment method--</option>
        <option>Mpesa</option>
        <option>Cash on Delivery</option>
        <option>Paypal</option>
        <option>UPI</option>
        <option>Payoffline</option>

</select>
</div>

<div>
<button name="confirm_payment" class="confirm">Confirm</button>
</div>
</form>


<?php
include '../footer.php';
   ?>

</body>
</html>