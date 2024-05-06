<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>

<?php
if(!isset($_SESSION['name']) && !isset($_SESSION['csr_id'])) {
    header('Location: csr-login.php');
    exit; // Add exit to stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Your Road to Safety and Savings</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Add Font Awesome CSS link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <?php require_once('inc/header.php'); ?>

    <div class="flex">

        <?php require_once('inc/csr-sidebar.php'); ?>

        <div class="flex flex-col content-wrapper">
            <ul class="breadcrumb">
                <li>Dashboard</li>
                <li><i class="fas fa-chevron-right"></i></li> <!-- Change class to fas for Font Awesome solid icons -->
                <li><a href="csr-tickets.php">Customer Service Representative Dashboard</a></li>
            </ul>

            <div class="content">
                <!-- Image related to vehicle insurance management -->
                <img src="C:\xampp\htdocs\Vehicle-Insurance-Management-System\img\motorbike.jpg" alt="Vehicle Insurance Management" width="400">
                <h2>Welcome to Your Dashboard</h2>
                <p>Here you can manage various aspects of your role as a Customer Service Representative.</p>

                <!-- Dashboard options -->
                <ul>
                    <li><a href="my-profile.php">My Profile</a></li>
                    <li><a href="client-list.php">Client List</a></li>
                    <li><a href="tickets.php">Tickets</a></li>
                </ul>
            </div>
        </div>
    </div>

    <?php require_once('inc/footer.php'); ?>
</body>

</html>
