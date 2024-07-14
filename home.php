<?php
    include_once('./config/config.php');

    include_once('./header.php');

    if(isset($_POST['add_to_wishlist'])){
      if (!isset($_SESSION['customer_id'])) {
          header('Location: login.php');
          exit();
      }

      $customer_id = $_SESSION['customer_id'];
      $product_id = $_POST['product_id'];
      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_category = $_POST['product_category'];
      $product_image = $_POST['product_image'];
      
      $sql_check_wishlist_num = mysqli_query($conn, "SELECT * FROM wishlist WHERE customer_id = '$customer_id' AND name = '$product_name'") or die('Query Failed');
      $sql_check_cart_num = mysqli_query($conn, "SELECT * FROM cart WHERE customer_id = '$customer_id' AND name = '$product_name'") or die('Query Failed');

      if(mysqli_num_rows($sql_check_wishlist_num) > 0){
          $message[] = 'Product already added to wishlist';
      }
      else if(mysqli_num_rows($sql_check_cart_num) > 0){
          $message[] = 'Product already added to cart';
      }
      else{
          mysqli_query($conn, "INSERT INTO wishlist(customer_id, pid, name, price, category, image) VALUES('$customer_id', '$product_id', '$product_name', '$product_price',  '$product_category', '$product_image')") or die('Query Failed');
          $message[] = 'Added product to wishlist';
      }
    }

    if(isset($_POST['add_to_cart'])){
        if (!isset($_SESSION['customer_id'])) {
            header('Location: login.php');
            exit();
        }

        $customer_id = $_SESSION['customer_id'];
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_category = $_POST['product_category'];
        $product_quantity = $_POST['product_quantity'];
        $product_image = $_POST['product_image'];
        
        $sql_check_cart_num = mysqli_query($conn, "SELECT * FROM cart WHERE customer_id = '$customer_id' AND name = '$product_name'") or die('Query Failed');

        if(mysqli_num_rows($sql_check_cart_num) > 0){
            $message[] = 'Product already added to cart';
        }
        else{

            $sql_check_wishlist_num = mysqli_query($conn, "SELECT * FROM wishlist WHERE customer_id = '$customer_id' AND name = '$product_name'") or die('Query Failed');

            if(mysqli_num_rows($sql_check_wishlist_num) > 0){
                mysqli_query($conn, "DELETE FROM wishlist WHERE customer_id = '$customer_id' AND name = '$product_name'") or die('Query Failed');
            }
            mysqli_query($conn, "INSERT INTO cart(customer_id, pid, name, price, category, quantity, image) VALUES('$customer_id', '$product_id', '$product_name', '$product_price',  '$product_category', '$product_quantity', '$product_image')") or die('Query Failed');
            $message[] = 'Added product to cart';
        }
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
        <title>DumbBell</title>

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
        <section class="home">
            <div class="content">
                <h3>DumbBell Website</h3>
                <p>
                Website ini menyediakan pilihan suplemen yang dirancang khusus untuk pemula, yang bertujuan untuk mendukung target mereka dan memaksimalkan pengalaman berolahraga.
                </p>
                <a href="about.php" class="btn">More About Us</a>
            </div>
        </section>

        <section class="category">
            <div class="title">
                <h3>Jenis-jenis Program Membentuk Badan</h3>
            </div>
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
                    <div class="content">
                        <a href="view_page.php?pid=<?php echo $fetch_products['id']; ?>" class="fas fa-eye"></a>
                        <div class="price">Rp <?php echo number_format($fetch_products['price'], 0, ',', '.'); ?></div>
                        <img src="./uploaded_images/<?php echo $fetch_products['image'] ?>" alt="" class="product-image">
                        <div class="name"><?php echo $fetch_products['name']; ?></div>
                        <div class="category"><?php echo $fetch_products['category']; ?></div>
                        <div class="stock">Stock: <?php echo $fetch_products['stock']; ?></div>
                        <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>" >
                        <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>" >
                        <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>" >
                        <input type="hidden" name="product_category" value="<?php echo $fetch_products['category']; ?>" >
                        <input type="hidden" name="product_stock" value="<?php echo $fetch_products['stock']; ?>" >
                        <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>" >
                    </div>
                    <select name="product_quantity" class="qty" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
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