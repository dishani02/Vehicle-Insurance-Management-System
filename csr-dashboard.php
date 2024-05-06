<<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
    if(!isset($_SESSION['first_name']) && !isset($_SESSION['csr_id'])) {
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
    <script src="https://kit.fontawesome.com/72fb3712df.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once('inc/header.php') ?>

    <div class="flex">

        <?php require_once('inc/csr-sidebar.php') ?>

       <div class="flex flex-col content-wrapper">
            <ul class="bredcrumb">
                <li>Dashboard</li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li><a href="agent-add-customer.php">CSR Dashboard</a></li>
            </ul>

            <div class="content">
                content here
                <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
            </div>
       </div>
    </div>

    <?php require_once('inc/footer.php') ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>



   
</body>

</html>