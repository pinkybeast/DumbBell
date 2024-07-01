<?php
    include_once('./config/config.php');
    session_start();

    $customer_id = $_SESSION['customer_id'];

    if(!isset($customer_id)){
        header('location:login.php');
    }

    if(isset($_POST['send'])){

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $msg = mysqli_real_escape_string($conn, $_POST['message']);

        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = './received_images/'.$image;
    
        $sql_select_message = mysqli_query($conn, "SELECT * FROM messages WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');
    
        if(mysqli_num_rows($sql_select_message) > 0){
            $message[] = 'Message sent already!';
        }
        else{
            $sql_insert_message = mysqli_query($conn, "INSERT INTO messages(customer_id, name, email, number, message, image) VALUES('$customer_id', '$name', '$email', '$number', '$msg', '$image')") or die('query failed');
            
            if($sql_insert_message){

                if($image_size > 20000000){
                    $message[] = 'Image size is too large.';
                }
                else{
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $message[] = 'Message sent successfully!';
                }
            }
            else{
                $message[] = 'Message not sent!';
    
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Custom Order</title>

        <!--font awesome cdnjs link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <!--custom css file link -->
        <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    </head>

    <body>

    <?php  
        include_once('./header.php');
    ?>

        <section class="heading">
            <h3>custom order</h3>
            <p> <a href="index.php">home</a> / custom </p>
        </section>

        <section class="custom">

            <form action="" method="POST" enctype="multipart/form-data">
                <h3>send us message!</h3>
                <input type="text" name="name" placeholder="enter your name" class="box" required> 
                <input type="email" name="email" placeholder="enter your email" class="box" required>
                <input type="number" name="number" placeholder="enter your number" class="box" required>
                <textarea name="message" class="box" placeholder="enter your message" required cols="30" rows="10"></textarea>
                <p>Select an image for design reference:</p>
                <input type="file" id="image-files" name="image" accept="image/jpg, image/jpeg, image/png" class="box"><br><br>
                <input type="submit" value="submit custom order" name="send" class="btn">
            </form>

        </section>


    <?php 
        include_once('./footer.php');
    ?>

    <script src="./js/script.js"></script>
    </body>
</html>