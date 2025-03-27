<?php
// include 'connect.php';
@session_start();
function getProducts(){
    global $conn;
    if(!isset($_GET['brand_id'])){
      if(!isset($_GET['category_id'])){

      
$select="select * from `products` order by rand() limit 0,9";
$result=mysqli_query($conn,$select);
while($row=mysqli_fetch_assoc($result)){
    $product_id=$row['product_id'];
    $product_image1=$row['product_image1'];
    $product_title=$row['product_title'];
    $product_descript=$row['product_descript'];
    $product_price=$row['product_price'];

    echo "<div class='card1'>
                    <img src='./images/$product_image1' class='product-image'>
                    <h1 class='product-par'><b>$product_title</b></h1>
                    <p class='product-par'>$product_descript</p>
                    <p class='product-par'>Price: $product_price/-</p>
                    <button><a href='home_page.php?cart=$product_id'>Add to Cart</a></button>
                    <button><a href='view_more.php?view_more=$product_id'>View More</a></button>
                </div>";
}
}


    }
}
//fetching unique brands
function getuniquebrands(){
    global $conn;
    if(isset($_GET['brand_id'])){
    $brand_id=$_GET['brand_id'];   
    $select="select * from `products` where brand_id=$brand_id";
    $result=mysqli_query($conn,$select);
    $num=mysqli_num_rows($result);
    if($num>0){
    while($row=mysqli_fetch_assoc($result)){
        $product_id=$row['product_id'];
        $product_image1=$row['product_image1'];
        $product_title=$row['product_title'];
        $product_descript=$row['product_descript'];
        $product_price=$row['product_price'];
    
        echo "<div class='card1'>
                        <img src='./images/$product_image1' class='product-image'>
                        <h1 class='product-par'><b>  $product_title</b></h1>
                        <p class='product-par'>$product_descript</p>
                        <p class='product-par'>Price: $product_price/-</p>
                      <button><a href='home_page.php?cart=$product_id'>Add to Cart</a></button>
                    <button><a href='view_more.php?view_more=$product_id'>View More</a></button>
                </div>";
    }
    
    } 

    else{
        echo "<h2 style='color:red; text-align:center; font-weight:normal; padding:20px;'>This brand is empty</h2>";
    } 
}


}


//fetching unique categories
function getuniquecategories(){
    global $conn;
    if(isset($_GET['category_id'])){
        $cat_id=$_GET['category_id'];
        $select_cat="select * from `products` where category_id=$cat_id";
        $result_cat=mysqli_query($conn,$select_cat);
        $num=mysqli_num_rows($result_cat);
        if($num>0){
        while($row=mysqli_fetch_assoc($result_cat)){
            $product_id=$row['product_id'];
            $product_image1=$row['product_image1'];
            $product_title=$row['product_title'];
            $product_descript=$row['product_descript'];
            $product_price=$row['product_price'];
        
            echo "<div class='card1'>
                            <img src='./images/$product_image1' class='product-image'>
                            <h1 class='product-par'><b>  $product_title</b></h1>
                            <p class='product-par'>$product_descript</p>
                            <p class='product-par'>Price: $product_price/-</p>
                         <button><a href='home_page.php?cart=$product_id'>Add to Cart</a></button>
                    <button><a href='view_more.php?view_more=$product_id'>View More</a></button>
                </div>";
        }
        
        } 
    
        else{
            echo "<h2 style='color:red; text-align:center; font-weight:normal; padding:20px;'>This category is empty</h2>";
        } 
    }
    
    
    }
    
   

//function to fetch all brands from the db
function getbrands(){
    global $conn;
    $select_brand="select * from `brands`";
    $result=mysqli_query($conn,$select_brand);
    while($row=mysqli_fetch_assoc($result)){
        $brand_id=$row['brand_id'];
        $brand_title=$row['brand_title'];
        echo "<li><a href='home_page.php?brand_id=$brand_id'>$brand_title</a></li>";
    }


}
//function to fetch all categories from the db
function getCategories(){
    global $conn;
    $select_cat="select * from `categories`";
    $result=mysqli_query($conn,$select_cat);
    while($row=mysqli_fetch_assoc($result)){
        $cat_id=$row['category_id'];
        $cat_title=$row['category_title'];
        echo "<li><a href='home_page.php?category_id=$cat_id'>$cat_title</a></li>";
    }
}

//function to search for products

