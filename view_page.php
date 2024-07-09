<?php
    include_once('./config/config.php');
    include_once('./header.php');

    if(isset($_GET['pid'])){
        $pid = $_GET['pid'];
        $sql_select_products = mysqli_query($conn, "SELECT * FROM products WHERE id = '$pid'") or die('Query Failed');
        $fetch_products = mysqli_fetch_assoc($sql_select_products);
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
        <link rel="icon" href="images/logo-only.png">
    </head>

    <body>
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
                <div class="details"><?php echo $fetch_products['details']; ?></div>
                <input type="number" min="0" max="100" value="1" name="product_quantity" class="qty">
                <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>" >
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>" >
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>" >
                <input type="hidden" name="product_category" value="<?php echo $fetch_products['category']; ?>" >
                <input type="hidden" name="product_color" value="<?php echo $fetch_products['color']; ?>" >
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