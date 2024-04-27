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

    <div class="container">
        <div class="flex">
            <?php require_once('inc/agent-sidebar.php') ?>


            <div class="flex flex-col content-wrapper">

                <ul class="bredcrumb">
                    <li>Dashboard</li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li><a href="agent-reports.php">Agent Reports</a></li>
                </ul>

                <form action="post">
                    <h2>Claim Intimation Form</h2>

                    <div class="flex flex-col">
                        <label for="">Name of the informant <span class="required">*</span></label>
                        <input type="text" name="" placeholder="">
                    </div>

                    <div class="flex flex-col">
                        <label for="">Insured's Name<span class="required">*</span></label>
                        <input type="text" name="" placeholder="">
                    </div>

                    <div class="flex flex-col">
                        <label for="">Type of the vehicle <span class="required">*</span></label>
                        <input type="text" name="" placeholder="">
                    </div>

                    <div class="flex flex-col">
                        <label for="">Date of the accident<span class="required">*</span></label>
                        <input type="date" name="" placeholder="">
                    </div>

                    <div class="flex flex-col">
                        <label for="">Place of the accident <span class="required">*</span></label>
                        <input type="text" name="" placeholder="">
                    </div>

                    <div class="flex flex-col">
                        <label for=""> Description of the accident<span class="required">*</span></label>
                        <textarea name="" rows="4" cols="50"></textarea>
                    </div>

                    <div class="flex flex-col">
                        <label for="">Add images<span class="required">*</span></label>
                        <input type="File" name="" placeholder="Add a file">
                    </div>

                    <div class="flex" style="margin-top: 10px">
                        <button type="submit" class="btn-primary">Submit</button>
                        <button type="reset" class="btn-primary">Reset</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php require_once('inc/footer.php') ?>
</body>

</html>