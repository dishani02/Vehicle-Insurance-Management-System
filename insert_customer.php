<?php
require_once("config.php");

// Retrieve values from POST
$id = $_POST["id"];
$cfirst = $_POST["cfirst"];
$clast = $_POST["clast"];
$nic = $_POST["nic"];
$no = $_POST["no"];
$street = $_POST["street"];
$town = $_POST["town"];
$contact = $_POST["contact"];
$email = $_POST["email"];
$pass = $_POST["pass"];

// Prepare and execute first INSERT statement
$sql = "INSERT INTO customer (customer_id,first_name, last_name, admin_id, nic, email, password, home_no, street, city) 
        VALUES ('$id','$cfirst', '$clast', '1', '$nic', '$email', '$pass', '$no', '$street', '$town')";

if ($conn->query($sql) === TRUE) {
    echo "First query executed successfully. ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Prepare and execute second INSERT statement
$sql1 = "INSERT INTO customer_contact_no (customer_id,contact_no) VALUES ('$id','$contact')";

if ($conn->query($sql1) === TRUE) {
    echo "Second query executed successfully.";
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>

