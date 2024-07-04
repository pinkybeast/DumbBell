<?php
    include_once('../config/config.php');
    session_start();

    $admin_id = $_SESSION['admin_id'];

    if(!isset($admin_id)){
        header('location:../login.php');
    }

    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $sql_select_delete_image = mysqli_query($conn, "SELECT image FROM messages WHERE id = '$delete_id'") or die('Query Failed');
        $fetch_delete_image = mysqli_fetch_assoc($sql_select_delete_image);

        unlink('../received_images/'.$fetch_delete_image['image']); 

        mysqli_query($conn, "DELETE FROM messages WHERE id = '$delete_id'; ") or die('Query failed');

        header('location:admin_contact.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Messages | Admin</title>

        <!--font awesome cdnjs link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <!--custom admin css file link with force reload to avoid caching-->
        <link rel="stylesheet" href="../css/admin_style.css?v=<?php echo time(); ?>">
    </head>
    
    <body>

    <?php include './admin_header.php'; ?>

        <section class="messages">

            <h1 class="title">Messages</h1>

            <div class="box-container">
            <?php
                $sql_select_messages = mysqli_query($conn, "SELECT * FROM messages;") or die('Query Failed');

                if(mysqli_num_rows($sql_select_messages) > 0){
                    while($fetch_message = mysqli_fetch_assoc($sql_select_messages)){
                ?>

                <div class="box">
                    <p><b>Message <span><?php echo $fetch_message['id']; ?></span></b></p>
                    <p>Customer ID: <span><?php echo $fetch_message['customer_id']; ?></span></p>
                    <p>Customer Name: <span><?php echo $fetch_message['name']; ?></span></p>
                    <p>Customer Number: <span><?php echo $fetch_message['number']; ?></span></p>
                    <p>Customer Email: <span><?php echo $fetch_message['email']; ?></span></p>
                    <p>Message: <span><?php echo $fetch_message['message']; ?></span></p>
                    <img src="../received_images/<?php echo $fetch_message['image']; ?>" alt="No image" class="product-image" >
                    <a href="admin_contact.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('Delete this message?');" class="delete-btn">Delete</a>
                </div>

                <?php
                    }
                }
                else{
                    $message[] = 'You have 0 custom orders or messages.';
                }

                ?>

            

                
            </div>

        </section>

    <!-- custom js file link -->
    <script src="../js/admin_script.js"></script>

    </body>
</html>