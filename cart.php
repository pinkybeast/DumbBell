<?php
    include_once('./config/config.php');
    session_start();

    $customer_id = $_SESSION['customer_id'];

    if(!isset($customer_id)){
        header('location:login.php');
    }

    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM cart WHERE id = '$delete_id'") or die('query failed');
        header('location:cart.php');
    }

    if(isset($_GET['delete_all'])){
        mysqli_query($conn, "DELETE FROM cart WHERE customer_id = '$customer_id'") or die('query failed');
        header('location:cart.php');
    }

    if(isset($_POST['update_quantity'])){
        $cart_id = $_POST['cart_id'];
        $cart_quantity = $_POST['cart_quantity'];
        mysqli_query($conn, "UPDATE cart SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
        $message[] = 'Cart quantity updated!';
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart | DumbBell</title>

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
            <h3>shopping cart</h3>
            <p><a href="index.php">home</a> / cart</p>
        </section>

        <section class="shopping-cart">

            <h1 class="title"> products added </h1>

            <div class="box-container">

            <?php
                $grand_total = 0;
                $sql_select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE customer_id = '$customer_id'") or die('Query failed');
                if(mysqli_num_rows($sql_select_cart) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($sql_select_cart)){
            ?>
                <div class="box">
                    <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times" onclick="return confirm('Delete this from your cart?');"></a>
                    <a href="view_page.php?pid=<?php echo $fetch_cart['pid']; ?>" class="fas fa-eye"></a>
                    <img src="uploaded_images/<?php echo $fetch_cart['image']; ?>" alt="" class="product-image">
                    <div class="name"><?php echo $fetch_cart['name']; ?></div>
                    <div class="price">Rp <?php echo number_format($fetch_cart['price'], 0, ',', '.'); ?>,-</div>
                    <div class="category"><?php echo $fetch_cart['category']; ?></div>
                    <form action="" method="post">
                        <input type="hidden" value="<?php echo $fetch_cart['id']; ?>" name="cart_id">
                        <input type="number" min="1" value="<?php echo $fetch_cart['quantity']; ?>" name="cart_quantity" class="qty">
                        <input type="submit" value="update" class="option-btn" name="update_quantity">
                    </form>
                    <div class="sub-total"> sub-total : <span>Rp <?php $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); echo number_format($sub_total, 0, ',', '.') ?>,-</span></div>
                </div>
            <?php
            $grand_total += $sub_total;
                }
            }
            else{
                echo '<p class="empty">Your cart is empty</p>';
            }
            ?>
            </div>

            <div class="more-btn">
                <a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled' ?>" onclick="return confirm('delete all from cart?');">delete all</a>
            </div>

            <div class="cart-total">
                <p>Total : <span>Rp <?php echo number_format($grand_total, 0, ',', '.'); ?>,-</span></p>
                <a href="shop.php" class="option-btn">continue shopping</a>
                <a href=" checkout.php" class="btn <?php echo ($grand_total > 1)?'':'disabled' ?>">proceed to checkout</a>
            </div>
        </section>

    <?php 
        include_once('./footer.php');
    ?>

    <script src="./js/script.js"></script>
    </body>
</html>