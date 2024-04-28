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
                        <div class="form-item flex flex-col text-center flex-border">
                            <i class="fa-solid fa-users"></i>
                            <p>Assign Customers</p>
                        </div>
<<<<<<< HEAD
                        
                        <div class="flex flex-col text-center">
=======
                        <div class="form-item flex flex-col text-center flex-border">
>>>>>>> 0ac99e69217acd30af98cf479a2c75d045fae674
                            <i class="fa-solid fa-eye"></i>

                            <p>Total Accidents</p>
                        </div>
                        <div class="form-item flex flex-col text-center flex-border">
                            <i class="fa-solid fa-calendar-days"></i>
                            <p>Expire</p>
                        </div>
                        <div class="form-item flex flex-col text-center flex-border">
                            <i class="fa-solid fa-calendar-days"></i>
                            <p>Expire Soon</p>
                        </div>
                    </div>

                    <div class="content">

                        <table>
                            <tr>
                                <th>Vender Name</th>
                                <th>Vehicle ID</th>
                                <th>Type</th>
                                <th>start-date</th>
                                <th>End-date</th>
                                <th>Status</th>

                            </tr>

                            <tr>
                                <td>K.H.Saman Soysa</td>
                                <td>ty65</td>
                                <td>full</td>
                                <td>2012/08/29</td>
                                <td>2013/08/29</td>
                                <td>Active</td>
                            </tr>

                            <tr>
                                <td>K.H.Saman Soysa</td>
                                <td>ty65</td>
                                <td>full</td>
                                <td>2012/08/29</td>
                                <td>2013/08/29</td>
                                <td>Active</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <?php require_once('inc/footer.php') ?>
</body>

</html>