<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Your Road to Safety and Savings</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require_once('inc/header.php') ?>

    <div class="container">
        <fieldset>
            <legend><b>Customer Register Form</b></legend>

            <form method="post" action="insert_customer.php">
                First Name:<input type="text" name="cfirst">
                Last Name:<input type="text" name="cfirst">
            </form>
        </fieldset>
    </div>

    <?php require_once('inc/footer.php') ?>
</body>

</html>