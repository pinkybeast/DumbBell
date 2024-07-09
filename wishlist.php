<?php
    include_once('./config/config.php');

    $customer_id = $_SESSION['customer_id'];

    if(!isset($customer_id)){
        header('location:login.php');
    }

    if(isset($_POST['add_to_cart'])){
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_color = $_POST['product_color'];
        $product_category = $_POST['product_category'];
        $product_quantity = 1;
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
            mysqli_query($conn, "INSERT INTO cart(customer_id, pid, name, price, color, category, quantity, image) VALUES('$customer_id', '$product_id', '$product_name', '$product_price', '$product_color', '$product_category', '$product_quantity', '$product_image')") or die('Query Failed');
            $message[] = 'Added product to cart successfully!';
        }
    }
    
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM wishlist WHERE id = '$delete_id'") or die('query failed');
        header('location:wishlist.php');
    }

    if(isset($_GET['delete_all'])){
        mysqli_query($conn, "DELETE FROM wishlist WHERE customer_id = '$customer_id'") or die('query failed');
        header('location:wishlist.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WishList | DumbBell</title>

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
            <h3>Your wishlist</h3>
            <p><a href="/">home</a> / wishlist</p>
        </section>

        <section class="wishlist">

            <h1 class="title"> products added </h1>

            <div class="box-container">

            <?php
                $grand_total = 0;
                $sql_select_wishlist = mysqli_query($conn, "SELECT * FROM wishlist WHERE customer_id = '$customer_id'") or die('Query failed');
                if(mysqli_num_rows($sql_select_wishlist) > 0){
                    while($fetch_wishlist = mysqli_fetch_assoc($sql_select_wishlist)){
            ?>
            <form action="" method="POST" class="box">
                <a href="wishlist.php?delete=<?php echo $fetch_wishlist['id']; ?>" class="fas fa-times" onclick="return confirm('Delete this from your wishlist?');"></a>
                <a href="view_page.php?pid=<?php echo $fetch_wishlist['pid']; ?>" class="fas fa-eye"></a>
                <img src="uploaded_images/<?php echo $fetch_wishlist['image']; ?>" alt="" class="product-image">
                <div class="name"><?php echo $fetch_wishlist['name']; ?></div>
                <div class="price">Rp <?php echo number_format($fetch_wishlist['price'], 0, ',', '.'); ?></div>
                <div class="category"><?php echo $fetch_wishlist['category']; ?></div>
                <input type="hidden" name="product_id" value="<?php echo $fetch_wishlist['pid']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $fetch_wishlist['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_wishlist['price']; ?>">
                <input type="hidden" name="product_color" value="<?php echo $fetch_wishlist['color']; ?>">
                <input type="hidden" name="product_category" value="<?php echo $fetch_wishlist['category']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_wishlist['image']; ?>">
                <input type="submit" value="add to cart" name="add_to_cart" class="btn">
            </form>
            <?php
            $grand_total += $fetch_wishlist['price'];
                }
            }
            else{
                echo '<p class="empty">Your wishlist is empty</p>';
            }
            ?>
            </div>

            <div class="wishlist-total">
                <p>Total : <span>Rp <?php echo number_format($grand_total, 0, ',', '.'); ?>,-</span></p>
                <a href="shop.php" class="option-btn">continue shopping</a>
                <a href="wishlist.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled' ?>" onclick="return confirm('delete all from wishlist?');">delete all</a>
            </div>

        </section>

    <?php 
        include_once('./footer.php');
    ?>

    <script src="./js/script.js"></script>
    </body>
</html>