function searchProducts(){
    global $conn;
  
if(isset($_GET['search'])){
    $search_data=$_GET['search_data'];
      
$select_search="select * from `products` where product_keywords like '%$search_data%'";
$result=mysqli_query($conn,$select_search);
$num=mysqli_num_rows($result);
if($num>0){
while($row=mysqli_fetch_assoc($result)){
    $product_id=$row['product_id'];
    $product_image1=$row['product_image1'];
    $product_title=$row['product_title'];
    $product_descript=$row['product_descript'];
    $product_price=$row['product_price'];

    echo "<div class='card1'>
                    <img src='./images/$product_image1' class='product-image'>
                    <h1 class='product-par'><b>  $product_title</b></h1>
                    <p class='product-par'>$product_descript</p>
                    <p class='product-par'>Price: $product_price/-</p>
                     <button><a href='home_page.php?cart=$product_id'>Add to Cart</a></button>
                    <button><a href='view_more.php?view_more=$product_id'>View More</a></button>
                </div>";
}
}
else{
    echo "<h2 style='color:red; text-align:center; font-weight:normal; padding:20px;'>No results match for this product</h2>";
}
}
}

//a function to to view more about a product
function ViewMore(){
    global $conn;

if(isset($_GET['view_more'])){
$product_id=$_GET['view_more'];      
$select="select * from `products` where product_id=$product_id";
$result=mysqli_query($conn,$select);
while($row=mysqli_fetch_assoc($result)){
    $product_id=$row['product_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_title=$row['product_title'];
    $product_descript=$row['product_descript'];
    $product_price=$row['product_price'];


    
    echo "<div class='card1'>
                    <img src='./images/$product_image1' class='product-image'>
                    <h1 class='product-par'><b> $product_title</b></h1>
                    <p class='product-par'>$product_descript</p>
                    <p class='product-par'>Price: $product_price/-</p>
                     <button><a href='home_page.php?cart=$product_id'>Add to Cart</a></button>
                 <button><a href='home_page.php'>Home</a></button>
                </div>";
                       
    echo "<div class='card1'>
    <img src='./images/$product_image2' class='product-image'>
    <h1 class='product-par'><b> $product_title</b></h1>
    <p class='product-par'>$product_descript</p>
    <p class='product-par'>Price: $product_price/-</p>
    <button><a href='home_page.php?cart=$product_id'>Add to Cart</a></button>
                 <button><a href='home_page.php'>Home</a></button>
                </div>";

echo "<div class='card1'>
<img src='./images/$product_image3' class='product-image'>
<h1 class='product-par'><b> $product_title</b></h1>
<p class='product-par'>$product_descript</p>
<p class='product-par'>Price: $product_price/-</p>
 <button><a href='home_page.php?cart=$product_id'>Add to Cart</a></button>
                 <button><a href='home_page.php'>Home</a></button>
                </div>";
}
}


}   

function getIPAddress(){  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


//function to get items in a cart
function AddToCart(){
if(isset($_GET['cart'])){
    global $conn;
    $ip= getIPAddress();
 
    $product_id=$_GET['cart'];
    $select_cart="select * from `cart` where product_id=$product_id";
    $result=mysqli_query($conn,$select_cart);
    $num=mysqli_num_rows($result);
    if($num>0){
        echo "<script>alert('the product exists in the cart')</script>";
    }
 


else{
    $insert="insert into `cart` (product_id,ip_address,quantity) values ('$product_id','$ip','$quantity')";
    $result=mysqli_query($conn,$insert);
    echo "<script>alert('product inserted sucessfully in the cart')</script>";
}
}

}
// function to count the cart items the cart
function CountCartItems(){
    global $conn;
 $ip=getIPAddress();
 if(isset($_GET['cart'])){
    $product_id=$_GET['cart'];
    $select_items="select * from `cart` where ip_address='$ip'";
    $result_items=mysqli_query($conn,$select_items);
$num_of_items=mysqli_num_rows($result_items);
echo $num_of_items;
 }
 else{
    $select_items="select * from `cart` where ip_address='$ip'";
    $result_items=mysqli_query($conn,$select_items);
$num_of_items=mysqli_num_rows($result_items);
echo $num_of_items;  
 }

}

//function to total the prices of all items in the cart(subtotal)
function TotalCartPrices(){
    global $conn;
    $ip=getIPAddress();
$total_price=0;
$select_totalprice="select * from `cart` where ip_address='$ip'";
$result_totalprice=mysqli_query($conn,$select_totalprice);
while($row=mysqli_fetch_array($result_totalprice)){

    /*fetch the products*/
$product_id=$row['product_id'];
$select_products="select * from `products` where product_id=$product_id";
$result_products=mysqli_query($conn,$select_products);
while($row=mysqli_fetch_array($result_products)){
    
    /*fetch product prices*/
    $product_price=array($row['product_price']);
    $product_values=array_sum($product_price);
    $total_price+=$product_values;
}
}
echo $total_price;
}



?>    





