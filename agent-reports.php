<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
    if(!isset($_SESSION['first_name'])) {
        header('Location: agent-login.php');
    }

    $agent_id = $_SESSION['agent_id'];

    $query = "SELECT v.vehicle_id FROM Customer c JOIN Vehicle v ON c.customer_id = v.customer_id WHERE c.agent_id = '$agent_id'";

    $result = mysqli_query($connection, $query);

    if($result) {
        
        $vehicle_list = '';

        while($row = mysqli_fetch_array($result)) {
            $vehicle_list .= "<option value='" . $row['vehicle_id'] . "'>";
            $vehicle_list .= $row['vehicle_id'];
            $vehicle_list .= "</option>";
        }
    }
?>

<?php
    if(isset($_POST['submit'])){
        $messages = array();

        if(!isset($_POST['informant_name']) || strlen(trim($_POST['informant_name'])) < 1) {
            $messages['informant_name'] = "informant_name is required";
        }
        
        if(!isset($_POST['vehicle_id']) || strlen(trim($_POST['vehicle_id'])) < 1) {
            $messages['vehicle_id'] = "vehicle_id is required";
        }

        if(!isset($_POST['date']) || strlen(trim($_POST['date'])) < 1) {
            $messages['date'] = "date is required";
        }

        if(!isset($_POST['place']) || strlen(trim($_POST['place'])) < 1) {
            $messages['place'] = "place is required";
        } 
        

        if (empty($messages)) {
            $informant_name =  mysqli_real_escape_string($connection, $_POST['informant_name']);
            $vehicle_id =  mysqli_real_escape_string($connection, $_POST['vehicle_id']);
            $date =  mysqli_real_escape_string($connection, $_POST['date']);
            $place =  mysqli_real_escape_string($connection, $_POST['place']);
            $description =  mysqli_real_escape_string($connection, $_POST['description']);

            $agent_id = $_SESSION['agent_id'];

            $query =  "INSERT INTO Accident(agent_id,informant_name,vehicle_id,date,place,description)
            VALUES ('$agent_id','$informant_name','$vehicle_id','$date','$place','$description')";

            $result = mysqli_query($connection,  $query);

            if($result) {
                $messages['common'] = "Claim Intimation successfully added!";
            } else{
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
            <?php require_once('inc/agent-sidebar.php') ?>
            
            <div class="flex flex-col content-wrapper">

                <ul class="bredcrumb">
                    <li>Dashboard</li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li><a href="agent-reports.php">Reports</a></li>
                </ul>

                <?php
                    if(isset($messages) && !empty($messages['common'])) {
                    echo '<div class="flash-message">
                            <i class="fa-solid fa-check"></i>
                            <p>'.$messages['common'].'</p>
                        </div>';
                    }
                ?>


                <h4 class="text-center">Claim Intimation Form</h4>

                <form action="agent-reports.php" method="post">


                <div class="flex flex-col">
                    <div class=" flex flex-row form">
                        <div class="form-item flex flex-col">
                            <label for=""> Name of the informant <span class="required">*</span></label>
                            <input type="text" name="informant_name" placeholder="Name of the informant">
                            <?php
                                if(isset($messages) && !empty($messages['informant_name'])) {
                                     echo '<div class="error required">'.$messages['informant_name'].'</div>';
                                 }
                             ?>
                        </div>

                        <div class="form-item flex flex-col">
                            <label for=""> Vehicle ID<span class="required">*</span></label>
                            <select name="vehicle_id">
                                 <option value="">Select Vehicle Id</option>
                                 <?php echo $vehicle_list; ?>
                            </select>
                            <?php
                                if(isset($messages) && !empty($messages['vehicle_id'])) {
                                     echo '<div class="error required">'.$messages['vehicle_id'].'</div>';
                                 }
                             ?>
                        </div>

                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="flex flex-row form">
                        <div class="form-item flex flex-col">
                            <label for=""> Date of the Accident<span class="required">*</span></label>
                            <input type="date" name="date" placeholder="Date of the Accident">
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
                                <textarea type="text" name="description" placeholder="Description of the accident" rows="5"></textarea>
                                <?php
                                if(isset($messages) && !empty($messages['description'])) {
                                     echo '<div class="error required">'.$messages['description'].'</div>';
                                 }
                             ?>
                            </div>

                            <!-- <div class="form-item flex flex-col">
                                <label for=""> Add images<span class="required">*</span></label>
                                <input type="file" name="" placeholder="Add images">
                            </div> -->
                        </div>
                    </div>
                    <div class="flex" style="margin-top: 5px">
                        <button type="submit" name="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
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