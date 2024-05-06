<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
    if(!isset($_SESSION['first_name'])) {
        header('Location: chief-engineer-login.php');
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
                            <label for="">MOBILE</label>
                            <input type="text" name="" placeholder="Contact number">
                        </div>
                        <div>
                            <label for=""> ADDRESS</label>
                            <textarea name="address" rows="3" cols="50" placeholder="Address"></textarea>
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