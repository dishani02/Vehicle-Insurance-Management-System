
<?php
session_start();
require_once('inc/connection.php');

// Check if user is logged in
if (!isset($_SESSION['csr_id'])) {
    // Respond with an error message if the user is not logged in
    echo json_encode(['success' => false, 'message' => 'You are not logged in']);
    exit();
}

if (!isset($_GET['id'])) {
    // Respond with an error message if inquiry ID is missing
    echo json_encode(['success' => false, 'message' => 'Inquiry ID is missing']);
    exit();
}

// Get inquiry ID from URL parameter
$inquiryId = $_GET['id'];


// Get inquiry ID from URL parameter
$inquiryId = $_GET['inquiry_id'];

// Prepare delete query with prepared statement
$query = "DELETE FROM inquiry WHERE inquiry_id = ?";
$stmt = mysqli_prepare($connection, $query);

if (!$stmt) {
    // Respond with an error message if the prepared statement creation fails
    echo json_encode(['success' => false, 'message' => 'Error preparing delete query']);
    exit();
}

// Bind the inquiry ID parameter
mysqli_stmt_bind_param($stmt, "i", $inquiryId);

// Execute the delete query
$result = mysqli_stmt_execute($stmt);

if ($result) {
    // Respond with success message if deletion was successful
    echo json_encode(['success' => true, 'message' => 'Inquiry deleted successfully']);
} else {
    // Respond with error message if deletion failed
    echo json_encode(['success' => false, 'message' => 'Failed to delete inquiry: ' . mysqli_error($connection)]);
}

// Close prepared statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($connection);
?>
