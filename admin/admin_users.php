<?php
    include_once('../config/config.php');
    session_start();

    $admin_id = $_SESSION['admin_id'];

    if(!isset($admin_id)){
        header('location:../login.php');
    }

    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];

        mysqli_query($conn, "DELETE FROM users WHERE id = '$delete_id'; ") or die('Query failed');

        header('location:admin_users.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Users | Admin</title>

        <!--font awesome cdnjs link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <!--custom admin css file link with force reload to avoid caching-->
        <link rel="stylesheet" href="../css/admin_style.css?v=<?php echo time(); ?>">
        <link rel="icon" href="../images/logo-only.png">
    </head>
    
    <body>

    <?php include './admin_header.php'; ?>

        <section class="users">

            <h1 class="title">User Accounts</h1>

            <div class="box-container">
                <?php
                $sql_select_users = mysqli_query($conn, "SELECT * FROM users;") or die('Query Failed');

                if(mysqli_num_rows($sql_select_users) > 0){
                    while($fetch_users = mysqli_fetch_assoc($sql_select_users)){
                ?>

                <div class="box">
                    <p>Name: <span><?php echo $fetch_users['name']; ?></span></p>
                    <p>Email: <span><?php echo $fetch_users['email']; ?></span></p>
                    <p>User Type: <span style="font-weight:700; color:<?php if($fetch_users['user_type'] == 'admin'){ echo 'var(--red)'; } ?>"><?php echo $fetch_users['user_type']; ?></span></p>
                    <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('Delete this user?');" class="delete-btn">Delete</a>
                </div>

                <?php
                    }
                }
                else{
                    $message[] = 'No customers registered yet.';
                }

                ?>
            </div>

        </section>
        

    <!-- custom js file link -->
    <script src="../js/admin_script.js"></script>

    </body>
</html>