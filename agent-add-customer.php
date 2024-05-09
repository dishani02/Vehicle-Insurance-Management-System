<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
    if(!isset($_SESSION['first_name']) && !isset($_SESSION['agent_id'])) {
        header('Location: agent-login.php');
    }
?>

<?php
    if(isset($_POST['submit'])) {

        $messages = array();

        if(!isset($_POST['first_name']) || strlen(trim($_POST['first_name'])) < 1) {
            $messages['first_name'] = "First Name is required";
        }
        
        if(!isset($_POST['last_name']) || strlen(trim($_POST['last_name'])) < 1) {
            $messages['last_name'] = "Last Name is required";
        }
        
        if(!isset($_POST['nic']) || strlen(trim($_POST['nic'])) < 1) {
            $messages['nic'] = "NIC is required";
        } 
        
        if(!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1) {
            $messages['email'] = "Email is required";
        }
        
        if(!isset($_POST['contact_no']) || strlen(trim($_POST['contact_no'])) < 1) {
            $messages['contact_no'] = "Contact Number is required";
        } 

        if(!isset($_POST['home_no']) || strlen(trim($_POST['home_no'])) < 1) {
            $messages['home_no'] = "Home Number is required";
        } 

        if(!isset($_POST['street']) || strlen(trim($_POST['street'])) < 1) {
            $messages['street'] = "Street is required";
        } 

        if(!isset($_POST['city']) || strlen(trim($_POST['city'])) < 1) {
            $messages['city'] = "City is required";
        }

        
        if(!isset($_POST['vehicle_id']) || strlen(trim($_POST['vehicle_id'])) < 1) {
            $messages['vehicle_id'] = "Registration Number is required";
        } 

        if(!isset($_POST['chassis_no']) || strlen(trim($_POST['chassis_no'])) < 1) {
            $messages['chassis_no'] = "Chassis number is required";
        } 
        
        if(!isset($_POST['year']) || strlen(trim($_POST['year'])) < 1) {
            $messages['year'] = "Year is required";
        }

        if(!isset($_POST['model']) || strlen(trim($_POST['model'])) < 1) {
            $messages['model'] = "Model is required";
        } 

        if(empty($messages)) {

            $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
            $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
            $nic = mysqli_real_escape_string($connection, $_POST['nic']);
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $contact_no = mysqli_real_escape_string($connection, $_POST['contact_no']);
            $home_no = mysqli_real_escape_string($connection, $_POST['home_no']);
            $street = mysqli_real_escape_string($connection, $_POST['street']);
            $city = mysqli_real_escape_string($connection, $_POST['city']);

            $password = "123";
            $hash_password = sha1($password);

            $agent_id = mysqli_real_escape_string($connection, $_SESSION['agent_id']);
            $coverage_type = mysqli_real_escape_string($connection, $_POST['coverage_type']);
            $vehicle_id = mysqli_real_escape_string($connection, $_POST['vehicle_id']);
            $chassis_no = mysqli_real_escape_string($connection, $_POST['chassis_no']);
            $year = mysqli_real_escape_string($connection, $_POST['year']);
            $model = mysqli_real_escape_string($connection, $_POST['model']);

            $query = "INSERT INTO Customer (first_name,last_name,admin_id,agent_id,nic,email,home_no,street,city,password) 
            VALUES ('$first_name', '$last_name',1,'$agent_id', ' $nic',  '$email',' $home_no' ,'$street','$city', '$hash_password')";
            
            $result = mysqli_query($connection,  $query);
      
            if ($result) {

                $query_1 = "SELECT customer_id FROM Customer WHERE email = '$email'";
                
                $result_1 = mysqli_query($connection, $query_1);

                if($result_1) {

                    if(mysqli_num_rows($result_1) == 1) {

                        $customer = mysqli_fetch_assoc($result_1);

                        $customerId = $customer['customer_id'];

                        $query_2 = "INSERT INTO Vehicle VALUES ('$customerId', '$vehicle_id', '$model', '$chassis_no', '$year')";
                        $query_3 = "INSERT INTO Customer_Contact_no VALUES ('$contact_no','$customerId')";
                        
                        mysqli_query($connection,  $query_2);
                        
                        if(mysqli_query($connection,  $query_3)) {
                            $_SESSION['success_message'] = "Customer successfully added!";
                            header("Location: agent-add-customer.php");
                            exit();
                        }else{
                            echo "Error: " .  $query_1 . "<br>" . mysqli_error($connection);
                        }
                    }
                }
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
    <title>Add Customer | Your Road to Safety and Savings</title>
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
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li><a href="agent-add-customer.php">Add Customer</a></li>
            </ul>

            <?php
                    if(isset($_SESSION['success_message'])) {
                        echo '<div class="flash-message"><i class="fa-solid fa-check"></i><p>' . $_SESSION['success_message'] . '</p></div>';
                        unset($_SESSION['success_message']);
                    }
                 ?>


            <h3 class="m-10">New Customer Registration Form</h3>

            <form action="agent-add-customer.php" method="post">

                <div class="flex flex-col">
                    <h4 class="m-10">Customer Personal Details</h4>
                    <div class="flex flex-row form">
                        <div class="form-item flex flex-col">
                            <label for=""> First Name <span class="required">*</span></label>
                            <input type="text" name="first_name" placeholder="First name">
                                <?php
                                    if(isset($messages) && !empty($messages['first_name'])) {
                                        echo '<div class="error required">'.$messages['first_name'].'</div>';
                                    }
                                ?>
                        </div>

                        <div class="form-item flex flex-col">
                            <label for=""> Last Name <span class="required">*</span></label>
                            <input type="text" name="last_name" placeholder="Last name">
                                <?php
                                    if(isset($messages) && !empty($messages['last_name'])) {
                                        echo '<div class="error required">'.$messages['last_name'].'</div>';
                                    }
                                ?>
                        </div>
                    </div>

                    <div class="flex flex-row form">
                        <div class="form-item flex flex-col">
                            <label for=""> NIC <span class="required">*</span></label>
                            <input type="number" name="nic" placeholder="NIC">
                                <?php
                                    if(isset($messages) && !empty($messages['nic'])) {
                                        echo '<div class="error required">'.$messages['nic'].'</div>';
                                    }
                                ?>
                        </div>

                        <div class="form-item flex flex-col">
                            <label for="">Email <span class="required">*</span></label>
                            <input type="email" name="email" placeholder="email">
                                <?php
                                    if(isset($messages) && !empty($messages['email'])) {
                                        echo '<div class="error required">'.$messages['email'].'</div>';
                                    }
                                ?>
                        </div>
                    </div>

                    <div class="flex flex-row form">
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
                            <label for=""> Address<span class="required">*</span></label>
                            <input type="text" name="home_no" placeholder="House Number">
                                <?php
                                    if(isset($messages) && !empty($messages['home_no'])) {
                                        echo '<div class="error required">'.$messages['home_no'].'</div>';
                                    }
                                ?>
                        </div>
                    </div>

                    <div class="flex flex-row form">
                        <div class="form-item flex flex-col">
                            <label for="">Street <span class="required">*</span></label>
                            <input type="text" name="street" placeholder="Street">
                                <?php
                                    if(isset($messages) && !empty($messages['street'])) {
                                        echo '<div class="error required">'.$messages['street'].'</div>';
                                    }
                                ?>
                        </div>

                        <div class="form-item flex flex-col">
                            <label for="">City <span class="required">*</span></label>
                            <input type="text" name="city" placeholder="City">
                                <?php
                                    if(isset($messages) && !empty($messages['city'])) {
                                        echo '<div class="error required">'.$messages['city'].'</div>';
                                    }
                                ?>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col">
                    <h4 class="m-10">Customer Vehicle Details</h4>

                    <div class="flex flex-row form">

                        <div class="form-item flex flex-col">
                            <label for="">Coverage Type<span class="required">*</span></label>
                            <select name="coverage_type" id="">
                                <option value="">Select Coverage Type</option>
                                <option value="1">Third Party</option>
                                <option value="2">Comprehensive</option>
                            </select>
                                <?php
                                    if(isset($messages) && !empty($messages['coverage_type'])) {
                                       echo '<div class="error required">'.$messages['coverage_type'].'</div>';
                                    }
                                ?>
                        </div>

                        <div class="form-item flex flex-col">
                            <label for=""> Model <span class="required">*</span></label>
                            <input type="text" name="model" placeholder="Model">
                                <?php
                                    if(isset($messages) && !empty($messages['model'])) {
                                        echo '<div class="error required">'.$messages['model'].'</div>';
                                    }
                                ?>
                        </div>

                        <div class="form-item flex flex-col">
                            <label for=""> Registration Number <span class="required">*</span></label>
                            <input type="text" name="vehicle_id" placeholder="Registration Number ">
                                <?php
                                    if(isset($messages) && !empty($messages['vehicle_id'])) {
                                        echo '<div class="error required">'.$messages['vehicle_id'].'</div>';
                                    }
                                ?>
                        </div>
                    </div>

                    <div class="flex flex-row form">
                        <div class="form-item flex flex-col">
                            <label for=""> Year <span class="required">*</span></label>
                            <input type="text" min="1900" max="2099" step="1" value="2024" name="year"
                                placeholder="Year">
                                <?php
                                    if(isset($messages) && !empty($messages['year'])) {
                                        echo '<div class="error required">'.$messages['year'].'</div>';
                                    }
                                ?>
                        </div>

                        <div class="form-item flex flex-col">
                            <label for="">Chassis number<span class="required">*</span></label>
                            <input type="number" name="chassis_no" placeholder="Chassi number">
                                <?php
                                    if(isset($messages) && !empty($messages['chassis_no'])) {
                                        echo '<div class="error required">'.$messages['chassis_no'].'</div>';
                                    }
                                ?>
                            
                        </div>
                    </div>
                </div>
            
                <div class="flex" style="margin-top: 10px">
                    <button type="submit" name="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                </div>
            </form>
        </div>
    </div>

    <?php require_once('inc/footer.php') ?>
</body>

</html>

<?php mysqli_close($connection); ?>