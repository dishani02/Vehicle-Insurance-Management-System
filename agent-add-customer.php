<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer | Your Road to Safety and Savings</title>
    <link rel="stylesheet" href="css/style.css">
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/72fb3712df.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once('inc/header.php') ?>

    <div class="container">
        <div class="flex">

            <?php require_once('inc/agent-sidebar.php') ?>

            <div class="flex flex-col content-wrapper">

                <ul class="bredcrumb">
                    <li>Dashboard</li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li><a href="agent-add-customer.php">Add Customer</a></li>
                </ul>

                <h4 class="text-center">New Customer Registration Form</h4>

                <form action="" method="post">

                    <div class="flex flex-col">
                        <h4>Customer Persoanl Details</h4>
                        <div class="flex flex-row form">
                            <div class="form-item flex flex-col">
                                <label for=""> First Name <span class="required">*</span></label>
                                <input type="text" name="" placeholder="First name">
                            </div>

                            <div class="form-item flex flex-col">
                                <label for=""> Last Name <span class="required">*</span></label>
                                <input type="text" name="" placeholder="Last name">
                            </div>
                        </div>

                        <div class="flex flex-row form">
                            <div class="form-item flex flex-col">
                                <label for=""> NIC <span class="required">*</span></label>
                                <input type="number" name="" placeholder="NIC">
                            </div>

                            <div class="form-item flex flex-col">
                                <label for="">Email <span class="required">*</span></label>
                                <input type="email" name="" placeholder="email">
                            </div>
                        </div>

                        <div class="flex flex-row form">
                            <div class="form-item flex flex-col">
                                <label for="">Contact Number <span class="required">*</span></label>
                                <input type="number" name="" placeholder="contact number">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label for=""> Address<span class="required">*</span></label>
                            <textarea name="address" rows="4" cols="50"></textarea>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <h4>Customer Vehicle Details</h4>


                        <div class="flex flex-row form">
                            <div class="form-item flex flex-col">
                                <label for=""> Model <span class="required">*</span></label>
                                <input type="text" name="" placeholder="Model">
                            </div>

                            <div class="form-item flex flex-col">
                                <label for=""> Registration Number <span class="required">*</span></label>
                                <input type="text" name="" placeholder="Registration Number ">
                            </div>
                        </div>

                        <div class="flex flex-row form">
                            <div class="form-item flex flex-col">
                                <label for=""> Year <span class="required">*</span></label>
                                <input type="number" name="" placeholder="Year">
                            </div>

                            <div class="form-item flex flex-col">
                                <label for="">Chassi number<span class="required">*</span></label>
                                <input type="number" name="" placeholder="Chassi number">
                            </div>
                        </div>

                        <div class="flex flex-row form">
                            <div class="form-item flex flex-col">
                                <label for="">Vehicle Book <span class="required">*</span></label>
                                <input type="file" name="" placeholder="Vehicle Book">
                            </div>

                            <div class="form-item flex flex-col">
                                <label for="">Licence <span class="required">*</span></label>
                                <input type="file" name="" placeholder="Licence">
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex flex-col">
                        <h4>Customer Policy Details</h4>
                    <div class="flex flex-row form">
                        <div class="form-item flex flex-col">
                            <label for="">Insurance Category<span class="required">*</span></label>
                            <select>
                                <option value="Car insurance">Car insurance</option>
                                <option value="Three-wheeler Insurance">Three-wheeler Insurance</option>
                                <option value="Mortorcycle Insurance">Mortorcycle Insurance</option>
                                <option value="Commercial Vehicle Insurance">Commercial Vehicle Insurance</option>
                            </select>
                        </div>

                        <div class="form-item flex flex-col">
                            <label for="">Coverage<span class="required">*</span></label>
                            <select>
                                <option value="Third Party">Third Party</option>
                                <option value="Comprehensive">Comprehensive</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-row form">
                        <div class="form-item flex flex-col">
                            <label for="">Duration<span class="required">*</span></label>
                            <select>
                                <option value="6 months">6 months</option>
                                <option value="1 year">1 year</option>
                                <option value="2 year">2 year</option>
                            </select>
                        </div>

                        <div class="form-item flex flex-col">
                            <label for="">Instalment Type<span class="required">*</span></label>
                            <select>
                                <option value="Monthly Payment">Monthly Payment</option>
                                <option value="Quarterly Payment">Quarterly Payment</option>
                                <option value="Semi-Annual Payment">Semi-Annual Payment</option>
                                <option value="Annual Payment">Annual Payment</option>
                            </select>
                        </div>
                    </div>
                    </div>
                    
                    <div class="flex" style="margin-top: 10px">
                        <button type="submit" class="btn-primary" style="margin-right: 10px;">Submit</button>
                        <button type="reset" class="btn-primary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require_once('inc/footer.php') ?>
</body>

</html>