<?php session_start(); ?>

<?php require_once('inc/connection.php'); ?>

<?php

if(isset($_SESSION['name'])) {
    header('Location: index.php');
    exit; // Add an exit after redirection to stop further execution
}

if(isset($_POST['submit'])) {

    $errors = array();

    if(!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1) {
        $errors['email'] = "E-mail is required";
    }

    if(!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1) {
        $errors['password'] = "Password is required";
    }

    if(empty($errors)) {
      
        $email = mysqli_real_escape_string($connection, $_POST['email']);

        $query = "SELECT * FROM csr WHERE email = ?";

        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if($result) {
            if (mysqli_num_rows($result) == 1) {

                $user = mysqli_fetch_assoc($result);

                if (password_verify($_POST['password'], $user['password'])) {
                    $_SESSION['csr_id'] = $user['csr_id'];
                    $_SESSION['name'] = $user['name'];
                    
                    header('Location: csr-dashboard.php');
                    exit; // Add an exit after redirection to stop further execution
                } else {
                    $errors['common'] = 'Invalid email / password';
                }
            } else {
                $errors['common'] = 'Invalid email / password';
            }
        } else {
            $errors['common'] = "Database error!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer service Representative Login | Your Road to Safety and Savings</title>
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/72fb3712df.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require_once('inc/header.php'); ?>

    <div class="container">
        <div class="login flex">

            <form action="csr-login.php" method="post">

                <div class="flex
