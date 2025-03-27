<?php
include 'header.php';
include '../connect.php';





?>
<h1 style='text-align:center; margin:15px;'>All Products</h1>

<form method="post" action="" enctype="multipart/form-data">
<table>
<?php
//display all products

    $select_products="select * from `products`";
    $result=mysqli_query($conn,$select_products);
    while($row=mysqli_fetch_assoc($result)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_image1=$row['product_image1'];

     

        $product_price=$row['product_price'];
        $product_id=$row['product_id'];
        $status=$row['status'];
        echo "<tbody>
    <tr>
        <td>$product_id</td>
        <td>$product_title</td>

        <td><img src='../images/$product_image1' style='width:60px;'></td>

        <td>$product_price/=</td>";
        ?>
      

        <td>
    
        <?php
$select_pending="select * from `pending_orders` where product_id=$product_id";
$result_select=mysqli_query($conn,$select_pending);
$count=mysqli_num_rows($result_select);
echo $count;

?>
        </td>

<?php
    echo "<td>$status</td>

        <td><button><a href='edit_products.php?edit_id=$product_id'>Edit</a></button></td>

        <td><button name='delete'><a href='delete_products.php?delete_id=$product_id'>Delete</a></button></td>

    </tr>
</tbody>";
    }



?>
<thead>
    <tr>
        <th>Product Id</th>
        <th>Product Title</th>
        <th>Product Image</th>
        <th>Product Price</th>
        <th>Total Sold</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>

</table>
</form>
