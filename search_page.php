<?php
    include_once('./config/config.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search Page | DumbBell</title>

        <!--font awesome cdnjs link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <!--custom css file link -->
        <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
        <link rel="icon" href="images/logo-only.png">
    </head>

    <body>
        <?php  
            include_once('./header.php');
        ?>
        <section class="heading">
            <h3>Search Products</h3>
            <p><a href="home.php">home</a> / search</p>
        </section>

        <section class="search-form">
            <form action="" method="POST">
                <input type="text" class="box" placeholder="search products..." name="search_box">
                <input type="submit" class="btn" value="search" name="search_btn">
            </form>
        </section>

        <section class="products" style="padding-top:0;">

            <div class="box-container">

                <?php
                    if(isset($_POST['search_btn'])){
                        $search_box = mysqli_real_escape_string($conn, $_POST['search_box']);
                    
                        $sql_select_products = mysqli_query($conn, "SELECT * FROM products WHERE name LIKE '%{$search_box}%' OR color LIKE '%{$search_box}%' OR category LIKE '%{$search_box}%'") or die('Query Failed');

                        if(mysqli_num_rows($sql_select_products) > 0){
                            while($fetch_products = mysqli_fetch_assoc($sql_select_products)){  
                ?>
                <form action="" method="POST" class="box">
                    <a href="view_page.php?pid=<?php echo $fetch_products['id']; ?>" class="fas fa-eye"></a>
                    <div class="price">Rp <?php echo number_format($fetch_products['price'], 0, ',', '.'); ?></div>
                    <img src="./uploaded_images/<?php echo $fetch_products['image'] ?>" alt="" class="product-image">
                    <div class="name"><?php echo $fetch_products['name']; ?></div>
                    <div class="category"><?php echo $fetch_products['category']; ?></div>
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
                            echo '<p class="empty">No result found.</p>';
                        }
                    }else{
                        echo '<p class="empty">Search something!</p>';
                    }
                ?>
            </div>
        </section>


    <?php 
        include_once('./footer.php');
    ?>

    <script src="./js/script.js"></script>
    </body>
</html>