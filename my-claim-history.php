<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
    //get customer id from session 
   $customerId = $_SESSION['customer_id'];


    //get  customer's vehicle details
    $query = "SELECT * FROM Payment WHERE customer_id = '$customerId' ";
    $query_1 = "SELECT * FROM Claim WHERE customer_id = '$customerId' ";

    $result  = mysqli_query($connection, $query) ;
    $result_1  = mysqli_query($connection, $query_1) ;


    $Payment_list = '';

    while($row = mysqli_fetch_array($result)) {
        $Payment_list .= "<tr>";
        $Payment_list .= "<td>" . $row['payment_id'] . "</td>";
        $Payment_list .= "<td>" . $row['admin_id'] . "</td>";
        $Payment_list .= "<td>" . $row['customer_id'] . "</td>";
        $Payment_list .= "<td>" . $row['vehicle_id'] . "</td>";
        $Payment_list .= "<td>" . $row['amount'] . "</td>";
        $Payment_list .= "<td>" . $row['payment_date'] . "</td>";
        $Payment_list .= "<td>" . $row['method'] . "</td>";
        $Payment_list .= "<td>" . $row['status'] . "</td>";
        $Payment_list .= "</tr>";
    }

      $Claim_list = '';

    while($row = mysqli_fetch_array($result_1)) {
        $Claim_list .= "<tr>";
        $Claim_list .= "<td>" . $row['manager_id'] . "</td>";
        $Claim_list .= "<td>" . $row['vehicle_id'] . "</td>";
        $Claim_list .= "<td>" . $row['customer_id'] . "</td>";
        $Claim_list .= "<td>" . $row['claim_id'] . "</td>";
        $Claim_list .= "<td>" . $row['amount'] . "</td>";
        $Claim_list .= "<td>" . $row['issued_date'] . "</td>";
        $Claim_list .= "<td>" . $row['status'] . "</td>";
        $Claim_list .= "</tr>";
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
            
            <?php require_once('inc/customer-dash.php') ?>

            <div class="flex flex-col content-wrapper">

                <ul class="bredcrumb">
                    <li><a href="my-account-dashboard.php">Dashboard</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li><a href="my-claim-history.php">Claims & Payments History</a></li>
                </ul>

                <?php
                if(isset($messages) && !empty($messages['common'])) {
                    echo '<div class="flash-message">
                            <i class="fa-solid fa-check"></i>
                            <p>'.$messages['common'].'</p>
                        </div>';
                    }
                ?>

            <div class="content">
                <h2>Payment History</h2>
                <table>
                    <tr>
                        <th>Payment ID</th>
                        <th>Admin ID</th>
                        <th>Customer ID</th>
                        <th>Vehicle ID</th>
                        <th>Amount</th>
                        <th>payment_date</th>
                        <th>Method</th>
                        <th>Status</th>
                        
                    </tr>

                    <tbody>
                    <?php echo $Payment_list; ?>
                    </tbody>

                   
                </table>

                <h2>Claims History</h2>
                <table>
                    <tr>
                        <th>Manager ID</th>
                        <th>Vehicle ID</th>
                        <th>Customer ID</th>
                        <th>Claim ID</th>
                        <th>Amount</th>
                        <th>Issued Date</th>
                        <th>Status</th>
                        
                    </tr>

                    <tbody>
                    <?php echo $Claim_list; ?>
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