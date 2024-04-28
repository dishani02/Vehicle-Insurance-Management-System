<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive Peak | Your Road to Safety and Savings</title>
    <link rel="stylesheet" href="css/style.css">
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/72fb3712df.js" crossorigin="anonymous"></script>
    <!--owl-carousel-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
</head>

<body>
    <?php require_once('inc/header.php') ?>

    <div class="container about-us">
        <div class="slider">
            <h4>About Drive Peak</h4>
            <div class="owl-carousel">
                <img src="https://www.srilankainsurance.com/assets/images/60th-anniversary-en.jpg" alt=""
                    style="width: 100%">
                <img src="https://www.srilankainsurance.com/assets/images/banner-4-en.jpg" alt="">
                <img src="https://www.srilankainsurance.com/assets/images/home-protect-lite-banner-new.png" alt="">
            </div>
        </div>

        <div class="flex flex-col">
            <h2>Drive peak</h2>
            <p>DrivePeak is your trusted partner in vehicle insurance management. Our cutting-edge platform harnesses the
                latest technology to deliver seamless efficient, and personalized solutions tailored to your needs
                With DrivePeak,you can navigate insurance processes effortlessly, ensuring peace of mind and financial
                security on the road ahead.</p>
        </div>


        <div class="flex">
            <div class="box">
                <h1>Our Vision</h1>
                <p>To envision a future where vehicle insurance management transcends mere protection, becoming a cornerstone of empowerment, trust, and seamless mobility for all.                </p>
            </div>

            <div class="box">
                <h1>Our Mission</h1>
                    <p>Our mission is to revolutionize vehicle insurance management by leveraging cutting-edge technology, personalized service, and a relentless pursuit of innovation. Through transparent practices, proactive risk mitigation, and unwavering dedication to our customers, we aim to redefine the insurance experience, fostering safer roads, stronger communities, and greater peace of mind for drivers everywhere</p>
            </div>
        </div>

        <div class="flex">
            <div>
                <h2>Our History</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora, officia, est, similique corporis recusandae quo dolore ullam asperiores et nesciunt dicta quasi. Autem totam at odit aliquid omnis id culpa!</p>
            </div>
            <div>
                <h2>Awards</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam repudiandae modi eveniet rerum, quasi, sequi veniam voluptates vel alias illum neque odio! Rerum, eius. Placeat ullam eius quam dolor in.</p>
            </div>
            <div>
                <h2>Our Ethors & Values</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit animi, ipsam quod est libero sit officiis dolor hic. Fugit maxime iusto atque ullam doloremque animi earum distinctio corporis qui tempora.</p>
            </div>
        </div>
    </div>
   

    

    <?php require_once('inc/footer.php') ?>
    </div>
    <!--jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--owl carousel-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!--script-->
    <script>
        $(document).ready(function () {
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false,
                        loop: true
                    },
                    600: {
                        items: 3,
                        nav: false,
                        loop: true
                    },
                    1000: {
                        items: 1,
                        nav: false,
                        loop: true,
                        dot: true
                    }
                }
            });
        });


    </script>



    <?php require_once('inc/footer.php') ?>

</body>

</html>