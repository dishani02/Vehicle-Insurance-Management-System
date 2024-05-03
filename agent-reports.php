<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
    if(!isset($_SESSION['first_name'])) {
        header('Location: agent-login.php');
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

                <h4 class="text-center">Claim Intimation Form</h4>


                <div class="flex flex-col">
                    <div class=" flex flex-row form">
                        <div class="form-item flex flex-col">
                            <label for=""> Name of the informant <span class="required">*</span></label>
                            <input type="text" name="" placeholder="Name of the informant">
                        </div>

                        <div class="form-item flex flex-col">
                            <label for=""> Date of the accident<span class="required">*</span></label>
                            <input type="date" name="" placeholder="Date of the accident">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="flex flex-row form">
                        <div class="form-item flex flex-col">
                            <label for=""> Insured's Name<span class="required">*</span></label>
                            <input type="text" name="" placeholder="Insured's Name">
                        </div>

                        <div class="form-item flex flex-col">
                            <label for=""> Place of the Accident<span class="required">*</span></label>
                            <input type="text" name="" placeholder="Place of the Accident">
                        </div>
                    </div>
                    
                    <div class="flex flex-col">
                        <div class=" flex flex-row form">
                            <div class="form-item flex flex-col">
                                <label for="">Description of the accident<span class="required">*</span></label>
                                <input type="text" name="" placeholder="Description of the accident">
                            </div>

                            <div class="form-item flex flex-col">
                                <label for=""> Add images<span class="required">*</span></label>
                                <input type="file" name="" placeholder="Add images">
                            </div>
                        </div>
                    </div>
                    <div class="flex" style="margin-top: 5px">
                        <button type="submit" class="btn tn-primary" style="margin-right: 10px;">Submit</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

    <?php require_once('inc/footer.php') ?>

</body>

</html>