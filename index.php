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

    <div class="container">
        <div class="slider">
            <h1 class="m-10">Your Path to Safe Journeys</h1>
            <div class="owl-carousel">
                <img src="img/carss.jpg" alt="">
                <img src="img/istockphoto-509469590-612x612.jpg" alt="" style="width: 100%">
                <img src="img/cars.jpg" alt="">
            </div>
        </div>
        <div class="flex flex-col m-10">



            <div class="flex flex-row m-10">
                <div class="flex flex-col content-wrapper">
                    <h2>Hello!</h2>
                    <h3 class="m-10"> We're DrivePeak Insurance</h3>

                    <p>DrivePeak is your trusted partner in vehicle insurance management.</p>
                    <p>Our cutting-edge platform harnesses the latest technology to deliver
                    <p>seamless efficient, and personalized solutions tailored to your needs</p>
                    <p>With DrivePeak,you can navigate insurance processes effortlessly,</p>
                    <p>peace of mind and financial security the road ahead.</p>
                </div>

                <div class="content-wrapper m-10">
                    <h1>"Drive Peak Protecting Your Investment with Precision"</h1>
                    <p class="m-10">"Drive Peak Safeguarding Your Vehicle, Securing Your Peace of Mind" signifies our dedication to
                        protecting your vehicle with comprehensive coverage, advanced security measures, and
                        unparalleled peace of mind.</p>

                        <h3 class="m-10">FOR YOU </h3>
                    <ul>
                        <li> Personalized coverage</li>
                        <li> Personalized coverage</li>
                        <li> Expert support</li>
                        <li> Community engagement</li>
                        <li> Peace of mind</li>
                    </ul>

                </div>


            </div>



            <div class="flex flex-row m-10">


                <div class="flex flex-col content-wrapper">
                    <h1>DRIVE PEAK GROUP OF INSURANCE COMPANIES </h1>

                    <p>Peak Vehicle Insurance provides customized coverage, leveraging cutting-edge technology for
                        personalized premiums and proactive risk management. Our dedicated team offers expert guidance
                        throughout your insurance journey, ensuring your peace of mind on the road. Join our community
                        for comprehensive protection and superior service.Drive Peak is a top choice for vehicle
                        insurance, offering comprehensive coverage tailored to
                        your needs. With competitive rates and excellent customer service, they prioritize your
                        peace of mind on the road.</p>


                    <div class="content-wrapper">
                        <h4>"Drive Peak Simplifying Insurance, Amplifying Confidence"</h4>
                    </div>

                    <div class="flex flex-col">
                        At Peak Vehicle Insurance, we prioritize your safety and satisfaction. With innovative solutions
                        and personalized service, we redefine the insurance experience. Enjoy peace of mind on every
                        journey with our comprehensive coverage and expert support. Choose Peak for protection that's
                        tailored to your needs and driven by excellence. <br>
                        At Peak Vehicle Insurance, you're not just a policyholder; you're part of a community dedicated
                        to your safety and satisfaction. With personalized coverage, cutting-edge technology, and expert
                        support, we redefine the insurance experience. Experience the benefits of Peak: peace of mind,
                        proactive protection, and unparalleled service.
                    </div>

                </div>
            </div>



            <div class="flex flex-row m-10">


                <div class="flex flex-col content-wrapper">
                    <h1>DRIVE PEAK </h1>

                    <h5>The Best Option</h5>
                    <p>"Drive Peak" encapsulates our commitment to safeguarding your vehicle and securing your peace of
                        mind. With tailored coverage, advanced technology, and dedicated support, we ensure
                        comprehensive protection for your journeys. Trust in Drive Peak for reliability, innovation, and
                        a community-driven approach to insurance, where your safety and satisfaction are our top
                        priorities.Drive Peak is a top choice for vehicle insurance, offering comprehensive coverage
                        tailored to
                        your needs. With competitive rates and excellent customer service, they prioritize your
                        peace of mind on the road.</p>


                    <div class="content-wrapper">
                        <h4>"Drive Peak Your Reliable Shield Against the Unexpected"</h4>
                    </div>
                </div>

                <div class="content-wrapper">
                    <img src="img/Car-crash-718x523.jpg" alt=" " width="800" height="500">
                </div>
            </div>



            <div class="flex flex-row m-10">
                <div>
                    <img src="img/f4f8bcbf0f5596a163664b0bfde7b738.jpg" alt=" " width="800" height="500">
                </div>

                <div class="flex flex-col content-wrapper">
                    <h1>DRIVE PEAK </h1>

                    <h5>The Best Option</h5>
                    <p>Our values at Peak Vehicle Insurance encompass integrity, innovation, reliability, and community.
                        We prioritize transparency and honesty in all interactions, constantly innovating to meet
                        evolving needs, ensuring reliable protection, and fostering a sense of belonging within our
                        community.</p>


                    <div class="content-wrapper">
                        <h4>"Drive Peak: Where Your Vehicle's Protection Matters Most"</h4>
                    </div>
                </div>
            </div>


        </div>

    </div>





    <?php require_once('inc/footer.php') ?>

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


</body>

</html>