


<?php
$username=$_SESSION['username'];
//delete user
if(isset($_POST['delete'])){
    $delete_query="delete from `users` where username='$username'";
    $result=mysqli_query($conn,$delete_query);
    echo "<script>alert('user deleted successfully!')</script>";
    echo "<script>window.open('../home_page.php','_self')</script>";

}
//cancel button
if(isset($_POST['cancel'])){
    echo "<script>window.open('profile.php','_self')</script>";
     }


?>
<form method="post" action="">
<div class="delete-buttons">
    <button type='submit' name='delete' style='width:400px; font-size:27px;'>Delete Account</button><br>
    <button type='submit' name='cancel' style='width:400px; font-size:27px;'>Cancel</button>
</div>
    </form>