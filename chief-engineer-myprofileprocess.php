<?php
session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
if (!isset($_SESSION['first_name'])) {
    header('Location: chief-engineer-login.php');
}
// Check if form submitted
if (isset($_POST['add'])) {
    // Retrieve form data
    $engineer_id = $_POST['engineer_id'];
    $nic = $_POST['nic'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if engineer_id already exists
    $check_query = "SELECT * FROM chief_engineer_my_profile WHERE engineer_id = '$engineer_id'";
    $check_result = mysqli_query($connection, $check_query);
    
    if (mysqli_num_rows($check_result) > 0) {
        // If engineer_id already exists, update the record
        $update_query = "UPDATE chief_engineer_my_profile SET nic = '$nic', name = '$name', email = '$email', password = '$password' WHERE engineer_id = '$engineer_id'";
        $update_result = mysqli_query($connection, $update_query);
        
        if ($update_result) {
            session_start();
            $_SESSION["update"] = "Details updated successfully.";
            header("Location:chief-engineer-myprofile.php");
        } else {
            echo "Error updating record: " . mysqli_error($connection);
        }
    } else {
        // If engineer_id doesn't exist, insert a new record
        $insert_query = "INSERT INTO chief_engineer_my_profile (engineer_id, nic, name, email, password) VALUES ('$engineer_id', '$nic', '$name', '$email', '$password')";
        $insert_result = mysqli_query($connection, $insert_query);
        
        if ($insert_result) {
            session_start();
            $_SESSION["create"] = "Details inserted successfully.";
            header("Location:chief-engineer-myprofile.php");
        } else {
            echo "Error inserting record: " . mysqli_error($connection);
        }
    }
}
?>