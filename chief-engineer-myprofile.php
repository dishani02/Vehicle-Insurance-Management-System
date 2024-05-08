<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
if (!isset($_SESSION['first_name'])) {
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
                    <h4 class="text-center">My Profile</h4>
                    <form action="chief-engineer-myprofileprocess.php" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="">Engineer Id</span></label>
                            <input type="text" name="engineer_id" placeholder="Engineer Id">
                        </div>
                        <div>
                            <label for="">NIC</span></label>
                            <input type="text" name="nic" placeholder=" NIC">
                        </div>
                        <div>
                            <label for="">NAME</span></label>
                            <input type="text" name="name" placeholder="NAME">
                        </div>
                        <div>
                            <label for="">EMAIL</span></label>
                            <input type="email" name="email" placeholder=Email>
                        </div>
                        <div>
                            <label for="">PASSWORD</label>
                            <input type="text" name="password" placeholder="PASSWORD">
                        </div>
                        <div class="">
                            <input type="submit" name="add" value="Insert Details" class="button1">
                        </div>
                        <DIV>
                            <?php
                            if (isset($_SESSION["create"])) {
                            ?>
                                <div class="alert alert-success">
                                    <?php
                                    echo $_SESSION["create"];
                                    ?>
                                </div>
                            <?php
                                unset($_SESSION["create"]);
                            }
                            ?>
                        </DIV>
                        <DIV>
                            <?php
                            if (isset($_SESSION["update"])) {
                            ?>
                                <div class="alert alert-success">
                                    <?php
                                    echo $_SESSION["update"];
                                    ?>
                                </div>
                            <?php
                                unset($_SESSION["update"]);
                            }
                            ?>
                        </DIV>
                    </form>

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