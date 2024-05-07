<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $contact = $_POST['contact_no'];
    $email = $_POST['email'];
    $inquiry = $_POST['inquiry'];
    $date = $_POST['date'];

    // Insert data into the database
    $sql = "INSERT INTO inquiry (name, contact_no, email, inquiry, date) VALUES ( '$name', '$contact', '$email', '$inquiry', '$date')";
    
    if (mysqli_query($conn, $sql)) {
        // Data inserted successfully
        echo "Data saved successfully!";
    } else {
        // Error occurred
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
