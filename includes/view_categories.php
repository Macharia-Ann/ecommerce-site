<?php
include 'header.php';
include '../connect.php';

?>
<table>
<thead>
    <tr>
        <th>SI NO</th>
        <th>Category Title</th>
        <th>Edit</th>
        <th>Delete</th>
</tr>
</thead>
<?php
$select_categories="select * from `categories`";
$result=mysqli_query($conn,$select_categories);

while($row=mysqli_fetch_assoc($result)){
    $category_id=$row['category_id'];
    $category_title=$row['category_title'];
    echo "<tbody>
    <tr>
        <td>$category_id</td>
        <td>$category_title</td>
    <td><button><a href='edit_category.php?edit_category=$category_id'>Edit</a></button></td>

        <td><button name='delete'><a href='delete_category.php?delete_category=$category_id'>Delete</a></button></td>
    


</tr>
</tbody>";
}

?>



</table>