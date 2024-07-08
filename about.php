<?php
    include_once('./config/config.php');
    include_once('./header.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About | DumbBell</title>

        <!--font awesome cdnjs link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <!--custom css file link -->
        <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
        <link rel="icon" href="images/logo-only.png">
    </head>

    <body>

        <section class="heading">
            <h3>About DumbBell</h3>
            <p><a href="home.php">home</a> / about</p>
        </section>

        <section class="about">

            <div class="flex">

                <div class="image">
                    <img src="./images/set5.png" alt="">
                </div>

                <div class="content">
                    <h3>why DumbBell?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni autem repellendus aliquid cumque similique recusandae, praesentium deleniti animi fugiat laborum! Lorem ipsum dolor sit amet.</p>
                    <a href="shop.php" class="btn">shop now</a>
                </div>
            </div>

            <div class="flex">
                
                <div class="content">
                    <h3>what DumbBell provide?</h3>
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
            </div>
        </section>

    <?php 
        include_once('./footer.php');
    ?>

    <script src="./js/script.js"></script>
    </body>
</html>