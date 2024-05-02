<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
    //get customer id from session 
    $customerId = $_SESSION['customer_id'];


    //get  customer's vehicle details
    $query = "SELECT * FROM Vehicle WHERE customer_id = '$customerId' ";

    $result  = mysqli_query($connection, $query) ;

    $vehicle_list = '';

    while($row = mysqli_fetch_array($result)) {
        $vehicle_list .= "<tr>";
        $vehicle_list .= "<td>" . $row['vehicle_id'] . "</td>";
        $vehicle_list .= "<td>" . $row['chassis_no'] . "</td>";
        $vehicle_list .= "<td>" . $row['year'] . "</td>";
        $vehicle_list .= "<td>" . $row['model'] . "</td>";
        $vehicle_list .= "</tr>";
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claims | Your Road to Safety and Savings</title>
    <link rel="stylesheet" href="css/style.css">
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/72fb3712df.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once('inc/header.php') ?>

    <div class="container">
        <div class="flex">
            <div class="nav">
                <?php require_once('inc/customer-dash.php') ?>
            </div>

            <div class="flex flex-col content-wrapper">

                <ul class="bredcrumb">
                    <li><a href="my-account-dashboard.php">Dashboard</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li><a href="my-vehicles.php">My vehicles</a></li>
                </ul>

                <div class="content">
                    <h2>My vehicles</h2>
                    <table>
                        <tr>
                            <th>Registration Number</th>
                            <th>Chassis Number</th>
                            <th>Manmanufactured year</th>
                            <th>Model</th>

                        </tr>

                        <tbody>
                            <?php echo $vehicle_list; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php require_once('inc/footer.php') ?>
</body>

</html>

<?php mysqli_close($connection); ?>