<?php
session_start();

// Include database connection file
require_once('inc/connection.php');

// Check if user is logged in
if (!isset($_SESSION['csr_id'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

// Retrieve CSR ID from session
$csrId = $_SESSION['csr_id'];

// Retrieve customer's vehicle details
$query = "SELECT * FROM inquiry WHERE csr_id = '$csrId'";
$result = mysqli_query($connection, $query);

$inquiry_list = '';

while ($row = mysqli_fetch_array($result)) {
    $inquiry_list .= "<tr>";

    $inquiry_list .= "<td>" . $row['inquiry_id'] . "</td>";
    $inquiry_list .= "<td>" . $row['name'] . "</td>";
    $inquiry_list .= "<td>" . $row['contact_no'] . "</td>";
    $inquiry_list .= "<td>" . $row['email'] . "</td>";
    $inquiry_list .= "<td>" . $row['inquiry'] . "</td>";
    $inquiry_list .= "<td>" . $row['date'] . "</td>";
    $inquiry_list .= "<td class='text-center'><div class='action-buttons'><button class='btn btn-danger delete-button' data-id='" . $row['inquiry_id'] . "'><i class='fa-solid fa-trash'></i> Delete</button></div></td>";
    $inquiry_list .= "</tr>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets | Your Road to Safety and Savings</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/72fb3712df.js" crossorigin="anonymous"></script>
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php require_once('inc/header.php') ?>

    <div class="container">
        <div class="flex">
            <div class="nav">
                <?php require_once('inc/csr-sidebar.php') ?>
            </div>
            <div class="flex flex-col content-wrapper">
                <ul class="bredcrumb">
                    <li><a href="csr-dashboard.php">Dashboard</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li><a href="csr-tickets.php">Tickets</a></li>
                </ul>

                <?php if (isset($messages) && !empty($messages['common'])) {
                    echo '<div class="flash-message">
                            <i class="fa-solid fa-check"></i>
                            <p>' . $messages['common'] . '</p>
                        </div>';
                } ?>

                <div class="content">
                    <h1 class="m-10">Inquiry List</h1>
                    <table>
                        <tr>
                            <th>Inquiry ID</th>
                            <th>Name</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                            <th>Inquiry</th>
                            <th>Date</th>
                        </tr>
                        <tbody>
                            <?php echo $inquiry_list ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php require_once('inc/footer.php') ?>

   

      ?>

     <!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        var deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default action

                var id = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Send a GET request to delete_inquiry.php with the inquiry ID
                        // window.location.href = 'delete_inquiry.php?id=' + id;
                        fetch('delete_inquiry.php?id=' + id, {
    method: 'GET'
})
.then(response => {
    if (response.ok) {
        return response.json();
    } else {
        throw new Error('Network response was not ok.');
    }
})
.then(data => {
    if (data.success) {
        // Optionally, update the UI to reflect the deletion
        // For example, remove the deleted row from the table
    } else {
        // Handle the case where deletion was not successful
        alert('Failed to delete inquiry');
    }
})
.catch(error => {
    console.error('Error:', error);
});
                    }
                });
            });
        });
    });
</script>  -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    var deleteButtons = document.querySelectorAll('.delete-button');

    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default action

            var id = this.getAttribute('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Send a GET request to delete_inquiry.php with the inquiry ID
                    fetch('delete_inquiry.php?id=' + id, {
                        method: 'GET'
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Optionally, update the UI to reflect the deletion
                            // For example, remove the deleted row from the table
                            location.reload(); // Reload the page to reflect changes
                        } else {
                            // Handle the case where deletion was not successful
                            alert('Failed to delete inquiry');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }
            });
        });
    });
});
</script>


</body>

</html>

<?php mysqli_close($connection); ?>
