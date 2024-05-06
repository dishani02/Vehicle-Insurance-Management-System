<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
    if(!isset($_SESSION['name'])) {
        header('Location: chief-engineer-login.php');
    }
?>

    <?php
    if(isset($_POST['submit'])) {
 
     $messages = array();
 
     if(!isset($_POST['name']) || strlen(trim($_POST['name'])) < 1) {
         $messages['name'] = " Name is required";
     } 
 
     
     if(!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1) {
         $messages['email'] = "Email is required";
     }  
     
     if(!isset($_POST['branch']) || strlen(trim($_POST['branch'])) < 1) {
         $messages['branch'] = "Branch is required";
     } 
      
     if(!isset($_POST['mobile']) || strlen(trim($_POST['mobile'])) < 1) {
         $messages['mobile'] = "Mobile number is required";
     } 
 
     
     if (empty($messages)) {
         //update user profile
         $name = mysqli_real_escape_string($connection, $_POST['name']);
         $email = mysqli_real_escape_string($connection, $_POST['email']);
         $branch = mysqli_real_escape_string($connection, $_POST['branch']);
         $mobile = mysqli_real_escape_string($connection, $_POST['mobile']);
         
         $query = "UPDATE CHIEF ENGINEER SET 
         name = '$name', 
         email = '$email',
         branch = '$branch',
         mobile = '$mobile',
         WHERE chief_engineer_id = '$chief_engineerId'";
 
         $result = mysqli_query($connection, $query);
 
         if($result) {
             $_SESSION['name'] = $name;
             $_SESSION['success_message'] = "Profile successfully updated!";
             header("Location: Chief Engineer-profile.php");
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
            <div class="nav">
                <?php require_once('inc/chief-engineer-sidebar.php') ?>
            </div>

            <div class="content">
                <div class="flex flex-col text-right">
                    <div class="form-item flex flex-col chief-engineer-profile">
                        <h4 class="text-center">Contact Info</h4>

                        <div>
                            <label for="">NAME</span></label>
                            <input type="text" name="" placeholder=" Name">
                        </div>

                        <label for=""> EMAIL</span></label>
                        <input type="email" name="" placeholder=email>
                        <div>
                            <label for="">BRANCH</span></label>
                            <input type="text" name="" placeholder="Branch Name">
                        </div>
                        <div>
                            <label for="">MOBILE NUMBER</label>
                            <input type="number" name="" placeholder="Contact number">
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        
        <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
            </div>
        </div>

        <?php require_once('inc/footer.php') ?>



        
</body>

</html>