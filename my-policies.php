<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
  if(!isset($_SESSION['first_name']) && !isset($_SESSION['customer_id'])) {
    header('Location: login.php');
}

?>

<?php
    if(isset($_GET['vehicle_id'])) {
        //get customer id from session 
        $vehicle_id = $_GET['vehicle_id'];
        
        //get  customer's vehicle details
        $query = "SELECT * FROM Policy WHERE vehicle_id = '$vehicle_id' ";

        $result  = mysqli_query($connection, $query) ;

        $policy_list = '';

        while($row = mysqli_fetch_array($result)) {
            $policy_list .= "<tr>";
            $policy_list .= "<td>" . $row['policy_id'] . "</td>";
            $policy_list .= "<td>" . $row['vehicle_id'] . "</td>";
            $policy_list .= "<td>" . $row['coverage_type'] . "</td>";
            $policy_list .= "<td>" . $row['start_date'] . "</td>";
            $policy_list .= "<td>" . $row['end_date'] . "</td>";
            $policy_list .= "</tr>";
        }
    }
?>

<?php
    if(isset($_POST['submit'])) {

        $messages = array();

        if(!isset($_POST['vehicle_id']) || strlen(trim($_POST['vehicle_id'])) < 1) {
            $messages['vehicle_id'] = "vehicle id is required";
        }
        
        if(!isset($_POST['contact_no']) || strlen(trim($_POST['contact_no'])) < 1) {
            $messages['contact_no'] = "contact no is required";
        }

        if(!isset($_POST['duration']) || strlen(trim($_POST['duration'])) < 1) {
            $messages['duration'] = "duration is required";
        }

        if(!isset($_POST['insurance_category']) || strlen(trim($_POST['insurance_category'])) < 1) {
            $messages['insurance_category'] = "insurance category is required";
        } 
        
        if(!isset($_POST['coverage_type']) || strlen(trim($_POST['coverage_type'])) < 1) {
            $messages['coverage_type'] = "coverage type is required";
        } 
        
        if(!isset($_POST['installment_type']) || strlen(trim($_POST['installment_type'])) < 1) {
            $messages['installment_type'] = "installment type is required";
        } 

        if (empty($messages)) {
            $vehicle_id =  mysqli_real_escape_string($connection, $_POST['vehicle_id']);
            $contact_no =  mysqli_real_escape_string($connection, $_POST['contact_no']);
            $duration =  mysqli_real_escape_string($connection, $_POST['duration']);
            $insurance_category =  mysqli_real_escape_string($connection, $_POST['insurance_category']);
            $coverage_type =  mysqli_real_escape_string($connection, $_POST['coverage_type']);
            $installment_type =  mysqli_real_escape_string($connection, $_POST['installment_type']);

            $query_9 =  "INSERT INTO Renew_policy(vehicle_id,contact_no,duration,insurance_category,coverage_type,installment_type)
            VALUES ('$vehicle_id','$contact_no','$duration','$insurance_category','$coverage_type', '$installment_type')";

            $result = mysqli_query($connection,  $query_9);

            if($result) {
                $_SESSION['success_message'] = "Renew policy Request successfully added!";
                header("Location: my-policies.php?vehicle_id=". $vehicle_id);
                exit();
            } else{
                echo "Error: " .  $query_9 . "<br>" . mysqli_error($connection);
            } 
        }
    }     
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments | Your Road to Safety and Savings</title>
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
                    <li><a href="my-vehicles.php">Vehicles</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li><a href="my-policies.php">Policies</a></li>
                </ul>

                <?php
                    if(isset($_SESSION['success_message'])) {
                        echo '<div class="flash-message"><i class="fa-solid fa-check"></i><p>' . $_SESSION['success_message'] . '</p></div>';
                        unset($_SESSION['success_message']);
                    }
                 ?>



                <h2>Policies</h2>
                <table>
                    <tr>
                        <th>Policy ID</th>
                        <th>Vehicle ID</th>
                        <th>Coverage Type</th>
                        <th>Registration date</th>
                        <th>Expire Date</th>
                    </tr>

                    <tbody>
                        <?php echo $policy_list; ?>
                    </tbody>

                </table>


                <h4 class="text-center">Renew Policies Form</h4>

                <form action="my-policies.php?vehicle_id=<?php echo $_GET['vehicle_id'];  ?>" method="post">
                    <div class="flex flex-row form">
                            <div class="form-item flex flex-col">
                                <label for=""> Current Vehicle ID <span class="required">*</span></label>
                                <input type="text" name="vehicle_id" placeholder="Current  Vehicle ID" value="<?php echo $_GET['vehicle_id']; ?>" readonly>
                                <?php
                                    if(isset($messages) && !empty($messages['vehicle_id'])) {
                                        echo '<div class="error required">'.$messages['vehicle_id'].'</div>';
                                    }
                                ?>
                            </div>

                            <div class="form-item flex flex-col">
                                <label for="">Contact Number <span class="required">*</span></label>
                                <input type="number" name="contact_no" placeholder="contact number">
                                <?php
                                    if(isset($messages) && !empty($messages['contact_no'])) {
                                        echo '<div class="error required">'.$messages['contact_no'].'</div>';
                                    }
                                ?>
                            </div>
                    </div>

                    <div class="flex flex-row form">
                            <div class="form-item flex flex-col">
                                    <label for="">Duration<span class="required">*</span></label>
                                    <select name="duration">
                                        <option value="Select Coverage Type">Select Duration</option>
                                        <option value="6 months">6 months</option>
                                        <option value="1 year">1 year</option>
                                        <option value="2 year">2 year</option>
                                    </select>
                                    <?php
                                            if(isset($messages) && !empty($messages['duration'])) {
                                                echo '<div class="error required">'.$messages['duration'].'</div>';
                                            }
                                        ?>
                            </div>

                            <div class="form-item flex flex-col">
                                    <label for="">Motor Insurance category<span class="required">*</span></label>
                                    <select name="insurance_category">
                                        <option value="volvo">Select category</option>
                                        <option value="Car Insurance ">Car Insurance </option>
                                        <option value="Three-Wheeler ">Three-Wheeler Insurance</option>
                                        <option value="Motorcycle Insurance">Motorcycle Insurance</option>
                                        <option value="Commercial Vehicle Insurance">Commercial Vehicle Insurance</option>
                                    </select>
                                    <?php
                                        if(isset($messages) && !empty($messages['insurance_category'])) {
                                            echo '<div class="error required">'.$messages['insurance_category'].'</div>';
                                        }
                                    ?>
                            </div>
                    </div>

                    <div class="flex flex-row form">
                            <div class="form-item flex flex-col">
                                <label for="">Coverage Type<span class="required">*</span></label>
                                <select name="coverage_type">
                                    <option value="Select Coverage Type">Select Coverage Type</option>
                                    <option value="Third Party">Third Party</option>
                                    <option value="Comprehensive">Comprehensive</option>
                                </select>
                                <?php
                                    if(isset($messages) && !empty($messages['coverage_type'])) {
                                        echo '<div class="error required">'.$messages['coverage_type'].'</div>';
                                    }
                                ?>
                            </div>

                            <div class="form-item flex flex-col">
                                    <label for="">installment Type<span class="required">*</span></label>
                                    <select name="installment_type">
                                        <option value="Select Coverage Type">Select installment Type</option>
                                        <option value="Monthly Payment">Monthly Payment</option>
                                        <option value="Quarterly Payment">Quarterly Payment</option>
                                        <option value="Semi-Annual Payment">Semi-Annual Payment</option>
                                        <option value="Annual Payment">Annual Payment</option>
                                    </select>
                                    <?php
                                        if(isset($messages) && !empty($messages['installment_type'])) {
                                            echo '<div class="error required">'.$messages['installment_type'].'</div>';
                                        }
                                    ?>
                            </div>
                    </div>

                    <div>
                        <div class="flex" style="margin-top: 10px">
                            <button type="submit" name="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                            <button type="reset" class="btn btn-primary"><a href="my-policies.php">Reset</a></button>
                        </div>
                </form>

            </div>


        </div>








    </div>
    </div>
    </div>

    <?php require_once('inc/footer.php') ?>
</body>

</html>
<?php mysqli_close($connection); ?>