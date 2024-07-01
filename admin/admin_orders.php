<?php
    include_once('../config/config.php');
    session_start();

    $admin_id = $_SESSION['admin_id'];

    if(!isset($admin_id)){
        header('location:../login.php');
    };

    if(isset($_POST['update_order'])){
        $order_id = $_POST['order_id'];
        $update_payment = $_POST['update_payment'];

        mysqli_query($conn, "UPDATE orders SET payment_status = '$update_payment' WHERE id = '$order_id';") or die('Query Failed');

        $message[] = 'Payment status of order successfully updated!';
    }

    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM orders WHERE id = '$delete_id';") or die('Query failed');

        header('location:admin_orders.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Orders</title>

        <!--font awesome cdnjs link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <!--custom admin css file link with force reload to avoid caching-->
        <link rel="stylesheet" href="../css/admin_style.css?v=<?php echo time(); ?>">
    </head>
    
    <body>

    <?php include './admin_header.php'; ?>

    <section class="placed-orders">

        <h1 class="title">placed orders</h1>
            <div class="box-container">

                <?php
                $sql_select_orders = mysqli_query($conn, "SELECT * FROM orders") or die('Query Failed');
                if(mysqli_num_rows($sql_select_orders) > 0){
                    while($fetch_orders = mysqli_fetch_assoc($sql_select_orders)){
                ?>

                <div class="box">
                    <p>Customer ID: <span><?php echo $fetch_orders['customer_id'] ?></span></p>
                    <p>Placed on Date: <span><?php echo $fetch_orders['placed_on_date'] ?></span></p>
                    <p>Customer Name: <span><?php echo $fetch_orders['name'] ?></span></p>
                    <p>Customer Number: <span><?php echo $fetch_orders['number'] ?></span></p>
                    <p>Customer Email: <span><?php echo $fetch_orders['email'] ?></span></p>
                    <p>Customer Address: <span><?php echo $fetch_orders['address'] ?></span></p>
                    <p>Total Products: <span><?php echo $fetch_orders['total_products'] ?></span></p>
                    <p>Total Price: Rp <span><?php echo $fetch_orders['total_price'] ?></span></p>
                    <p>Payment Method: <span><?php echo $fetch_orders['method'] ?></span></p>
                    <form action="" method="post">
                        <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id'] ?>">
                        <select name="update_payment">
                            <option disabled selected><?php echo $fetch_orders['payment_status'] ?></option>
                            <option value="pending">pending</option>
                            <option value="completed">completed</option>
                        </select>
                        <input type="submit" name="update_order" value="update" class="option-btn">
                        <a href="admin_orders.php?delete=<?php echo $fetch_orders['id'] ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this order');">delete</a>
                    </form>
                </div>

                <?php 
                    }
                }
                else{
                    echo '<p class="empty">No orders placed yet!</p>';
                }
                ?>    
            </div>
        
    </section>

        

    <!-- custom js file link -->
    <script src="../js/admin_script.js"></script>

    </body>
</html>