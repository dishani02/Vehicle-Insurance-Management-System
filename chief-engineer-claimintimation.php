
<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
    if(!isset($_SESSION['first_name']) && !isset($_SESSION['chief-engineer_id'])) {
        header('Location: chief-engineer-login.php');
    }
?>

<?php
    if(isset($_POST['submit'])) {

        $messages = array();

        if(!isset($_POST['insured_name']) || strlen(trim($_POST[' insured_name'])) < 1) {
            $messages[' insured_name'] = " Insured name is required";
        }
        
        if(!isset($_POST[' vehicle_no']) || strlen(trim($_POST[' vehicle_no'])) < 1) {
            $messages[' vehicle_no'] = "  Vehicle no is required";
        }
        
        if(!isset($_POST['vehicle_model']) || strlen(trim($_POST['vehicle_model'])) < 1) {
            $messages['vehicle_model'] = "Vehicle model is required";
        } 
        
        if(!isset($_POST['vehicle_category']) || strlen(trim($_POST['vehicle_category'])) < 1) {
            $messages['vehicle_category'] = "Vehicle category is required";
        }
        
        if(!isset($_POST['phone_number']) || strlen(trim($_POST['phone_number'])) < 1) {
            $messages['phone_number'] = "Contact Number is required";
        } 

        if(!isset($_POST['chassi_number']) || strlen(trim($_POST['chassi_number'])) < 1) {
            $messages['chassi_number'] = "Chassi number is required";
        } 

        if(!isset($_POST['driver_name']) || strlen(trim($_POST['streedriver_namet'])) < 1) {
            $messages['driver_name'] = "Driver name is required";
        } 

        if(!isset($_POST['date']) || strlen(trim($_POST['date'])) < 1) {
            $messages['date'] = "Date is required";
        }

        
        if(!isset($_POST['place']) || strlen(trim($_POST['place'])) < 1) {
            $messages['place'] = "Place  is required";
        } 

        if(!isset($_POST['description']) || strlen(trim($_POST['description'])) < 1) {
            $messages['description'] = "Description is required";
        } 
        
        if(!isset($_POST['vehicle_condition']) || strlen(trim($_POST['vehicle_condition'])) < 1) {
            $messages['vehicle_condition'] = "Yevehicle conditionar is required";
        }

       

        if(empty($messages)) {

            $insured_name = mysqli_real_escape_string($connection, $_POST['insured_name']);
            $vehicle_no = mysqli_real_escape_string($connection, $_POST['vehicle_no']);
            $vehicle_model = mysqli_real_escape_string($connection, $_POST['vehicle_model']);
            $vehicle_category = mysqli_real_escape_string($connection, $_POST['vehicle_category']);
            $phone_number = mysqli_real_escape_string($connection, $_POST['phone_number']);
            $chassi_number = mysqli_real_escape_string($connection, $_POST['chassi_number']);
            $driver_name = mysqli_real_escape_string($connection, $_POST['stdriver_namereet']);
            $date = mysqli_real_escape_string($connection, $_POST['date']);
            $place = mysqli_real_escape_string($connection, $_POST['place']);
            $description = mysqli_real_escape_string($connection, $_POST['description']);
            $vehicle_condition = mysqli_real_escape_string($connection, $_POST['vehicle_condition']);

            $password = "123";
            $hash_password = sha1($password);


  
            $query = "INSERT INTO claim intimation  (claim_intimation_id,engineer_id,insured_name,vehicle_no,vehicle_model,vehicle_category,phone_number,chassi_number,driver_name,date,place,description,vehicle_condition) 
            VALUES ('$insured_name', '$vehicle_no',1,'$vehicle_category', ' $phone_number',  '$chassi_number', '$driver_name',' $date' ,'$place','$description','$vehicle_condition')";
            
            $result = mysqli_query($connection,  $query);
      
            if ($result) {

                $query_1 = "SELECT chief_engineer_id FROM chief_engineer WHERE email = '$email'";
                
                $result_1 = mysqli_query($connection, $query_1);

                if($result_1) {

                    if(mysqli_num_rows($result_1) == 1) {

                        $chief_engineer = mysqli_fetch_assoc($result_1);

                        $chief_engineerId = $chief_engineer['chief_engineer_id'];

                        
                       
                        if(mysqli_query($connection,  $query_1)) {
                            $_SESSION['success_message'] = "Claim intimation form successfully added!";
                            header("Location: chief-engineer-claimintimation.php");
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
    <title>Dashboard | Your Road to Safety and Savings</title>
    <link rel="stylesheet" href="css/style.css">
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/72fb3712df.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once('inc/header.php') ?>

    <div class="flex">
            <?php require_once('inc/chief-engineer-sidebar.php') ?>
            
            <div class="flex flex-col content-wrapper">

                <ul class="bredcrumb">
                    <li>Dashboard</li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li><a href="chief-engineer-claimintimation.php">claim intimation</a></li>
                </ul>

                <h4 class="text-center">Claim Intimation Form</h4>


                <div class="flex flex-col">
                    <div class=" flex flex-row form">
                        <div class="form-item flex flex-col">
                            <label for=""> Insured's Name <span class="required">*</span></label>
                            <input type="text" name="insured_name" placeholder="Insured's Name">
                            <?php
                                 if(isset($messages) && !empty($messages['insured_name'])) {
                                    echo '<div class="error required">'.$messages['insured_name'].'</div>';
                                 }
                             ?>
                        </div>

                       
                        <div class="form-item flex flex-col">
                            <label for=""> Vehical No<span class="required">*</span></label>
                            <input type="text" name="vehicle_no" placeholder="Vehical no">
                            <?php
                                 if(isset($messages) && !empty($messages['vehicle_no'])) {
                                    echo '<div class="error required">'.$messages['vehicle_no'].'</div>';
                                 }
                             ?>
                        </div>



                        <div class="form-item flex flex-col">
                            <label for=""> Vehical Model<span class="required">*</span></label>
                            <input type="text" name="vehicle_model" placeholder="Vehical Model">
                            <?php
                                 if(isset($messages) && !empty($messages['vehicle_model'])) {
                                    echo '<div class="error required">'.$messages['vehicle_model'].'</div>';
                                 }
                             ?>
                        </div>

                        <div class="form-item flex flex-col">
                            <label for=""> Vehical Category<span class="required">*</span></label>
                            <input type="text" name="vehicle_category" placeholder="Vehical Category">
                            <?php
                                 if(isset($messages) && !empty($messages['vehicle_category'])) {
                                    echo '<div class="error required">'.$messages['vehicle_category'].'</div>';
                                 }
                             ?>
                        </div>


                        <div class="form-item flex flex-col">
                            <label for=""> Phone Number<span class="required">*</span></label>
                            <input type="number" name="phone_number" placeholder="Phone Number">
                            <?php
                                 if(isset($messages) && !empty($messages['phone_number'])) {
                                    echo '<div class="error required">'.$messages['phone_number'].'</div>';
                                 }
                             ?>
                        </div>

                        <div class="form-item flex flex-col">
                            <label for=""> Chassi Number<span class="required">*</span></label>
                            <input type="text" name="chassi_number" placeholder="Chassi Number">
                            <?php
                                 if(isset($messages) && !empty($messages['chassi_number'])) {
                                    echo '<div class="error required">'.$messages['chassi_number'].'</div>';
                                 }
                             ?>
                        </div>
                        

                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="flex flex-row form">
                        <div class="form-item flex flex-col">
                            <label for=""> Drivers Name<span class="required">*</span></label>
                            <input type="text" name="driver_name" placeholder="Drivers Name">
                            <?php
                                 if(isset($messages) && !empty($messages['driver_name'])) {
                                    echo '<div class="error required">'.$messages['driver_name'].'</div>';
                                 }
                             ?>
                        </div>

                        <div class="form-item flex flex-col">
                            <label for=""> Date of the accident<span class="required">*</span></label>
                            <input type="date" name="date" placeholder="Date of the accident">>
                            <?php
                                 if(isset($messages) && !empty($messages['date'])) {
                                    echo '<div class="error required">'.$messages['date'].'</div>';
                                 }
                             ?>

                        </div>


                        <div class="form-item flex flex-col">
                            <label for=""> Place of the Accident<span class="required">*</span></label>
                            <input type="text" name="place" placeholder="Place of the Accident">
                            <?php
                                 if(isset($messages) && !empty($messages['place'])) {
                                    echo '<div class="error required">'.$messages['place'].'</div>';
                                 }
                             ?>
                        </div>
                    </div>
                    
                    <div class="flex flex-col">
                        <div class=" flex flex-row form">
                            <div class="form-item flex flex-col">
                                <label for="">Description of the accident<span class="required">*</span></label>
                                <input type="text" name="description" placeholder="Description of the accident">
                                <?php
                                 if(isset($messages) && !empty($messages['description'])) {
                                    echo '<div class="error required">'.$messages['description'].'</div>';
                                 }
                             ?>
                            </div>


                            <div class="form-item flex flex-col">
                            <label for=""> Vehical Condition<span class="required">*</span></label>
                            <input type="text" name="vehicle_condition" placeholder="Vehical Condition">
                            <?php
                                 if(isset($messages) && !empty($messages['vehicle_condition'])) {
                                    echo '<div class="error required">'.$messages['vehicle_condition'].'</div>';
                                 }
                             ?>
                        </div>

                            
                        </div>
                    </div>
                    <div class="flex" style="margin-top: 5px">
                        <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

    <?php require_once('inc/footer.php') ?>

</body>

</html>
<?php mysqli_close($connection); ?>