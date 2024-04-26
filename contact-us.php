<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Your Road to Safety and Savings</title>
    <link rel="stylesheet" href="css/style.css">
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/72fb3712df.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once('inc/header.php') ?>

    <div class="container">
        <div class="contact-us flex">
            <div class="contact-form">
                <form action="" method="post">
                    <div class="flex flex-col">
                        <label for="">Full Name <span>*</span></label>
                        <input type="text" name="" placeholder="Your Full Name">
                    </div>

                    <div class="flex flex-col">
                        <label for="">Contact <span>*</span></label>
                        <input type="number" name="" placeholder="Contact">
                    </div>

                    <div class="flex flex-col">
                        <label for="">E-mail <span>*</span></label>
                        <input type="email" name="" placeholder="E-mail">
                    </div>

                    <div class="flex flex-col">
                        <label for="">Type Of Inquiry <span>*</span></label>
                        <div class="flex">
                            <input type="radio" name="Inquiry" value="New Product Inquiry">New Product Inquiry
                            <input type="radio" name="Inquiry" value="Information">Information
                            <input type="radio" name="Inquiry" value="Complaint">Complaint
                            <input type="radio" name="Inquiry" value="Other">Other
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <label for="">Type your message</label>
                        <textarea name="" cols="30" rows="5" placeholder="Please tell about your inquiry"></textarea>
                    </div>

                    <div class="flex flex-col">
                        <button type="submit">Submit</button>
                    </div>


                </form>
            </div>

            <div class="map">
                <div class="flex flex-col">
                    <h3>Visit Us</h3>
                    <p>
                        Rakshana Mandiraya <br>
                        No.21,<br>
                        Vauxhall Street,<br>
                        Colombo 02,<br>
                        Sri Lanka
                    </p>
                </div>

                <div class="flex flex-col">
                    <h3>Email</h3>
                    <a href="">info@drivepeak.lk</a>
                </div>

                <div class="flex flex-col">
                    <h3>Call our 24/7 Hotline</h3>
                    <a href="">+94 11 2 1234 345</a>
                    <a href="">+94 11 2 1234 345</a>
                    <a href="">+94 11 2 1234 345</a>
                </div>

                <div class="flex flex-col">
                    <h3>Follow us on</h3>
                    <div class="flex">
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

            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7985117737744!2d79.97036957447459!3d6.91467749308487!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae256db1a6771c5%3A0x2c63e344ab9a7536!2sSri%20Lanka%20Institute%20of%20Information%20Technology!5e0!3m2!1sen!2slk!4v1714069166445!5m2!1sen!2slk" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <?php require_once('inc/footer.php') ?>
</body>

</html>