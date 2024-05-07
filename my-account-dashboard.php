<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
  if(!isset($_SESSION['first_name']) && !isset($_SESSION['customer_id'])) {
    header('Location: login.php');
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
            
        <?php require_once('inc/customer-dash.php') ?>


        <div class="flex flex-col content-wrapper">

            <ul class="bredcrumb">
                <li><a href="my-account-dashboard.php">Dashboard</a></li>
                <!-- <li><i class="fa-solid fa-chevron-right"></i></li> -->

            </ul>

            <div class="content">
                <div class="flex flex-row m-10">
                    <div>
                        <img src="img/accident.jpg" alt=" " width="800" height="500">
                    </div>

                    <div class="flex flex-col content-wrapper">
                        <h1>DRIVE PEAK </h1>

                        <h5>The Best Option</h5>
                        <p>Drive Peak is a top choice for vehicle insurance, offering comprehensive coverage tailored to
                            your needs. With competitive rates and excellent customer service, they prioritize your
                            peace of mind on the road.</p>


                        <div class="content-wrapper">
                            <h4>"Drive Peak Your Ticket to Stress-Free Driving"</h4>
                        </div>
                    </div>
                </div>

                <div class="flex">
                    <ul class="content-wrapper">
                        <h3 class="content-wrapper m-10"> "Drive Peak Assurances for Your Peace of Mind"</h3>
                        <li>Tailored coverage options to fit your needs perfectly.</li>
                        <li>Competitive rates that won't break the bank.</li>
                        <li>Quick and hassle-free claims process for your convenience.</li>
                        <li>Dedicated customer support team ready to assist you at any time.</li>
                        <li> Additional perks like roadside assistance and rental car coverage available.</li>
                        <li>Peace of mind knowing your vehicle is protected by Drive Peak's reliable insurance.</li>
                    </ul>
                </div>

                <div class="flex m-10">
                    <div class="dash_container m-10">
                        <div class="dash_box">
                            <a href="">
                                <i class="fa-solid fa-file-invoice"></i>
                            </a>
                            <h3 class="m-10">Quick Inquiry</h3>
                            <a href="contact-us.php" class="btn btn-primary">Fill The Form</a>
                        </div>

                        <div class="dash_box">
                            <div class="flex flex-col">
                                <a href="">
                                    <i class="fa-solid fa-phone-volume"></i>
                                </a>
                                <h3>Email</h3>
                                <a href="">info@drivepeak.lk</a>
                            </div>

                            <div class="flex flex-col m-10">
                                <h3>Call our 24/7 Hotline</h3>
                                <a href="">+94 11 2 1234 345</a>
                            </div>

                            <div class="flex flex-col">
                                <h3>Follow us on</h3>
                                <div class="flex justify-content-between">
                                    <a href="">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa-brands fa-linkedin"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa-brands fa-youtube"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="dash_box">
                            <a href="">
                                <i class="fa-solid fa-map-location-dot"></i>
                            </a>
                            <h3 class="m-10">Find Our Nearest Branch</h3>
                            <a href="contact-us.php" class="btn btn-primary">find Now </a>
                        </div>

                        <div class="dash_box">
                            <a href="">
                                <i class="fa-solid fa-download view"></i>
                            </a>
                            <h3 class="m-10">Drive Peak Policy Book </h3>
                            <a href="contact-us.php" class="btn btn-primary">Download Now</a>
                        </div>

                    </div>

                </div>


                <!-- //contact us -->




            </div>

        </div>
    </div>

    <?php require_once('inc/footer.php') ?>
</body>

</html>