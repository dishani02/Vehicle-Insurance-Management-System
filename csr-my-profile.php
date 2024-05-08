 <?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
    // if(!isset($_SESSION['first_name']) && !isset($_SESSION['csr_id'])) {
    //     header('Location: csr-login.php');
    // }

    //get agent id from session 
    $csrId = $_SESSION['csr_id'];

    //get agent details
    $query = "SELECT * FROM csr WHERE csr_id = '$csrId'";

    $result = mysqli_query($connection, $query);

    $csr = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>
 <?php
    if(!isset($_SESSION['first_name'])) {
        header('Location: csr-login.php');
        exit();
    }
?> 

<?php
   if(isset($_POST['submit'])) {

    $messages = array();

    if(!isset($_POST['name']) || strlen(trim($_POST['name'])) < 1) {
        $messages['name'] = " name is required";
    } 
    
    if(!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1) {
        $messages['email'] = "Email is required";
    } 
     

    if(!isset($_POST['nic']) || strlen(trim($_POST['nic'])) < 1) {
        $messages['nic'] = "nic is required";
    } 

    if(!isset($_POST['Address']) || strlen(trim($_POST['Address'])) < 1) {
        $messages['Address'] = "Address is required";
    } 

    if (empty($messages)) {
        //update user profile
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $nic = mysqli_real_escape_string($connection, $_POST['nic']);
        $address = mysqli_real_escape_string($connection, $_POST['Address']);
   
        $query = "UPDATE Csr SET 
   
        name = '$name',
        email = '$email',
        nic = '$nic',
        address = '$address'
        WHERE csr_id = '$csrId'";

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

        <?php require_once('inc/csr-sidebar.php') ?>

        <div class="flex flex-col content-wrapper">

            <ul class="bredcrumb">
                <li>Dashboard</li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li><a href="csr-my-profile.php"> Profile</a></li>
            </ul>

            <?php
                if(isset($_SESSION['success_message'])) {
                    echo '<div class="flash-message"><i class="fa-solid fa-check"></i><p>' . $_SESSION['success_message'] . '</p></div>';
                    unset($_SESSION['success_message']);
                }
            ?>

            <form action="csr-my-profile.php" method="post">

                <div class="flex flex-col">
                    <h4 class="m-10"> Personal Details </h4>

                    <div class="flex flex-row form">
                        <div class="form-item flex flex-col">
                            <label for=""> Name <span class="required">*</span></label>
                            <input type="text" name="name" placeholder=" Name"
                             value="<?php echo $csr['name'] ?>">
                            <?php

                                if(isset($messages) && !empty($messages['name'])) {
                                    echo '<div class="error required">'.$messages['name'].'</div>';
                                }
                            ?>
                        </div>

                        <div class="form-item flex flex-col">
                            <label for="">email <span class="required">*</span></label>
                            <input type="text" name="email" placeholder="email" 
                                value="<?php echo $csr['email'] ?>">
                            <?php
                                if(isset($messages) && !empty($messages['email'])) {
                                    echo '<div class="error required">'.$messages['email'].'</div>';
                                }
                            ?>
                        </div>

                    </div>

                    <div class="flex flex-row form">
                        <div class="form-item flex flex-col">
                            <label for=""> nic <span class="required">*</span></label>
                            <input type="text" name="nic" placeholder="nic"
                                 value="<?php echo $csr['nic'] ?>" readonly>
                            <?php
                                if(isset($messages) && !empty($messages['nic'])) {
                                    echo '<div class="error required">'.$messages['nic'].'</div>';
                                }
                            ?>
                        </div>


                    </div>

                    <div class="flex flex-row form">
                        <div class="form-item flex flex-col">
                            <label for="">Address<span class="required">*</span></label>
                            <input type="text" name="Address" placeholder="Address"
                                value="<?php echo $csr['Address'] ?>">
                            <?php
                                if(isset($messages) && !empty($messages['Address'])) {
                                    echo '<div class="error required">'.$messages['Address'].'</div>';
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




</html>

<?php mysqli_close($connection); ?> 