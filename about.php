<?php
    include_once('./config/config.php');
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
        <?php
            include_once('./header.php');
        ?>
        <section class="heading">
            <h3>About DumbBell</h3>
            <p><a href="/">home</a> / about</p>
        </section>

        <section class="about">

            <div class="flex">

                <div class="image">
                </div>

                <div class="content">
                    <h3>why DumbBell?</h3>
                    <p>Karena, DumbBell adalah Website E-Commerce ideal untuk membeli suplemen gym, terutama bagi pemula, karena website ini mempunyai tampilan yang <strong>User Friendly</strong> dan juga mudah di navigasikan. Dengan fokus pada kebutuhan pemula, DumbBell menyediakan pengalaman belanja yang komprehensif, terpercaya, dan mudah digunakan, menjadikannya platform pilihan untuk suplemen gym.</p>
                    <a href="shop.php" class="btn">shop now</a>
                </div>
            </div>

            <div class="flex">
                
                <div class="content">
                    <h3>what DumbBell provide?</h3>
                    <p>Disini, kami menyediakan berbagai fitur unggulan untuk pengalaman belanja suplemen yang optimal, yaitu <strong> Kategori suplemen yang lengkap bagi pemula </strong>, <strong>Kemudahan Berbelanja</strong>, dan juga <strong> Layanan Pelanggan Responsif </strong></p>
                    <a href="custom.php" class="btn">contact us</a>
                </div>

                <div class="image">
                </div>
            </div>
        </section>

    <?php 
        include_once('./footer.php');
    ?>

    <script src="./js/script.js"></script>
    </body>
</html>