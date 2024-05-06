<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motor Insurance | Your Road to Safety and Savings</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/72fb3712df.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once('inc/header.php') ?>

    <div class="container motor-insurance">
        <div class="flex flex-col">

            <img src="img/motor-insurance.png" alt="" style="width: 100%; margin-bottom: 20px;">

            <div class="flex">
                <div class="flex flex-col m-10">
                    <h2>WHY DRIVE PEAK ?</h2>
                    <div class="flex justify-content-between why-drive-peak">
                        <div class="flex flex-col text-center">
                            <i class="fa-solid fa-car-burst"></i>
                            <p>Quick Damage Assistance</p>
                        </div>

                        <div class="flex flex-col text-center">
                            <i class="fa-solid fa-file-shield"></i>
                            <p>20 years of reliable service</p>
                        </div>

                        <div class="flex flex-col text-center">
                            <i class="fa-solid fa-face-smile"></i>
                            <p>Excellent customer service</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col content-wrapper">
                    <h2>MOTOR INSURANCE IN SRI LANAKA</h2>
                    <p class="m-10">"Drive Peak offers tailored vehicle insurance solutions designed to perfectly match
                        your driving
                        needs, whether you're behind the wheel of a car, a motorcycle, or even a tuk-tuk. Our
                        comprehensive motor insurance plans can be fully customized to fit your vehicle's specific make,
                        model, and other important details, ensuring that you only pay for the coverage you truly
                        require. Experience the ease and reliability of switching to Drive Peak insurance with just a
                        simple click. Securing your insurance has never been more convenient!"</p>
                </div>
            </div>

            <div class="flex flex-col m-10">
                <h2>Motor Insurance Category</h2>
                <div class="flex category">
                    <div class="flex flex-col">
                        <a href="">
                            <img src="img/car.jpg" alt="" class="img">
                        </a>
                        <div>
                            <h3>Car Insurance</h3>
                            <p>Verify whether any risks or losses resulting from theft, accidents, or natural
                                catastrophes are covered for your vehicle.</p>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <a href="">
                            <img src="img/motorbike.jpg" alt="" class="img">
                        </a>
                        <div>
                            <h3>Motorcycle Insurance</h3>
                            <p>Verify whether any risks or losses resulting from theft, accidents, or natural
                                catastrophes are covered for your vehicle.</p>

                        </div>
                    </div>

                    <div class="flex flex-col">
                        <a href="">
                            <img src="img/threewheel.jpg" alt="" class="img">
                        </a>
                        <div>
                            <h3>Three-Wheel Insurance</h3>
                            <p>Verify whether any risks or losses resulting from theft, accidents, or natural
                                catastrophes are covered for your vehicle.</p>

                        </div>
                    </div>

                    <div class="flex flex-col">
                        <a href="">
                            <img src="img/truck.jpg" alt="" class="img">
                        </a>
                        <div>
                            <h3>Commercial Vehicle Insurance</h3>
                            <p>Verify whether any risks or losses resulting from theft, accidents, or natural
                                catastrophes are covered for your vehicle.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col">
                <h2>Motor Insurance Caverage Option</h2>

                <div class="flex coverage">

                    <div class="flex flex-col catbox">
                        <h3>Third Party</h3>
                        <h6 class="m-10">Basic coverage</h6>
                        <hr class="m-10">
                        <ul>
                            <li class="m-10">Covers death or bodily injury to any third-party person.</li>
                            <li class="m-10">Covers any damaged property up toRs.15,000.</li>
                            <li class="m-10">Does not cover you.</li>
                            <li class="m-10">Does not cover any damages to your vehicle.</li>
                        </ul>
                    </div>


                    <div class="flex flex-col catbox">
                        <h3>Comprehensive</h3>
                        <h6 class="m-10">Complete coverage</h6>
                        <hr class="m-10">
                        <ul>
                            <li class="m-10">Covers death or injuries caused to a third-party person by your vehicle
                                during an accident.</li>
                            <li class="m-10">Covers damages caused to a property of a third-party person up to a maximum
                                amount of LKR 5 million, due to accident caused by your vehicle.</li>
                            <li class="m-10">Covers damages to your vehicle based on the total sum insured.</li>
                            <li class="m-10">Add-ons available to extend your cover.</li>
                            <li class="m-10">Manage your own deductibles.</li>
                        </ul>
                    </div>


                </div>
            </div>


            <div class="flex ">

                <div class="flex flex-col ">
                    <h1>Insure Your Vehicle Now</h1>
                    <p>"Rev up your protection with Drive Peak! Tailored insurance plans for cars, bikes, and tuk-tuks,
                        designed to fit your unique needs. Register now for personalized coverage and peace of mind on
                        the road!"</p>

                </div>


            </div>



        </div>
    </div>
    <?php require_once('inc/footer.php') ?>
</body>

</html>