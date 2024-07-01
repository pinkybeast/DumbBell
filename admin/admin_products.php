<?php
    include_once('../config/config.php');
    session_start();

    $admin_id = $_SESSION['admin_id'];

    if(!isset($admin_id)){
        header('location:../login.php');
    }

    if(isset($_POST['add_product'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $price = $_POST['price'];
        $color = mysqli_real_escape_string($conn, $_POST['color']);
        $category = $_POST['category'];
        $details = mysqli_real_escape_string($conn, $_POST['details']);
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../uploaded_images/'.$image;

        /*$sql_select_product_name = mysqli_query($conn, "SELECT name FROM products WHERE name = '$name'") or die('Query Failed');

        if(mysqli_num_rows($sql_select_product_name) > 0){
            $message[] = 'Product name already exists!';
        }*/
        
        $sql_add_product = mysqli_query($conn, "INSERT INTO products(name, price, color, category, details, image) VALUES('$name', '$price', '$color', '$category', '$details', '$image')") or die('Query Failed');
            
        if($sql_add_product){

            if($image_size > 20000000){
                $message[] = 'Image size is too large.';
            }
            else{
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'Product added successfully!';
            }
        }
        else{
            $message[] = 'Product addition failed!';

        }
    }

    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $select_delete_image = mysqli_query($conn, "SELECT image FROM products WHERE id = '$delete_id'") or die('Query Failed');
        $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);

        unlink('../uploaded_images/'.$fetch_delete_image['image']); 

        mysqli_query($conn, "DELETE FROM products WHERE id = '$delete_id'") or die('Query Failed');
        mysqli_query($conn, "DELETE FROM wishlist WHERE pid = '$delete_id'") or die('Query Failed');
        mysqli_query($conn, "DELETE FROM cart WHERE pid = '$delete_id'") or die('Query Failed');
        header('location:admin_products.php');
    }
   
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products</title>

        <!--font awesome cdnjs link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <!--custom admin css file link -->
        <link rel="stylesheet" href="../css/admin_style.css?v=<?php echo time(); ?>">
    </head>
    
    <body>

    <?php include './admin_header.php'; ?>

    <!-- products CRUD section starts -->
    <section class="add-products">

        <h1 class="title">Shop products</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            <h3>Add New Products</h3>
            <input type="text" name="name" class="box" placeholder="Enter product name" required >
            <input type="number" min="0" name="price" class="box" placeholder="Enter product price" required >
            <input type="text" name="color" class="box" placeholder="Enter product color" required >
            <p>Select product category:</p>
            <select name="category" class="box">
                    <option value="necklace">Necklace</option>
                    <option value="earrings">Earrings</option>
                    <option value="bracelet">Bracelet</option>
                    <option value="ring">Ring</option>
                    <option value="anklet">Anklet</option>
                    <option value="other">Other</option>
            </select>
            <textarea name="details" cols="30" rows="10" class="box" placeholder="Enter products details" required></textarea>
            <p>Select image file:</p>
            <input type="file" id="image-files" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required><br><br>
            <input type="submit" value="add product" name="add_product" class="btn" >
        </form>

    </section>

    <section class="show-products">

        <div class="box-container">
            <?php
                $sql_select_products = mysqli_query($conn, "SELECT * FROM products") or die('Query Failed');

                if(mysqli_num_rows($sql_select_products) > 0){
                    while($fetch_products = mysqli_fetch_assoc($sql_select_products)){
            ?>
            <div class="box">
                <div class="price">Rs <?php echo $fetch_products['price']; ?></div>
                <img src="../uploaded_images/<?php echo $fetch_products['image']; ?>" alt="" class="product-image" >
                <div class="name"><?php echo $fetch_products['name']; ?></div>
                <div class="category"><?php echo $fetch_products['category']; ?></div>
                <div class="color">IN <?php echo $fetch_products['color']; ?></div>
                <div class="details"><?php echo $fetch_products['details']; ?></div>
                <a href="admin_update_product.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">Update</a>
                <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
            </div>
            <?php 
                }
            }
            else{
                echo '<p class="empty">No products added yet!</p>';
            }

            ?>
        </div>
        
    </section>

    <!-- products CRUD section ends -->

    <!-- custom js file link -->
    <script src="../js/admin_script.js"></script>


    </body>
</html>