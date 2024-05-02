<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
    if(!isset($_SESSION['first_name'])) {
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Your Road to Safety and Savings</title>
    <link rel="stylesheet" href="css/style.css">
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/72fb3712df.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once('inc/header.php') ?>

    <div class="flex">
        <div class="nav">
            <?php require_once('inc/customer-dash.php') ?>
        </div>


        <div class="flex flex-col content-wrapper">

            <ul class="bredcrumb">
                <li><a href="my-account-dashboard.php">Dashboard</a></li>
                <!-- <li><i class="fa-solid fa-chevron-right"></i></li> -->

            </ul>

            <div class="content">
                <div class="owl-carousel">
                </div>

                <div>
                    <img src="img/accident.jpg" alt="">
                    <h2>Whereever you go , our insurance goes the ectra mile</h2>
                </div>


            </div>

        </div>
    </div>

    <?php require_once('inc/footer.php') ?>
</body>

</html>