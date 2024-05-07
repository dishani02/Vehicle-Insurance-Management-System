
<?php require_once('inc/connection.php'); ?>

<div class="header">
    <div class="logo">
        <img src="img/logo.png" alt="Drive Peak">
    </div>

    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="about-us.php">About Us</a>
        <a href="contact-us.php">Contact Us</a>
        <a href="motor-insurance.php">Motor Insurance</a>

        <?php  if (!isset($_SESSION['first_name'])) : ?>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php endif ?>
    </div>

    <div class="search">
        <input type="text" name="" placeholder="Search">
    </div>

    <?php  if (isset($_SESSION['first_name'])) : ?>
        <div class="user-profile">
            <i class="fa-regular fa-circle-user"></i>
            <p>Hello <?php echo $_SESSION['first_name']; ?> !</p>
            <a href="logout.php">Logout</a>
        </div>          
    <?php endif ?>
</div>