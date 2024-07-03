<?php
    include_once('./config/config.php');
    session_start();

    $customer_id = $_SESSION['customer_id'];

    if(!isset($customer_id)){
        header('location:login.php');
    }

    if(isset($_POST['add_to_wishlist'])){
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_color = $_POST['product_color'];
        $product_category = $_POST['product_category'];
        $product_image = $_POST['product_image'];
        
        $sql_check_wishlist_num = mysqli_query($conn, "SELECT * FROM wishlist WHERE customer_id = '$customer_id' AND name = '$product_name' AND color = '$product_color'") or die('Query Failed');
        $sql_check_cart_num = mysqli_query($conn, "SELECT * FROM cart WHERE customer_id = '$customer_id' AND name = '$product_name' AND color = '$product_color'") or die('Query Failed');

        if(mysqli_num_rows($sql_check_wishlist_num) > 0){
            $message[] = 'Product already added to wishlist';
        }
        else if(mysqli_num_rows($sql_check_cart_num) > 0){
            $message[] = 'Product already added to cart';
        }
        else{
            mysqli_query($conn, "INSERT INTO wishlist(customer_id, pid, name, price, color, category, image) VALUES('$customer_id', '$product_id', '$product_name', '$product_price', '$product_color', '$product_category', '$product_image')") or die('Query Failed');
            $message[] = 'Added product to wishlist successfully!';
        }
    }

    if(isset($_POST['add_to_cart'])){
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_color = $_POST['product_color'];
        $product_category = $_POST['product_category'];
        $product_quantity = $_POST['product_quantity'];
        $product_image = $_POST['product_image'];
        
        $sql_check_cart_num = mysqli_query($conn, "SELECT * FROM cart WHERE customer_id = '$customer_id' AND name = '$product_name' AND color = '$product_color'") or die('Query Failed');

        if(mysqli_num_rows($sql_check_cart_num) > 0){
            $message[] = 'Product already added to cart';
        }
        else{

            $sql_check_wishlist_num = mysqli_query($conn, "SELECT * FROM wishlist WHERE customer_id = '$customer_id' AND name = '$product_name' AND color = '$product_color'") or die('Query Failed');

            if(mysqli_num_rows($sql_check_wishlist_num) > 0){
                mysqli_query($conn, "DELETE FROM wishlist WHERE customer_id = '$customer_id' AND name = '$product_name' AND color = '$product_color'") or die('Query Failed');
            }
            mysqli_query($conn, "INSERT INTO cart(customer_id, pid, name, price, color, category, quantity, image) VALUES('$customer_id', '$product_id', '$product_name', '$product_price', '$product_color', '$product_category', '', '$product_image')") or die('Query Failed');
            $message[] = 'Added product to cart successfully!';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>

        <!--font awesome cdnjs link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <!--custom css file link -->
        <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    </head>

    <body>

    <?php  
        include_once('./header.php');
    ?>

        <section class="home">

            <div class="content">
                <h3>DumbBell Website</h3>
                <p>
                DumbBell is a user-friendly e-commerce platform specifically designed to cater to individuals who are new to lifting weights or just starting their gym journey.
                The website provides a curated selection of supplements tailored to beginners, aiming to support their fitness goals and enhance their workout experience.
                </p>
                <a href="about.php" class="btn">More About Us</a>
            </div>

        </section>

        <section class="category">

            <div class="flex">

                <div class="image">
                    <img src="./images/bulking1.jpg" alt="">
                </div>

                <div class="content">
                    <h3>Bulking</h3>
                    <p>
                    Bulking is a phase in a bodybuilder or athlete's training regimen focused on gaining muscle mass and strength. During this period, individuals consume a calorie surplus, meaning they eat more calories than they burn, to fuel muscle growth and recover from intense workouts.
                    The primary goals during bulking are to increase muscle size and enhance overall strength.
                    </p>
                    <a href="earrings.php" class="btn">Shop All Bulking</a>
                </div>
            </div>

            <div class="flex">
                
                <div class="content">
                    <h3>Cutting</h3>
                    <p>
                    Cutting is the phase aimed at reducing body fat while preserving muscle mass. During this period, individuals eat fewer calories than they burn, creating a calorie deficit. Maintaining a high protein intake is important to prevent muscle loss.
                    Cardiovascular exercise is added to the routine to increase calorie expenditure. Strength training continues to ensure muscles are preserved, even as body fat decreases.
                    </p>
                    <a href="necklace.php" class="btn">Shop All Cuttings</a>
                </div>

                <div class="image">
                    <img src="./images/cutting2.jpg" alt="">
                </div>
            </div>

        </section>

       

        <section class="products">

            <h1 class="title"> Our Products </h1>

            <div class="box-container">

                <?php
                    $sql_select_products = mysqli_query($conn, "SELECT * FROM products LIMIT 6 OFFSET 22") or die('Query Failed');

                    if(mysqli_num_rows($sql_select_products) > 0){
                        while($fetch_products = mysqli_fetch_assoc($sql_select_products)){  
                ?>
                <form action="" method="POST" class="box">
                    <a href="view_page.php?pid=<?php echo $fetch_products['id']; ?>" class="fas fa-eye"></a>
                    <div class="price">Rp <?php echo $fetch_products['price']; ?></div>
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
                        echo '<p class="empty">No products added yet!</p>';
                    }
                ?>
            </div>

            <div class="more-btn">
                <a href="shop.php" class="option-btn">load more</a>
            </div>
        </section>

    <?php 
        include_once('./footer.php');
    ?>

    <script src="js/script.js"></script>
    </body>
</html>