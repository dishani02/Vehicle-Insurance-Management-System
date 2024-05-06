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
           

            $query = "SELECT * FROM csr WHERE email = '{$email}' AND password = '{$password}'";


            $result = mysqli_query($connection, $query);

            if($result) {
                if (mysqli_num_rows($result) == 1) {

                    $user = mysqli_fetch_assoc($result);

                    $_SESSION['csr_id'] = $user['csr_id'];
                    $_SESSION['first_name'] = $user['name'];
                    
                    header('Location: csr-dashboard.php'); 
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
    <title>CSR Login | Your Road to Safety and Savings</title>
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/72fb3712df.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require_once('inc/header.php') ?>

    <div class="container">
        <div class="login flex">

            <form action="csr-login.php" method="post">

                <div class="flex flex-col">
                    <?php
                        if(isset($errors) && !empty($errors['common'])) {
                        echo '<div class="error required">'.$errors['common'].'</div>';
                        }
                    ?>
                </div>

                <div class="flex flex-col welcome">
                    <h3>Hello there !</h3>
                    <p>Please login to continue</p>
                </div>
                
                <div class="flex flex-col">
                    <label for="">E-mail <span class="required">*</span></label>
                    <input type="email" name="email" placeholder="E-mail address" value="hafsarifai01@gmail.com">
                    <?php
                    if(isset($errors) && !empty($errors['email'])) {
                        echo '<div class="error required">'.$errors['email'].'</div>';
                    }
                ?>
                </div>

                <div class="flex flex-col">
                    <label for="">Password <span class="required">*</span></label>
                    <input type="password" name="password" placeholder="Password" value="ot7">
                    <?php
                    if(isset($errors) && !empty($errors['password'])) {
                        echo '<div class="error required">'.$errors['password'].'</div>';
                    }
                ?>
                </div>

                <div class="flex forget-password">
                    <p>Forgot Password ?</p>
                    <a href="#">Reset Here</a>
                </div>

                <div class="flex flex-col">
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>

    <?php require_once('inc/footer.php') ?>
</body>

</html>

<?php mysqli_close($connection); ?>