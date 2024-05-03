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
        $vehicle_list .= "<td>" . $row['policy_id'] . "</td>";
        $vehicle_list .= "</tr>";
    }

    
?>

<?php

    if(isset($_POST['submit'])) {

        $messages = array();

        if(!isset($_POST['vehicle_id']) || strlen(trim($_POST['vehicle_id'])) < 1) {
            $messages['vehicle_id'] = "Registration Number is required";
        } 
        
        
        if(!isset($_POST['chassis_no']) || strlen(trim($_POST['chassis_no'])) < 1) {
            $messages['chassis_no'] = "Chassis Number is required";
        } 
        
        if(!isset($_POST['coverage_type']) || strlen(trim($_POST['coverage_type'])) < 1) {
            $messages['coverage_type'] = "Coverage Type is required";
        } 

        if(!isset($_POST['year']) || strlen(trim($_POST['year'])) < 1) {
            $messages['year'] = "Manufactured year is required";
        }

        if(!isset($_POST['model']) || strlen(trim($_POST['model'])) < 1) {
            $messages['model'] = "Model is required";
        }

        //TODO: policy id handle

        if(empty($messages)) {

            $vehicle_id = mysqli_real_escape_string($connection, $_POST['vehicle_id']);
            $chassis_no = mysqli_real_escape_string($connection, $_POST['chassis_no']);
            $coverage_type = mysqli_real_escape_string($connection, $_POST['coverage_type']);
            $year = mysqli_real_escape_string($connection, $_POST['year']);
            $model = mysqli_real_escape_string($connection, $_POST['model']);

            $query = "INSERT INTO Vehicle VALUES ($customerId, $vehicle_id,  1,  '$coverage_type', '$model', '$chassis_no', $year)";

            if (mysqli_query($connection,  $query)) {
                $messages['common'] = "Vehicle successfully added!";
            } else {
                echo "Error: " .  $query . "<br>" . mysqli_error($connection);
            } 
        }   
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

                <?php
                if(isset($messages) && !empty($messages['common'])) {
                    echo '<div class="flash-message">
                            <i class="fa-solid fa-check"></i>
                            <p>'.$messages['common'].'</p>
                        </div>';
                    }
                ?>


                <div class="content">

                    <div class="flex flex-col">

                    </div>

                    <div>
                        <h2>My vehicles</h2>
                        <table>
                            <tr>
                                <th>Registration Number</th>
                                <th>Chassis Number</th>
                                <th>Manufactured year</th>
                                <th>Model</th>
                                <th>Policy ID</th>

                            </tr>

                            <tbody>
                                <?php echo $vehicle_list; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once('inc/footer.php') ?>
</body>

</html>

<?php mysqli_close($connection); ?>