<?php
require_once("config.php");

// Retrieve values from POST

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
$sql = "INSERT INTO register_user (first_name, last_name, nic,homeNo, street,town,email,password, contact) 
        VALUES ('$cfirst', '$clast', '$nic','$no','$street','$town', '$email', '$pass', '$contact')";
$sql = "INSERT INTO register_user (first_name, last_name, nic, homeNo, street,town,email, password, contact) 
        VALUES ('$cfirst', '$clast', '$nic', '$no', '$street', '$town','$email', '$pass','$contact')";

if ($conn->query($sql) === TRUE) {
    //echo "First query executed successfully. ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// Close connection
$conn->close();
?>

