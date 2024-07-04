<?php
    include_once('../config/config.php');
    session_start();

    $admin_id = $_SESSION['admin_id'];

    if(!isset($admin_id)){
        header('location:../login.php');
    }

    if(isset($_POST['update_product'])){
        $update_p_id = $_POST['update_p_id'];
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $price = $_POST['price'];
        $color = mysqli_real_escape_string($conn, $_POST['color']);
        $category = $_POST['update_category'];
        $details = mysqli_real_escape_string($conn, $_POST['details']);
        
        mysqli_query($conn, "UPDATE products SET name ='$name', price ='$price', color = '$color', category ='$category', details ='$details' WHERE id = '$update_p_id'");

        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../uploaded_images/'.$image;
        $old_image = $_POST['update_p_image'];

        if(!empty($image)){
            if($image_size > 20000000){
                $message[] = "Image size too large!";
            }
            else{
                mysqli_query($conn, "UPDATE products SET image = '$image' WHERE id = '$update_p_id'") or die('Query Failed');
                
                move_uploaded_file($image_tmp_name, $image_folder);
                unlink('../uploaded_images/'.$old_image);

                $message[] = 'Image also updated successfully!';
            }
        }

        $message[] = 'Product update successfully!';  
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Product | Admin</title>

        <!--font awesome cdnjs link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <!--custom admin css file link with force reload to avoid caching-->
        <link rel="stylesheet" href="../css/admin_style.css?v=<?php echo time(); ?>">
    </head>
    
    <body>

    <?php include './admin_header.php'; ?>

    <section class="update-product">
        
    <?php
        $update_id = $_GET['update'];
        $sql_select_products = mysqli_query($conn, "SELECT * FROM products WHERE id = '$update_id'") or die('Query Failed');

        if(mysqli_num_rows($sql_select_products) > 0){
            while($fetch_product = mysqli_fetch_assoc($sql_select_products)){

    ?>
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Update Product</h3>
            <img src="../uploaded_images/<?php echo $fetch_product['image']; ?>" alt="" class="product-image">
            <input type="hidden" value="<?php echo $fetch_product['id'] ?>" name="update_p_id">
            <input type="hidden" value="<?php echo $fetch_product['image'] ?>" name="update_p_image">
            <input type="text" name="name" class="box" value="<?php echo $fetch_product['name'] ?>" placeholder="Update product name" required >
            <input type="number" min="0" name="price" class="box" value="<?php echo $fetch_product['price'] ?>" placeholder="Update product price" required >
            <input type="text" name="color" class="box" value="<?php echo $fetch_product['color'] ?>" placeholder="Update product color" required >
            <p>Select new product category:</p>
            <select name="update_category" class="box" >
                    <option disabled selected><?php echo $fetch_product['category'] ?></option>
                    <option value="necklace">Necklace</option>
                    <option value="earrings">Earrings</option>
                    <option value="bracelet">Bracelet</option>
                    <option value="ring">Ring</option>
                    <option value="anklet">Anklet</option>
                    <option value="other">Other</option>
            </select>
            <textarea name="details" cols="30" rows="10" class="box" placeholder="Update products details" required><?php echo $fetch_product['details'] ?></textarea>
            <p>Select new image file:</p>
            <input type="file" id="image-files" name="image" accept="image/jpg, image/jpeg, image/png" class="box"><br><br>
            <input type="submit" value="update product" name="update_product" class="btn" >
            <a href="admin_products.php" class="option-btn">Go Back</a>
        </form>        
    <?php
           }
        }
        else{
            echo '<p class="empty">No product selected for update.</p>';
        }
    ?>
    </section>

        

    <!-- custom js file link -->
    <script src="../js/admin_script.js"></script>

    </body>
</html>