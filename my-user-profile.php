<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Your Road to Safety and Savings</title>
    <link rel="stylesheet" href="css/style.css">
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/72fb3712df.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once('inc/header.php') ?>

    <div class="container">
        <div class="flex">

            <?php require_once('inc/customer-dash.php') ?>

            <div class="flex flex-col content-wrapper">

                <ul class="bredcrumb">
                    <li>Dashboard</li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li><a href="agent-add-customer.php">Add Customer</a></li>
                </ul>

               

                <form action="" method="post">
                    <div class="flex flex-row form">
                        <div>
                            <h5> Personal Details </h5>
                            <div class="flex flex-col">
                                <label for=""> Full Name <span class="required">*</span></label>
                                <input type="text" name="" placeholder="Full Name">
                            </div>

                            <div class="flex flex-col">
                                <label for=""> User ID <span class="required">*</span></label>
                                <input type="text" name="" placeholder="User ID ">
                            </div>

                            <div class="flex flex-col">
                                <label for=""> NIC <span class="required">*</span></label>
                                <input type="number" name="" placeholder="NIC">
                            </div>

                            <div class="flex flex-col">
                                <label for="">Email <span class="required">*</span></label>
                                <input type="email" name="" placeholder="email">
                            </div>

                            <div class="flex flex-col">
                                <label for="">Contact Number <span class="required">*</span></label>
                                <input type="number" name="" placeholder="contact number">
                            </div>

                            <div class="flex flex-col">
                                <label for=""> Address<span class="required">*</span></label>
                                <textarea name="address" rows="4" cols="50"></textarea>
                            </div>
                        </div>

                        <div>
                            <h5>Policy Details </h5>
                            <div class="flex flex-col">
                                <label for="">Policy ID <span class="required">*</span></label>
                                <input type="text" name="" placeholder="Policy ID">



                            </div>

                            <div class="flex flex-col">
                                <p>Coverage Type</p>
                                <select name="Coverage Type" id="">
                                    <option value="">Select Coverage Type</option>
                                    <option value="Third Party">Third Party</option>
                                    <option value="Comprehensive">Comprehensive</option>
                                </select>
                            </div>
                        
                            <div class="flex flex-col">
                                <label for="">Duration <span class="required">*</span></label>
                                <input type="number" name="" placeholder="Your Policy Duration">
                            </div>
                        
                            <div class="flex flex-col">
                                <label for="">Registration Date <span class="required">*</span></label>
                                <input type="date" name="" placeholder="Registration Date">
                            </div>
                        
                        
                            <div class="flex flex-col">
                                <label for="">Expire Date <span class="required">*</span></label>
                                <input type="date" name="" placeholder="Expire Date">
                            </div>

                            

                            <div class="flex flex-col">
                                <label for="">Vehicle Book <span class="required">*</span></label>
                                <input type="File" name="" placeholder="Add a file">
                            </div>

                            <div class="flex flex-col">
                                <label for="">Licence <span class="required">*</span></label>
                                <input type="File" name="" placeholder="Add a licience">
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