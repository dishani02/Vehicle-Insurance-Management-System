<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
    if(!isset($_SESSION['first_name']) && !isset($_SESSION['agent_id'])) {
        header('Location: agent-login.php');
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

        <?php require_once('inc/agent-sidebar.php') ?>

        <div class="flex flex-col content-wrapper">
            <ul class="bredcrumb">
                <li>Dashboard</li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li><a href="agent-add-customer.php">Agent Dashboard</a></li>
            </ul>

            <div class="content">
                <div class="flex flex-row m-10">
                    <div>
                        <img src="img/agents.jpeg" alt="agent" width="800" height="500">
                    </div>

                    <div class="flex flex-col content-wrapper">
                        <h2>DRIVE PEAK AGENTS </h2>
                        <ul>
                            <li>DrivePeak agents ensure quick and hassle-free claims processing for our customers.</li>
                            <li>DrivePeak agents ensure quick and hassle-free claims processing for our customers.</li>
                            <li>DrivePeak agents are accessible and responsive, ready to assist customers whenever they
                                need help.</li>
                            <li>We are dedicated to delivering excellence in every interaction and transaction.</li>
                        </ul>

                        <div class="content-wrapper">
                            <div class="content-wrapper">
                                <h3>"Your solution's guardian angel"</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once('inc/footer.php') ?>
</body>

</html>