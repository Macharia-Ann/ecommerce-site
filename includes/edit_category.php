
<?php
include '../includes/header.php';
include '../connect.php';
// Fetch Category for Editing
if(isset($_POST['update_category'])){
    $category_id = $_POST['category_id'];
    $category_title = $_POST['category_title'];

    $update = "UPDATE `categories` SET category_title='$category_title' WHERE category_id=$category_id";
    $result_update = mysqli_query($conn, $update);

    if($result_update){
        echo "<script>alert('Category updated successfully!');</script>";
    } else {
        echo "<script>alert('Failed to update category!');</script>";
    }
}
?>

<h2 class="manage-details">Edit Categories</h2>

<div class="edit-category" Style='text-align:center;'>
    <?php
    // Fetch all categories from the database
    $query = "SELECT * FROM `categories`";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $category_id = $row['category_id'];
        $category_title = $row['category_title'];
    ?>
        <form method="post" action="">
            <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
            <input type="text" name="category_title" value="<?php echo $category_title; ?>">
            <button type="submit" name="update_category">Edit</button>
        </form>
    <?php
    }
    ?>
</div>
     
</body>
</html>