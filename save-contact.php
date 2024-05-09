<?php
session_start();
require 'config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $customerid = $_POST['customerid'];
    $csrid = $_POST['csrid'];
    $inquiryid = $_POST['inquiryid'];
    $name = $_POST['name'];
    $contact= $_POST['contact_no'];
    $email = $_POST['email'];
    $inquiry = $_POST['inquiry'];
    $date = $_POST['date'];

    // Prepare and execute the SQL query to insert data into the database
    $query = "INSERT INTO inquiry (customerid, csrid, inquiryid, name, contact, email, inquiry, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statement, "ssssssss", $customerid, $csrid, $inquiryid, $name, $contact, $email, $inquiry, $date); 
    if (mysqli_stmt_execute($statement)) {
        // Data inserted successfully
        echo "Data inserted successfully!";
    } else {
        // Error occurred
        echo "Error: " . mysqli_error($conn);
    }

    // Close statement
    mysqli_stmt_close($statement);
}

// Close connection
mysqli_close($conn);
?>
