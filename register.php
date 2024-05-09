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
              
    
                First Name:<input class="input1" type="text" name="cfirst">
                Last Name:<input type="text" name="clast"></br>
                NIC:<input type="text" name="nic"></br></br>
                Address:</br>
                No:<input type="text" name="no">  Street:<input type="text" name="street">  Town:<input type="text" name="town"></br>
                Contact No:<input type="text" name="contact"></br></br>

                <legend>Create Login Creadentials</legend>
                Username/Email:<input type="text" name="email"></br>
                Password:<input type="text" name="pass"></br>
                <input type="submit"><input type="reset">

            </form>
        </fieldset>
    </div>

    <?php require_once('inc/footer.php') ?>
</body>

</html>