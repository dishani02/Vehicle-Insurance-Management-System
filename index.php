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
            <h2>Your Path to Safe Journeys</h2>
            <div class="owl-carousel">
                <img src="https://www.srilankainsurance.com/assets/images/60th-anniversary-en.jpg" alt="" style="width: 100%">
                <img src="https://www.srilankainsurance.com/assets/images/banner-4-en.jpg" alt="">
                <img src="https://www.srilankainsurance.com/assets/images/home-protect-lite-banner-new.png" alt="">
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
        $(document).ready(function() {
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