<?php
    if(isset($message)){
        foreach($message as $message){
            echo '<div class="message">
                <span>'.$message.'</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>';
        }
    }
?>

<header class="header">
    
    <div class="flex">
        <a href="index.php" class="logo"> DumbBell</a>        
    </div>

    <div class="flex-top">
        <div id="search-btn"><a href="search_page.php"><i class="fas fa-search"></i> search</a></div>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="custom.php">Message</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="#">Account <i class="fa-solid fa-caret-down"></i></a>
                    <ul>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
        </div>  
        <div class="icons">
            <div id="customer-btn" class="fas fa-user"></div>

            <?php
                $sql_select_wishlist_count = mysqli_query($conn, "SELECT * from wishlist WHERE customer_id = '$customer_id'") or die('Query Failed');
                $wishlist_num_rows = mysqli_num_rows($sql_select_wishlist_count);
            ?>
            <a href="wishlist.php"><i class="fa fa-heart"></i><span>(<?php echo $wishlist_num_rows; ?>)</span></a>

            <?php
                $sql_select_cart_count = mysqli_query($conn, "SELECT * from cart WHERE customer_id = '$customer_id'") or die('Query Failed');
                $cart_num_rows = mysqli_num_rows($sql_select_cart_count);
            ?>
            <a href="cart.php"><i class="fa fa-shopping-cart"></i><span>(<?php echo $cart_num_rows; ?>)</span></a>
        </div>
    </div>

    <div class="account-box">
        <p>username: <span><?php echo $_SESSION['customer_name']; ?></span></p>
        <p>email: <span><?php echo $_SESSION['customer_email']; ?></span></p>
        <a href="./logout.php" class="delete-btn">logout</a>
    </div> 
</header>