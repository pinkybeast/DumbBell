<?php
    include_once('./config/config.php');
    include_once('./header.php');

    $customer_id = $_SESSION['customer_id'];

    if(!isset($customer_id)){
        header('location:login.php');
    }

    if(isset($_POST['send'])){

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $msg = mysqli_real_escape_string($conn, $_POST['message']);
    
        $sql_select_message = mysqli_query($conn, "SELECT * FROM messages WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');
    
        if(mysqli_num_rows($sql_select_message) > 0){
            $message[] = 'Message sent already!';
        }
        else{
            $sql_insert_message = mysqli_query($conn, "INSERT INTO messages(customer_id, name, email, number, message) VALUES('$customer_id', '$name', '$email', '$number', '$msg')") or die('query failed');
            
            if($sql_insert_message){
                $message[] = 'Message sent successfully!';
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
        <title>Review | DumbBell</title>

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
            <h3>Let Us Know What You Have In Mind!</h3>
            <p> <a href="home.php">home</a> / message us! </p>
        </section>

        <section class="custom">

            <form action="" method="POST" enctype="multipart/form-data">
                <h3>Feel Free To Type Anything!</h3>
                <input type="text" name="name" placeholder="enter your name" class="box" required> 
                <input type="email" name="email" placeholder="enter your email" class="box" required>
                <input type="number" name="number" placeholder="enter your number" class="box" required>
                <textarea name="message" class="box" placeholder="enter your message" required cols="30" rows="10"></textarea>
                <br><br>
                <input type="submit" value="send message" name="send" class="btn">
            </form>

        </section>


    <?php 
        include_once('./footer.php');
    ?>

    <script src="./js/script.js"></script>
    </body>
</html>