<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
    if(!isset($_SESSION[name]) && !isset($_SESSION['csr_id'])) {
        header('Location: csr-login.php');
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
    
</head>

<body>
    <?php require_once('inc/header.php') ?>

    <div class="flex">

        <?php require_once('inc/csr-sidebar.php') ?>

       <div class="flex flex-col content-wrapper">
            <ul class="bredcrumb">
                <li>Dashboard</li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li><a href="csr-tickets.php">Customer Service Representative Dashboard</a></li>
            </ul>

            <div class="content">
                content here
               
            </div>
       </div>
    </div>

    <?php require_once('inc/footer.php') ?>

    

    
                

   
</body>

</html>