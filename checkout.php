<?php
    include_once('./config/config.php');
    include_once('./header.php');

    $customer_id = $_SESSION['customer_id'];

    if(!isset($customer_id)){
        header('location:login.php');
    }

    if(isset($_POST['order'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $method = mysqli_real_escape_string($conn, $_POST['method']);
        $address = mysqli_real_escape_string($conn, 'House no. '. $_POST['house'].', '. $_POST['street'].', '. $_POST['city']. ', '. $_POST['state'].', '. $_POST['country'].' - '. $_POST['pin_code']);

        $placed_on = date('d-M-Y');

        $cart_total = 0;
        $cart_products[] = '';

        $sql_select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE customer_id = '$customer_id';") or die('Query Failed');

        if(mysqli_num_rows($sql_select_cart) > 0){
            while($cart_item = mysqli_fetch_assoc($sql_select_cart)){
                $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
                $sub_total = ($cart_item['price'] * $cart_item['quantity']);
                $cart_total += $sub_total;
            }
        }

        $total_products = implode(', ', $cart_products);

        $sql_order = mysqli_query($conn, "SELECT * FROM orders WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total';") or die('Query failed');

        if($cart_total == 0){
            $message[] = 'Your cart is empty!';
        }
        else if(mysqli_num_rows($sql_order) > 0){
            $message[] = 'Order placed already.';
        }
        else{
            mysqli_query($conn, "INSERT INTO orders(customer_id, name, number, email, method, address, total_products, total_price, placed_on_date) VALUES('$customer_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on');") or die('Query failed');
            mysqli_query($conn, "DELETE FROM cart WHERE customer_id = '$customer_id'") or die('query failed');
        }
        $message[] = 'Order placed successfully!';
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
        <title>Checkout order | DumbBell</title>

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
            <h3>Checkout order</h3>
            <p><a href="home.php">home</a> / checkout</p>
        </section>

        <section class="display-order">
        <?php
            $grand_total = 0;
            $sql_select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE customer_id = '$customer_id'") or die('Query failed');
            if(mysqli_num_rows($sql_select_cart) > 0){
                while($fetch_cart = mysqli_fetch_assoc($sql_select_cart)){
                $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                $grand_total += $total_price;
        ?>    
            <p> <?php echo $fetch_cart['name'] ?> <span>(<?php echo 'Rp '.number_format($fetch_cart['price'], 0, ',', '.').' x '.$fetch_cart['quantity']  ?>)</span> </p>
        <?php
            }
            }else{
                echo '<p class="empty">Terimakasih sudah berbelanja!</p>';
            }
        ?>
            <div class="grand-total">Total : <span>Rp <?php echo number_format($grand_total, 0, ',', '.'); ?>,-</span></div>
        </section>

        <section class="checkout">

            <form action="" method="POST" name="order">

                <h3>Pembayaran menggunakan GoPay, DANA  bisa ke nomor 082299043443
                    <br> Untuk pembayaran bank hanya bisa via Bank BCA ke nomer rekening <br> 56810383 a/n Muhammad Haikal Halim
                    <br>BUKTI PEMBAYARAN HARAP DI KIRIM KE EMAIL dumbbell@gmail.com</h3>

                <div class="flex">
                    <div class="inputBox">
                        <span>Your Name :</span>
                        <input type="text" name="name" placeholder="enter your name" required>
                    </div>
                    <div class="inputBox">
                        <span>Your Number :</span>
                        <input type="text" name="number" min="0" placeholder="enter your number" required>
                    </div>
                    <div class="inputBox">
                        <span>Your Email :</span>
                        <input type="email" name="email" placeholder="enter your email" required>
                    </div>
                    <div class="inputBox">
                        <span>Payment Method :</span>
                        <select name="method">
                            <option value="cash on delivery">Cash on Delivery</option>
                            <option value="credit card">GoPay</option>
                            <option value="paypal">DANA</option>
                            <option value="paytm">Bank BCA</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>Address line 1 :</span>
                        <input type="text" name="house" placeholder="e.g. house no." required>
                    </div>
                    <div class="inputBox">
                        <span>Address line 2 :</span>
                        <input type="text" name="street" placeholder="e.g. street name">
                    </div>
                    <div class="inputBox">
                        <span>City :</span>
                        <input type="text" name="city" placeholder="e.g. Bekasi" required>
                    </div>
                    <div class="inputBox">
                        <span>Province/State :</span>
                        <input type="text" name="state" placeholder="e.g. Jawa Barat" required>
                    </div>
                    <div class="inputBox">
                        <span>Country :</span>
                        <input type="text" name="country" placeholder="e.g. Indonesia" required>
                    </div>
                    <div class="inputBox">
                        <span>Zip Code :</span>
                        <input type="text" min="0" name="pin_code" placeholder="e.g. 13860" required>
                    </div>
                </div>
                <input type="submit" name="order" value="order now" class="btn">
            </form>
        </section>

    <?php 
        include_once('./footer.php');
    ?>

    <script src="./js/script.js"></script>
    </body>
</html>