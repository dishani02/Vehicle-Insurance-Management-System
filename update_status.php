<?php
// Check if claim_id and status are set in the POST request
if(isset($_POST['claim_id'], $_POST['status'])) {
    // Establish connection to the database
    require_once("config.php");

    
    $claim_id = mysqli_real_escape_string($conn, $_POST['claim_id']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    
    // Update the status in the claim table
    $sql = "UPDATE claim SET status='$status' WHERE claim_id='$claim_id'";
    if(mysqli_query($conn, $sql)) {
        // Send a success response
        http_response_code(200);
        echo "Status updated successfully";
    } else {
        // Send an error response
        http_response_code(500);
        echo "Error updating status: " . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
} else {
    // Send an error response if claim_id or status is not set
    http_response_code(400);
    echo "Invalid request";
}
<?php
// Check if claim_id and status are set in the POST request
if(isset($_POST['claim_id'], $_POST['status'])) {
    // Establish connection to the database
    require_once("config.php");

    
    $claim_id = mysqli_real_escape_string($conn, $_POST['claim_id']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    
    // Update the status in the claim table
    $sql = "UPDATE claim SET status='$status' WHERE claim_id='$claim_id'";
    if(mysqli_query($conn, $sql)) {
        // Send a success response
        http_response_code(200);
        echo "Status updated successfully";
    } else {
        // Send an error response
        http_response_code(500);
        echo "Error updating status: " . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
} else {
    // Send an error response if claim_id or status is not set
    http_response_code(400);
    echo "Invalid request";
}
?>