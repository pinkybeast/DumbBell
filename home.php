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
        <title>DumbBell</title>

        <!--font awesome cdnjs link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <!--custom css file link -->
        <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
        <link rel="icon" href="images/logo-only.png">
        
    </head>

    <body>
        <section class="home">
            <div class="content">
                <h3>DumbBell Website</h3>
                <p>
                DumbBell adalah platform e-commerce user friendly yang dirancang khusus untuk melayani individu yang baru dalam angkat beban atau baru memulai perjalanan gym mereka.
                Website ini menyediakan pilihan suplemen yang dirancang khusus untuk pemula, yang bertujuan untuk mendukung target mereka dan memaksimalkan pengalaman berolahraga.
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
                    Bulking juga merupakan strategi yang bertujuan untuk membentuk dan meningkatkan massa otot di dalam tubuh. Pada dasarnya, bulking adalah program diet menambah berat badan yang dilakukan dengan cara menambah asupan kalori melebihi kebutuhan kalori harian tubuh selama periode waktu tertentu. Lalu, setelah mencapai target berat badan, pola makan pada program bulking akan diatur dengan cara menurunkan jumlah asupan kalori secara bertahap.
                    </p>
                    <a href="bulking.php" class="btn">Shop All Bulking</a>
                </div>
            </div>

            <div class="flex">
                <div class="content">
                    <h3>Cutting</h3>
                    <p>
                    Cutting adalah program mengurangi lemak di tubuh bersamaan dengan peningkatan massa otot. Terdapat dua pendekatan dalam program cutting, yaitu diet dan olahraga yang harus dilakukan secara beriringan karena tanpa salah satunya, hasilnya bisa menjadi tidak maksimal. 
                        Diet cutting tidak cukup hanya mengatur asupan makan saja. Dibutuhkan juga perhitungan detail terhadap kalori, protein, lemak, dan karbohidrat setiap harinya.
                    </p>
                    <a href="cutting.php" class="btn">Shop All Cuttings</a>
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
                    $sql_select_products = mysqli_query($conn, "SELECT * FROM products LIMIT 3 OFFSET 9") or die('Query Failed');
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