<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php

    $customerId = $_SESSION['customer_id'];

    $query = "SELECT * FROM Customer WHERE customer_id = '$customerId'";

    $result = mysqli_query($connection, $query);

    $customer = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>

<?php

    if(isset($_POST['submit'])) {

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $home_no = $_POST['home_no'];
        $street = $_POST['street'];
        $city = $_POST['city'];

        $query = "UPDATE Customer SET 
        first_name = '$first_name', 
        last_name = '$last_name',
        email = '$email',
        home_no = '$home_no',
        street = '$street',
        city = '$city' 
        WHERE customer_id = '$customerId'";

        $result = mysqli_query($connection, $query);

        if($result) {
            $_SESSION['first_name'] = $first_name;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Your Road to Safety and Savings</title>
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
                    <li><a href="my-user-profile.php">User Profile</a></li>
                </ul>

               

                <form action="my-user-profile.php" method="post">
                    <div class="flex flex-row form">
                        <div>
                            <h5> Personal Details </h5>
                            <div class="flex flex-col">
                                <label for=""> First Name <span class="required">*</span></label>
                                <input type="text" name="first_name" placeholder="Full Name" value="<?php echo $customer['first_name'] ?>">
                            </div>
                            
                            <div class="flex flex-col">
                                <label for=""> Last Name <span class="required">*</span></label>
                                <input type="text" name="last_name" placeholder="Full Name" value="<?php echo $customer['last_name'] ?>">
                            </div>


                            <div class="flex flex-col">
                                <label for=""> NIC <span class="required">*</span></label>
                                <input type="text" name="nic" placeholder="NIC" value="<?php echo $customer['nic'] ?>" disabled>
                            </div>

                            <div class="flex flex-col">
                                <label for="">Email <span class="required">*</span></label>
                                <input type="email" name="email" placeholder="email" value="<?php echo $customer['email'] ?>">
                            </div>
<!-- 
                            <div class="flex flex-col">
                                <label for="">Contact Number <span class="required">*</span></label>
                                <input type="number" name="last_name" placeholder="contact number" value="<?php echo $customer['last_name'] ?>">
                            </div> -->

                            <div class="flex flex-col">
                                <label for=""> Address<span class="required">*</span></label>
                                <input type="text" name="home_no" placeholder="contact number" value="<?php echo $customer['home_no'] ?>">
                                <input type="text" name="street" placeholder="contact number" value="<?php echo $customer['street'] ?>">
                                <input type="text" name="city" placeholder="contact number" value="<?php echo $customer['city'] ?>">
                            </div>
                        </div>

                        <div>
                            <h5>Policy Details </h5>
                            <div class="flex flex-col">
                                <label for="">Policy ID <span class="required">*</span></label>
                                <input type="text" name="" placeholder="Policy ID">



                            </div>

                            <div class="flex flex-col">
                                <p>Coverage Type</p>
                                <select name="Coverage Type" id="">
                                    <option value="">Select Coverage Type</option>
                                    <option value="Third Party">Third Party</option>
                                    <option value="Comprehensive">Comprehensive</option>
                                </select>
                            </div>
                        
                            <div class="flex flex-col">
                                <label for="">Duration <span class="required">*</span></label>
                                <input type="number" name="" placeholder="Your Policy Duration">
                            </div>
                        
                            <div class="flex flex-col">
                                <label for="">Registration Date <span class="required">*</span></label>
                                <input type="date" name="" placeholder="Registration Date">
                            </div>
                        
                        
                            <div class="flex flex-col">
                                <label for="">Expire Date <span class="required">*</span></label>
                                <input type="date" name="" placeholder="Expire Date">
                            </div>


                            <!-- <div class="flex flex-col">
                                <label for="">Vehicle Book <span class="required">*</span></label>
                                <input type="File" name="" placeholder="Add a file">
                            </div>

                            <div class="flex flex-col">
                                <label for="">Licence <span class="required">*</span></label>
                                <input type="File" name="" placeholder="Add a licience">
                            </div> -->
                        </div>
                    </div>

                    <div class="flex" style="margin-top: 10px">
                        <button type="submit" name="submit" class="btn-primary" style="margin-right: 10px;">Update</button>
                        <button type="reset" class="btn-primary">Reset</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php require_once('inc/footer.php') ?>
</body>

</html>