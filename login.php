<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php

    if(isset($_SESSION['first_name'])) {
        header('Location: index.php');
    }

    if(isset($_POST['submit'])) {

        $errors = array();

        if(!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1) {
            $errors['email'] = "E-mail is required";
        }

        if(!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1) {
            $errors['password'] = "Password is required";
        }

        if(empty($errors)) {

            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $password = mysqli_real_escape_string($connection, $_POST['password']);
            $hashed_password = sha1($password);

            $query = "SELECT * FROM customer WHERE email = '{$email}' AND password = '{$hashed_password}'";


            $result = mysqli_query($connection, $query);

            if($result) {
                if (mysqli_num_rows($result) == 1) {

                    $user = mysqli_fetch_assoc($result);

                    $_SESSION['customer_id'] = $user['customer_id'];
                    $_SESSION['first_name'] = $user['first_name'];

                    echo $user['first_name'];

                    
                    header('Location: my-account-dashboard.php'); 
                }
                else{
                    $errors['common'] = 'Invalid email / password';
                }
            } else {
                $errors['common'] = "Database error!";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Your Road to Safety and Savings</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require_once('inc/header.php') ?>

    <div class="container">

    <?php
        if(isset($errors) && !empty($errors['common'])) {
           echo '<div class="error required">'.$errors['common'].'</div>';
        }
    ?>

        <form action="login.php" method="post">
            <div class="flex flex-col">
                <label for="">E-mail <span class="required">*</span></label>
                <input type="email" name="email" placeholder="E-mail address" value="dishani@gmail.com">
                <?php
                    if(isset($errors) && !empty($errors['email'])) {
                        echo '<div class="error required">'.$errors['email'].'</div>';
                    }
                ?>
            </div>

            <div class="flex flex-col">
                <label for="">Password <span class="required">*</span></label>
                <input type="password" name="password" placeholder="Password" value="123">
                <?php
                    if(isset($errors) && !empty($errors['password'])) {
                        echo '<div class="error required">'.$errors['password'].'</div>';
                    }
                ?>
            </div>

            <div class="flex flec-col">
                <button type="submit" name="submit" class="btn-primary">Login</button>
            </div>
        </form>
    </div>

    <?php require_once('inc/footer.php') ?>
</body>

</html>