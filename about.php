<?php
    include_once('./config/config.php');
    session_start();

    $customer_id = $_SESSION['customer_id'];

    if(!isset($customer_id)){
        header('location:login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About</title>

        <!--font awesome cdnjs link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <!--custom css file link -->
        <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    </head>

    <body>

    <?php  
        include_once('./header.php');
    ?>

        <section class="heading">
            <h3>about us</h3>
            <p><a href="index.php">home</a> / about</p>
        </section>

        <section class="about">

            <div class="flex">

                <div class="image">
                    <img src="./images/set5.png" alt="">
                </div>

                <div class="content">
                    <h3>why choose us?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni autem repellendus aliquid cumque similique recusandae, praesentium deleniti animi fugiat laborum! Lorem ipsum dolor sit amet.</p>
                    <a href="shop.php" class="btn">shop now</a>
                </div>
            </div>

            <div class="flex">
                
                <div class="content">
                    <h3>what we provide?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni autem repellendus aliquid cumque similique recusandae, praesentium deleniti animi fugiat laborum!</p>
                    <a href="custom.php" class="btn">contact us</a>
                </div>

                <div class="image">
                    <img src="./images/set4.png" alt="">
                </div>
            </div>

            <div class="flex">
                
                <div class="image">
                    <img src="./images/butterfly1.jpg" alt="">
                </div>

                <div class="content">
                    <h3>who are we?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni autem repellendus aliquid cumque similique recusandae, praesentium deleniti animi fugiat laborum! Lorem ipsum dolor sit amet.</p>
                    <a href="#reviews" class="btn">client diaries</a>
                </div>
            </div>


        </section>





    <?php 
        include_once('./footer.php');
    ?>

    <script src="./js/script.js"></script>
    </body>
</html>