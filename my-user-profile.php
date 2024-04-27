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

            <div class="flex" style="width: 100%;">
                <div class="flex flex-col">
                    <div class="flex flex-col">
                        <label for="">Full Name <span class="required">*</span></label>
                        <input type="text" name="" placeholder="Your Full Name">
                    </div>
    
                    <div class="flex flex-col">
                        <label for="">User ID <span class="required">*</span></label>
                        <input type="text" name="" placeholder="Your User ID">
                    </div>
    
                    <div class="flex flex-col">
                        <label for="">NIC <span class="required">*</span></label>
                        <input type="number" name="" placeholder="Your NIC Number">
                    </div>
    
                    <div class="flex flex-col">
                        <label for="">E-mail <span class="required">*</span></label>
                        <input type="email" name="" placeholder="E-mail">
                    </div>
    
                    <div class="flex flex-col">
                        <label for="">Contact <span class="required">*</span></label>
                        <input type="text" name="" placeholder="Contact">
                    </div>
    
                    <div class="flex flex-col">
                        <label for=""> Address <span class="required">*</span></label>
                        <input type="text" name="" placeholder="NO">
                        <input type="text" name="" placeholder="Street">
                        <input type="text" name="" placeholder="City">
                    </div>
                </div>
    
    
                <div class="flex flex-col">
                    <h2>Vehicle Details </h2>
    
                    <div class="flex flex-col">
                        <label for="">Registertion Number <span class="required">*</span></label>
                        <input type="text" name="" placeholder="Your Vehicle Registertion Number">
                    </div>
    
                    <div class="flex flex-col">
                        <label for="">Registertion Number <span class="required">*</span></label>
                        <input type="text" name="" placeholder="Your Vehicle Registertion Number">
                    </div>
    
                    <div class="flex flex-col">
                        <label for="">Chassis Number <span class="required">*</span></label>
                        <input type="text" name="" placeholder="Your Vehicle Chassis Number">
                    </div>
    
                    <div class="flex flex-col">
                        <label for="">Year of manufacture <span class="required">*</span></label>
                        <input type="text" name="" placeholder="Your Vehicle Year of manufacture">
                    </div>
    
                    <div class="flex flex-col">
                        <label for=""> Model <span class="required">*</span></label>
                        <input type="text" name="" placeholder="Your Vehicle Model">
                    </div>
    
    
                    <h2>Policy Details </h2>
    
    
                    <div class="flex flex-col">
                        <label for="">Policy ID <span class="required">*</span></label>
                        <input type="text" name="" placeholder="Your Policy ID">
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
                </div>
            </div>
        </div>
        
    </div>

    <?php require_once('inc/footer.php') ?>
</body>

</html>