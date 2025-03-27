

<?php

include '../connect.php';
include '../includes/functions.php';
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

//check if register_user is set
if(isset($_POST['register_user'])){
    $username=$_POST['username'];

    $email=$_POST['email'];

    //password hashing
    $password=$_POST['password'];
    $password_hash=password_hash($password,PASSWORD_BCRYPT);

    $cpassword=$_POST['cpassword'];

    $address=$_POST['address'];

    $contact=$_POST['contact'];

    $user_ip=getIpAddress();

    #accessing image name
    $user_image=$_FILES['user_image']['name'];

    #accessing image temporary name
$user_image_tmp=$_FILES['user_image']['tmp_name'];

#move the image
move_uploaded_file($user_image_tmp,"../images/$user_image");

//check if the user already exists in the db
$select="select * from `users` where username='$username'";
$result=mysqli_query($conn,$select);
$count_num_rows=mysqli_num_rows($result);
if($count_num_rows>0){
    echo "<script>alert('username already exists!')</script>";

}
elseif($password !=$cpassword) {
    #check for password match
    echo "<script>alert('passwords do not match!')</script>";

    
}


#insert data into the database
else{
        $insert="insert into `users` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values('$username','$email','$password_hash','$user_image','$user_ip','$address','$contact')";
        $result_insert=mysqli_query($conn,$insert);
    }

  #check if cart has items ans redirect the user to checkout page
  $select_cart="select * from `cart` where ip_address='$user_ip'";
  $result_cart=mysqli_query($conn,$select_cart);
  $num_cart=mysqli_num_rows($result_cart);
  if($num_cart){
    $_SESSION['username']=$username;
     echo "<script>alert('you have items in the cart!')</script>";
     echo "<script>window.open('checkout.php','_self')</script>";
 
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
<label>Email</label>
<input type="text" placeholder="Enter your email" name="email">
</div>

<div>
<label>User Image </label>
<input type="file" name="user_image">
</div>

<div>
<label>Password</label>
<input type="password" name="password" placeholder="Enter your password">
</div>

<div>
<label>Confirm Password</label>
<input type="password" name="cpassword" placeholder="Confirm your password">
</div>

<div>
<label>Address</label>
<input type="text" name="address" placeholder="Enter your address">
</div>

<div>
<label>Contact</label>
<input type="text" name="contact" placeholder="Enter your contact">
</div>




<div>
<button class="insert-product-bt" name="register_user">Register</button>

</div>
<p>Already have an account? <a href="login.php" style='color:red; text-decoration:none;'>Login</a></p>

    </form>
</div>
<?php
include '../footer.php';
   ?>
