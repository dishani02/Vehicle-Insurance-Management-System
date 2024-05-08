

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Claim manager | Your Road to Safety and Savings</title>
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/72fb3712df.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require_once('inc/header.php') ?>

    <div class="container">
        <div class="login flex">

            <form action="claim-manager-login.php" method="post">

                <div class="flex flex-col">
                    <?php
                        if(isset($errors) && !empty($errors['common'])) {
                        echo '<div class="error required">'.$errors['common'].'</div>';
                        }
                    ?>
                </div>

                <div class="flex flex-col welcome">
                    <h3>Hello, there,</h3>
                    <p>Please login to continue</p>
                </div>
                
                <div class="flex flex-col">
                    <label for="">E-mail <span class="required">*</span></label>
                    <input type="email" name="email" placeholder="E-mail address" value="ashanjay@gmail.com">
                    <?php
                    if(isset($errors) && !empty($errors['email'])) {
                        echo '<div class="error required">'.$errors['email'].'</div>';
                    }
                ?>
                </div>

                <div class="flex flex-col">
                    <label for="">Password <span class="required">*</span></label>
                    <input type="password" name="password" placeholder="Password" value="ashan123">
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