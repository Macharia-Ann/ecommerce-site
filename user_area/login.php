

<?php

include '../connect.php';
include '../includes/functions.php';
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
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
    <?php
  //check if login_user is set
if(isset($_POST['login_user'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $select="select * from `users` where username='$username'";
    $result=mysqli_query($conn,$select);
    $num_rows=mysqli_num_rows($result);
    #fetch the password from the database
    $row=mysqli_fetch_assoc($result);
    $user_ip=getIpAddress();

        #check if there are any items in the cart
        $select_cart="select * from `cart` where ip_address='$user_ip'";
        $result_cart=mysqli_query($conn,$select_cart);
        $num=mysqli_num_rows($result_cart);


    if($num_rows==0 and $num==0){
        echo "<script>alert('Invalid username!')</script>";
     }

    elseif(!password_verify($password,$row['user_password'])){
        echo "<script>alert('Invalid password!')</script>";
    }

    else{
        $_SESSION['username']=$username;
        echo "<script>alert('logged in successfully!')</script>";
        echo "<script>window.open('payment.php','_self')</script>";
    }


}




?>

<h2 class="manage-details">User Registration</h2>
<div class="insert_products">
    <form method="post" action="" enctype="multipart/form-data">
<div>
<label>Username</label>
<input type="text" placeholder="Enter username" name="username">
</div>

<div>
<label>Password</label>
<input type="password" name="password" placeholder="Enter your password">
</div>




<div>
<button class="insert-product-bt" name="login_user">Login</button>

</div>
<p style='margin-bottom:100%;'>Don't have an account? <a href="register.php" style='color:red; text-decoration:none;'>Register</a></p>

    </form>
</div>  
<?php
include '../footer.php';
   ?>
</body>
</html>

