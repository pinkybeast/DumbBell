<?php
    include_once('./config/config.php');
    session_start();

    if(isset($_SESSION['customer_id'])){
        $customer_id = $_SESSION['customer_id'];
    }

    if(isset($customer_id)){
        $sql_select_wishlist_count = mysqli_query($conn, "SELECT * from wishlist WHERE customer_id = '$customer_id'") or die('Query Failed');
        $wishlist_num_rows = mysqli_num_rows($sql_select_wishlist_count);
        $sql_select_cart_count = mysqli_query($conn, "SELECT * from cart WHERE customer_id = '$customer_id'") or die('Query Failed');
        $cart_num_rows = mysqli_num_rows($sql_select_cart_count);
    }

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
    <div class="flex-top">
        <a href="home.php" class="logo"><img src="images/logo.png" alt="logo"></a>
        <nav class="navbar">
            <ul>
                <li><a href="search_page.php">Search</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="custom.php">Message</a></li>
                <li><a href="about.php">About</a></li>
                <?php
                    if(!isset($customer_id)){
                ?>
                <li><a href="#">Account <i class="fa-solid fa-caret-down"></i></a>
                    <ul>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    </ul>
                </li>
                <?php
                    }
                ?>
            </ul>
        </nav>
        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
        </div>  
        <div class="icons">
            <div id="customer-btn" class="fas fa-user"></div>
            <a href="wishlist.php"><i class="fa fa-heart"></i><span>(<?php 
            if(isset($customer_id)) echo $wishlist_num_rows; else echo '0'; ?>)</span></a>
            <a href="cart.php"><i class="fa fa-shopping-cart"></i><span>(<?php 
            if(isset($customer_id)) echo $cart_num_rows; else echo '0'; ?>)</span></a>
        </div>
    </div>

    <?php
            if(isset($customer_id)){
                echo '<div class="account-box">
                    <p>username: <span>'.$_SESSION['customer_name'].'</span></p>
                    <p>email: <span>'.$_SESSION['customer_email'].'</span></p>
                    <a href="./logout.php" class="delete-btn">logout</a>
                </div>';
            } else {
                echo '<div class="account-box">
                        <p>username: <span>Guest</span></p>
                        <p>email: <span>Guest</span></p>
                    </div>';
            }
        ?>
</header>