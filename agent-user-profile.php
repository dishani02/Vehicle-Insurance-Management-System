<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
    //get agent id from session 
    $agentId = $_SESSION['agent_id'];

    //get agent details
    $query = "SELECT * FROM Agent WHERE agent_id = '$agentId'";

    $result = mysqli_query($connection, $query);

    $agent = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>
<?php
    if(!isset($_SESSION['first_name'])) {
        header('Location: agent-login.php');
    }
?>

<?php
   if(isset($_POST['submit'])) {

    $messages = array();

    if(!isset($_POST['first_name']) || strlen(trim($_POST['first_name'])) < 1) {
        $messages['first_name'] = "First name is required";
    } 

    if(!isset($_POST['last_name']) || strlen(trim($_POST['last_name'])) < 1) {
        $messages['last_name'] = "Last name is required";
    } 
    
    if(!isset($_POST['nic']) || strlen(trim($_POST['nic'])) < 1) {
        $messages['nic'] = "NIC is required";
    }  
    
    if(!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1) {
        $messages['email'] = "Email is required";
    } 
     
    if(!isset($_POST['home_no']) || strlen(trim($_POST['home_no'])) < 1) {
        $messages['home_no'] = "Home number is required";
    } 

    if(!isset($_POST['street']) || strlen(trim($_POST['street'])) < 1) {
        $messages['street'] = "Street is required";
    } 

    if(!isset($_POST['city']) || strlen(trim($_POST['city'])) < 1) {
        $messages['city'] = "City is required";
    } 
    
    if (empty($messages)) {
        //update user profile
        $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
        $nic = mysqli_real_escape_string($connection, $_POST['nic']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $home_no = mysqli_real_escape_string($connection, $_POST['home_no']);
        $street = mysqli_real_escape_string($connection, $_POST['street']);
        $city = mysqli_real_escape_string($connection, $_POST['city']);
   
        $query = "UPDATE Agent SET 
        first_name = '$first_name', 
        last_name = '$last_name',
        nic = '$nic',
        email = '$email',
        home_no = '$home_no',
        street = '$street',
        city = '$city'
        WHERE agent_id = '$agentId'";

        $result = mysqli_query($connection, $query);

        if($result) {
            $_SESSION['first_name'] = $first_name;
            $_SESSION['success_message'] = "Profile successfully updated!";
            header("Location: agent-reports.php");
            exit();
        }  
        else {
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
                <li><a href="agent-user-profile.php">My Profile</a></li>
            </ul>

            <?php
                if(isset($_SESSION['success_message'])) {
                    echo '<div class="flash-message"><i class="fa-solid fa-check"></i><p>' . $_SESSION['success_message'] . '</p></div>';
                    unset($_SESSION['success_message']);
                }
            ?>

            <form action="agent-user-profile.php" method="post">

                <div class="flex flex-col">
                    <h4 class="m-10"> Personal Details </h4>

                    <div class="flex flex-row form">
                        <div class="form-item flex flex-col">
                            <label for=""> First Name <span class="required">*</span></label>
                            <input type="text" name="first_name" placeholder="First Name"
                                value="<?php echo $agent['first_name'] ?>">
                            <?php

                                if(isset($messages) && !empty($messages['first_name'])) {
                                    echo '<div class="error required">'.$messages['first_name'].'</div>';
                                }
                            ?>
                        </div>

                        <div class="form-item flex flex-col">
                            <label for=""> Last Name <span class="required">*</span></label>
                            <input type="text" name="last_name" placeholder="Last Name"
                                value="<?php echo $agent['last_name'] ?>">
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
                            <input type="text" name="nic" placeholder="NIC" value="<?php echo $agent['nic'] ?>" readonly>
                            <?php
                                if(isset($messages) && !empty($messages['nic'])) {
                                    echo '<div class="error required">'.$messages['nic'].'</div>';
                                }
                            ?>
                        </div>

                        <div class="form-item flex flex-col">
                            <label for="">Email <span class="required">*</span></label>
                            <input type="email" name="email" placeholder="Email" value="<?php echo $agent['email'] ?>">
                            <?php
                                if(isset($messages) && !empty($messages['email'])) {
                                    echo '<div class="error required">'.$messages['email'].'</div>';
                                }
                            ?>
                        </div>
                    </div>

                    <div class="flex flex-row form">
                        <div class="form-item flex flex-col">
                            <label for="">Address<span class="required">*</span></label>
                            <input type="text" name="home_no" placeholder="Home Number"
                                value="<?php echo $agent['home_no'] ?>">
                            <?php
                                if(isset($messages) && !empty($messages['home_no'])) {
                                    echo '<div class="error required">'.$messages['home_no'].'</div>';
                                }
                            ?>
                            <input type="text" name="street" placeholder="Street" value="<?php echo $agent['street'] ?>">
                            <?php
                                if(isset($messages) && !empty($messages['street'])) {
                                    echo '<div class="error required">'.$messages['street'].'</div>';
                                }
                            ?>
                            <div class="flex flex-row form"></div>
                            <input type="text" name="city" placeholder="City" value="<?php echo $agent['city'] ?>">
                            <?php
                                if(isset($messages) && !empty($messages['city'])) {
                                    echo '<div class="error required">'.$messages['city'].'</div>';
                                }
                            ?>
                        </div>
                    </div>

                    <div class="flex" style="margin-top: 10px">
                        <button type="submit" name="submit" class="btn btn-primary" style="margin-right: 10px;">Update
                            Profile</button>

                    </div>
                </div>

            </form>
            
        </div>

       
    </div>
    
    </div>

    <?php require_once('inc/footer.php') ?>

</body>



<!-- <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
</div>
</div> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>


<script>
    var xValues = ["2020", "2021", "2022", "2023", "2024"];
    var yValues = [35, 49, 44, 24, 55];
    var barColors = ["pink", "purple", "blue", "orange", "red"];



    const myChart = new Chart("myChart", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Chart.js Bar Chart'
                }
            }
        },
    });
</script>
</body>

</html>

<?php mysqli_close($connection); ?>