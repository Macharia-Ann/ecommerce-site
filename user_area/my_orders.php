





<div class="table">

    <table>


<?php
//select all orders
$username=$_SESSION['username'];
$select_orders="select * from `orders`";
$result=mysqli_query($conn,$select_orders);
$num=mysqli_num_rows($result);
if($num>0){
    echo "<thead>
<tr>
    <th>SI No</th>
    <th>Total amount</th>
    <th>Invoice No</th>
    <th>Total Products</th>
    <th>Order Date</th>
    <th>Complete/Incomplete</th>
    <th>Order Status</th>
</tr>
</thead>";
while($row=mysqli_fetch_assoc($result)){
    $order_id=$row['order_id'];
    $amount_due=$row['amount_due'];
    $invoice=$row['invoice_number'];
    $total_products=$row['total_products'];
    $order_date=$row['order_date'];
    $order_status=$row['order_status'];
echo " <tbody>
<tr>
    <td>$order_id</td>
     <td>$amount_due</td>
    <td>$invoice</td>
    <td>$total_products</td>
    <td>$order_date</td>";

    ?>
    <?php
    if($order_status=='Complete'){
    echo "<td>Complete</td>";
    }
    else{
        echo "<td>Incomplete</td>";
   
    }
     ?>

     <?php

     if($order_status=='Complete'){
   echo "<td><a href='confirm.php?order_id=$order_id' style='color:blue;'>Paid</a></td>";
     }
     else{

   echo "<td><a href='confirm.php?order_id=$order_id' style='color:blue;'>Confirm</a></td>";

     }
   
  
     }}
     
else{
    echo "<h3>You have no orders yet</h3>
     </tr> 
   </tbody>";
}

     
?>  
<?php


?>
   


</table>
</div>
