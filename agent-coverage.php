<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
    if(!isset($_SESSION['first_name'])) {
        header('Location: agent-login.php');
    }
?>

<?php
    $agentId = $_SESSION['agent_id'];

    $query = "SELECT * FROM Customer WHERE agent_id = '$agentId' ";

    $result = mysqli_query($connection, $query);

    $customer_list = '';

    while($row = mysqli_fetch_array($result)) {
        $customer_list .= "<tr>";
        $customer_list .= "<td>" . $row['customer_id'] . "</td>";
        $customer_list .= "<td>" . $row['first_name'] . "</td>";
        $customer_list .= "<td>" . $row['last_name'] . "</td>";
        $customer_list .= "<td>" . $row['nic'] . "</td>";
        $customer_list .= "<td>" . $row['email'] . "</td>";
        $customer_list .= "</tr>";
    }

    $customer_count = 10;
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
                <li><a href="agent-coverage.php">Coverage</a></li>
            </ul>

            <div class="flex flex-col">
                <div class="flex justify-content-between">

                    <div class="form-item flex flex-col text-center flex-border">
                        <h3><?php echo $customer_count; ?></h3>
                        <i class="fa-solid fa-users"></i>
                        <p>Assign Customers</p>
                    </div>

                    <div class="form-item flex flex-col text-center flex-border">
                        <i class="fa-solid fa-eye"></i>
                        <p>Total Accidents</p>
                    </div>

                    <div class="form-item flex flex-col text-center flex-border">
                        <i class="fa-solid fa-calendar-days"></i>
                        <p>Expire</p>
                    </div>

                    <div class="flex flex-col text-center">
                        <div class="form-item flex flex-col text-center flex-border">
                            <i class="fa-solid fa-calendar-days"></i>
                            <p>Expire Soon</p>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <h2 class="m-10">Customer Details</h2>
                    <table>
                        <tr>
                            <th>Customer Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>NIC</th>
                            <th>Email</th>
                        </tr>

                        <tbody>
                            <?php echo $customer_list; ?>
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