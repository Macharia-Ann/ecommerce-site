<?php
include 'header.php';
include '../connect.php';

?>
<table>
<thead>
    <tr>
        <th>SI NO</th>
        <th>brand Title</th>
        <th>Edit</th>
        <th>Delete</th>
</tr>
</thead>
<?php
$select_brands="select * from `brands`";
$result=mysqli_query($conn,$select_brands);

while($row=mysqli_fetch_assoc($result)){
    $brand_id=$row['brand_id'];
    $brand_title=$row['brand_title'];
    echo "<tbody>
    <tr>
        <td>$brand_id</td>
        <td>$brand_title</td>
    <td><button><a href='edit_brand.php=$brand_id'>Edit</a></button></td>

        <td><button name='delete'><a href='delete_brand.php=$brand_id'>Delete</a></button></td>

</tr>
</tbody>";
}

?>



</table>