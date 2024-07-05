<?php
    include_once('./config/config.php');
    session_start();

    if(isset($_POST['submit'])){
        
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        $sql_select_users = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'") or die('Query Failed');

        if(mysqli_num_rows($sql_select_users) > 0){
            $row = mysqli_fetch_assoc($sql_select_users);

            if($row['user_type'] == 'admin'){
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_email'] = $row['email'];
                header('location:admin/admin_page.php');
            }
            else if($row['user_type'] == 'customer'){
                $_SESSION['customer_id'] = $row['id'];
                $_SESSION['customer_name'] = $row['name'];
                $_SESSION['customer_email'] = $row['email'];
                header('location:index.php');
            }
        }
        else{
           $message[] = 'Incorrect email or password!';
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login | DumbBell</title>

        <!--font awesome cdnjs link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <!--custom css file link -->
        <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
        <link rel="icon" href="images/logo-only.png">
    </head>

    <body>

    <?php
        if(isset($message)){
            foreach($message as $message){
                echo '<div class="message"><span>'.$message.'</span><i class="fas fa-times" onclick="this.parentElement.remove();"></i></div>';
            }
        }
    ?>

        <div class="form-container">

            <form action="" method="post">
                <h3>login now</h3>
                <input type="email" name="email" placeholder="Enter your email address" required class="box">
                <input type="password" name="password" placeholder="Enter your password" required class="box">
                <input type="submit" name="submit" value="login now" class="btn">
                <p>Don't have an account? <a href="register.php">Register Here</a></p>
            </form>
        </div>
    </body>
</html>