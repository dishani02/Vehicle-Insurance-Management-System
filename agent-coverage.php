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

    <div class="container">
        <div class="flex">
            <?php require_once('inc/agent-sidebar.php') ?>

            <div class="flex flex-col content-wrapper">

                <ul class="bredcrumb">
                    <li>Dashboard</li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li><a href="agent-coverage.php">Coverage</a></li>
                </ul>

                <div class="flex flex-col content-wrapper">
                    <div class="flex justify-content-between">
                        <div class="flex flex-col text-center">
                            <i class="fa-solid fa-users"></i>
                            <p>Assign Customers</p>
                        </div>
                        <div class="flex flex-col text-center">
                            <i class="fa-solid fa-eye"></i>
                            <p>Total Accidents</p>
                        </div>
                        <div class="flex flex-col text-center">
                            <i class="fa-solid fa-calendar-days"></i>
                            <p>Expire</p>
                        </div>
                        <div class="flex flex-col text-center">
                            <i class="fa-solid fa-calendar-days"></i>
                            <p>Expire Soon</p>
                        </div>
                    </div>
    
                </div>
            </div>

            
        </div>
    </div>

    <?php require_once('inc/footer.php') ?>
</body>

</html>