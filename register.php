<?php
    include_once('./config/config.php');

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
        $user_type = $_POST['user_type'];

        $sql_select_users = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'") or die('Query Failed');

        if(mysqli_num_rows($sql_select_users) > 0){
            $message[] = 'User already exists!';
        }
        else{
            if($password != $cpassword){
                $message[] = 'Your passwords don\'t match!';

            }
            else{
                mysqli_query($conn, "INSERT INTO users(name, email, password, user_type) VALUES('$name','$email','$cpassword','$user_type')") or die('Query Failed');
                $message[] = 'Registered Successfully!';
                header('location:login.php');
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register | DumbBell</title>

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
                echo '<div class="message">
                    <span>'.$message.'</span>
                    <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                </div>';
            }
        }
    ?>

        <div class="form-container">
            <form action="" method="post">
                <h3>register now</h3>
                <input type="text" name="name" placeholder="Enter your name" required class="box">
                <input type="email" name="email" placeholder="Enter your email address" required class="box">
                <input type="password" name="password" placeholder="Enter your password" required class="box">
                <input type="password" name="cpassword" placeholder="Confirm your password" required class="box">
                <select name="user_type" class="box">
                    <option value="customer">Customer</option>
                    <option value="admin">Admin</option>
                </select>
                <input type="submit" name="submit" value="register now" class="btn">
                <p>Already have an account? <a href="login.php">Login Here</a></p>
            </form>
        </div>
    </body>
</html>