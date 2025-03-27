<?php
//display user details on the input bars
//check if user is logged in
if(!isset($_SESSION['username'])){
    echo "user is logged out";
}
$username=$_SESSION['username'];
$select_edit="select * from `users` where username='$username'";
$result_edit=mysqli_query($conn,$select_edit);

while($row=mysqli_fetch_assoc($result_edit)){
    $user_id=$row['user_id'];
    $username=$row['username'];
    $email=$row['user_email'];
    $place=$row['user_address'];
    $mobile=$row['user_mobile'];
echo "";



}
//now update the details
if(isset($_POST['update'])){
    $username=$_SESSION['username'];
    $update_id=$user_id;
    $username=$_POST['username'];
    $email=$_POST['email'];
    $place=$_POST['place'];
    $mobile=$_POST['contact'];
    $update_query="update `users` set username='$username',user_email='$email',user_address='$place',user_mobile='$mobile' where user_id=$update_id";
    $result=mysqli_query($conn,$update_query);
    if($result){
        echo "<script>alert('account updated successfully!')</script>";
    }
    
    }

?>


<h2 class="manage-details">Edit Account</h2>
<div class="insert_products">
    <form method="post" action="" enctype="multipart/form-data">
<div>
<label>username</label>
<input type="text" placeholder="Enter your username" name="username" value="<?php echo $username; ?>">
</div>

<div>
<label>Email</label>
<input type="email" placeholder="Enter your email" name="email" value="<?php echo $email; ?>">
</div>

<div>
<label>User image</label>
<input type="file" name="userimage">
</div>

<div>
<label>Place</label>
<input type="text" placeholder="Enter your place" name="place" value="<?php echo $place; ?>">
</div>

<div>
<label>Contact</label>
<input type="text" placeholder="Enter your contact" name="contact" value="<?php echo $mobile; ?>">
</div>

<div>
<button class="insert-product-bt" name="update">Update</button>

</div>

</div>
