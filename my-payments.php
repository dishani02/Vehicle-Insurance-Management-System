<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments | Your Road to Safety and Savings</title>
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
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li><a href="my-payments.php">Payment</a></li>
                </ul>

                <div class="content">
                    <h2>Payment</h2>

                    <div class="payment-wrapper">
                        <form action="my-payments.php" method="post">
                            <div class="flex flex-row form m-10">
                                <button type="submit" name="" class="btn btn-primary pay">
                                    Credit or Debit Card
                                </button>
                                <button type="submit" class="btn btn-primary pay">
                                    Online Banking
                                </button>
                            </div>

                            <div class="flex flex-row card-method m-10">
                                <div class="form-item flex">
                                    <input type="radio" id="mastercard"  name="fav_language" value="mastercard" class="form-item flex">
                                    <label for="mastercard"><i class="fa-brands fa-cc-mastercard"></i></i></label><br>
                                </div>

                                <div class="form-item flex">
                                    <input type="radio" id="visa" name="fav_language" value="visa">
                                    <label for="visa"><i class="fa-brands fa-cc-visa"></i></label><br>
                                </div>

                                <div class="form-item flex">
                                    <input type="radio" id="amazon-pay" name="fav_language" value="amazon-pay">
                                    <label for="amazon-pay"><i class="fa-brands fa-cc-amazon-pay"></i></label><br>
                                </div>
                            </div>


                            <div class="flex flex-row flex-col">
                                <div class="form-item flex flex-col">
                                    <label for="cardholder-name">Cardholder Name</label>
                                    <input type="text" id="cardholder-name" placeholder="Enter your name">
                                </div>

                                <div class="flex flex-row flex-col ">
                                    <label for="cardholder-name">Cardholder Number</label>
                                    <input type="number" id="card-number" placeholder="Enter your card number">
                                </div>
                            </div>

                            <div class="flex flex-row form">
                                <div class="form-item flex flex-col">
                                    <label for="expiry-date">End Date</label>
                                    <input type="date" id="expiry-date" placeholder="MM/YY">

                                </div>

                                <div class="form-item flex flex-col">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" placeholder="XXX">

                                </div>
                            </div>

                            <div class="flex flex-row form m-10">
                                <div class="form-item flex flex-col m-10">
                                    <button type="submit" name="requestotp" class="btn btn-primary m-10 otp"
                                        style="margin-right: 10px; "><a href="my-payments.php">Request OTP</a></button>
                                </div>

                                <div class="form-item flex flex-col m-10 ">

                                    <input type="text" id="otp" placeholder="Enter OTP here">

                                </div>
                            </div>

                            <div class="flex flex-row form m-10">
                                <button type="submit" name="submit" class="btn btn-primary pay">PAY NOW</button>
                                <button type="reset" class="btn btn-primary pay">CANCEL</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    
    <?php require_once('inc/footer.php') ?>
</body>

</html>