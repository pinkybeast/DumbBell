<?php
    include_once('./config/config.php');
    include_once('./header.php');

    if(isset($_POST['add_to_wishlist'])){
        if (!isset($_SESSION['customer_id'])) {
            header('Location: login.php');
            exit();
        }

        $customer_id = $_SESSION['customer_id'];
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_category = $_POST['product_category'];
        $product_image = $_POST['product_image'];

        $sql_check_wishlist_num = mysqli_query($conn, "SELECT * FROM wishlist WHERE customer_id = '$customer_id' AND name = '$product_name'") or die('Query Failed');
        $sql_check_cart_num = mysqli_query($conn, "SELECT * FROM cart WHERE customer_id = '$customer_id' AND name = '$product_name'") or die('Query Failed');

        if(mysqli_num_rows($sql_check_wishlist_num) > 0){
            $message[] = 'Product already added to wishlist';
        }
        else if(mysqli_num_rows($sql_check_cart_num) > 0){
            $message[] = 'Product already added to cart';
        }
        else{
            mysqli_query($conn, "INSERT INTO wishlist(customer_id, pid, name, price, category, image) VALUES('$customer_id', '$product_id', '$product_name', '$product_price',  '$product_category', '$product_image')") or die('Query Failed');
            $message[] = 'Added product to wishlist successfully!';
        }
    }

    if(isset($_POST['add_to_cart'])){
        if (!isset($_SESSION['customer_id'])) {
            header('Location: login.php');
            exit();
        }

        $customer_id = $_SESSION['customer_id'];
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_category = $_POST['product_category'];
        $product_quantity = $_POST['product_quantity'];
        $product_image = $_POST['product_image'];

        $sql_check_cart_num = mysqli_query($conn, "SELECT * FROM cart WHERE customer_id = '$customer_id' AND name = '$product_name'") or die('Query Failed');

        if(mysqli_num_rows($sql_check_cart_num) > 0){
            $message[] = 'Product already added to cart';
        }
        else{
            $sql_check_wishlist_num = mysqli_query($conn, "SELECT * FROM wishlist WHERE customer_id = '$customer_id' AND name = '$product_name'") or die('Query Failed');

            if(mysqli_num_rows($sql_check_wishlist_num) > 0){
                mysqli_query($conn, "DELETE FROM wishlist WHERE customer_id = '$customer_id' AND name = '$product_name'") or die('Query Failed');
            }
            mysqli_query($conn, "INSERT INTO cart(customer_id, pid, name, price, category, quantity, image) VALUES('$customer_id', '$product_id', '$product_name', '$product_price', '$product_category', '$product_quantity', '$product_image')") or die('Query Failed');
            $message[] = 'Added product to cart successfully!';
        }
    }

    if(isset($_GET['pid'])){
        $pid = $_GET['pid'];
        $sql_select_products = mysqli_query($conn, "SELECT * FROM products WHERE id = '$pid'") or die('Query Failed');
        $fetch_products = mysqli_fetch_assoc($sql_select_products);
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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $fetch_products['name']; ?> | DumbBell</title>

        <!--font awesome cdnjs link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <!--custom css file link -->
        <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
        <link rel="icon" href="images/logo-only.png" type="image/png">
    </head>

    <body>
        <?php
            include_once('./header.php');
        ?>
        <section class="quick-view">
            <h1 class="title"> product details </h1>
            <?php
                if(isset($_GET['pid'])){
                    $pid = $_GET['pid'];
                    $sql_select_products = mysqli_query($conn, "SELECT * FROM products WHERE id = '$pid'") or die('Query Failed');

                    if(mysqli_num_rows($sql_select_products) > 0){
                        while($fetch_products = mysqli_fetch_assoc($sql_select_products)){  
            ?>
            <form action="" method="POST" class="box">
                <img src="./uploaded_images/<?php echo $fetch_products['image'] ?>" alt="" class="product-image">
                <div class="name"><?php echo $fetch_products['name']; ?></div>
                <div class="price">Rp <?php echo number_format($fetch_products['price'], 0, ',', '.'); ?></div>
                <div class="category"><?php echo $fetch_products['category']; ?></div>
                <div class="stock">Stock: <?php echo $fetch_products['stock']; ?></div>
                <div class="details"><?php echo $fetch_products['details']; ?></div>
                <select name="product_quantity" class="qty" id="">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>" >
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>" >
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>" >
                <input type="hidden" name="product_category" value="<?php echo $fetch_products['category']; ?>" >
                <input type="hidden" name="product_stock" value="<?php echo $fetch_products['stock']; ?>" >
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>" >
                <input type="submit" value="add to wishlist" name="add_to_wishlist" class="option-btn">
                <input type="submit" value="add to cart" name="add_to_cart" class="btn">
            </form>
            <?php
                    }
                }
                else{
                    echo '<p class="empty">No products added yet!</p>';
                }
            }
            ?>          
            <div class="more-btn">
                <a href="home.php" class="option-btn">go to home page</a>
            </div>

        </section>





    <?php 
        include_once('./footer.php');
    ?>

    <script src="./js/script.js"></script>
    </body>
</html>