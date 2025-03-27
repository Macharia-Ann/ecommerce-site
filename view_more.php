
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php
include 'connect.php';
include './includes/functions.php';


?>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        
        <!-- Sidebar -->
        <div class="sidebar">
            <h3>Categories</h3>
            <ul>
       <?php    
       getCategories(); 
       
        
       
       ?>    
            </ul>

            <h3>Brands</h3>
            <ul>
                <?php
getbrands();

                ?>
                
                
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content">
            <!-- Navbar -->
            <nav class="navbar">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="shop.html">Shop</a></li>
                    <li><a href="cart.html">Cart</a></li>
                    <li><a href="account.html">Account</a></li>
                    <li>
                        <form action="search.php" method="GET" class="search">
                            <input type="text" name="search_data" placeholder="Search products...">
                            <button type="submit" name="search">Search</button>
                        </form>
                    </li>
                </ul>
            </nav>
       <!-- Product Listings -->
            <div class="product-container">
          <?php  
          
           searchProducts();
       getuniquebrands();
          ViewMore();
          getuniquecategories();
          ?>

               

                <!-- Additional product cards here -->
            </div>
        </div>
    </div>
</body>
</html>