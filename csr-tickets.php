<?php session_start(); ?>

<?php require_once('inc/connection.php'); ?>


<?php

    //get customer id from session 
   $csrId = $_SESSION['csr_id'];


    //get  customer's vehicle details
    $query = "SELECT * FROM inquiry WHERE csr_id = '$csrId' ";
   

    $result  = mysqli_query($connection, $query) ;
 

    $inquiry_list = '';

    while($row = mysqli_fetch_array($result)) {
        $inquiry_list .= "<tr>";
        
    
        $inquiry_list .= "<td>" . $row['inquiry_id'] . "</td>";
        $inquiry_list .= "<td>" . $row['name'] . "</td>";
        $inquiry_list .= "<td>" . $row['contact_no'] . "</td>";
        $inquiry_list .= "<td>" . $row['email'] . "</td>";
        $inquiry_list .= "<td>" . $row['inquiry'] . "</td>";
        $inquiry_list .= "<td>" . $row['date'] . "</td>";
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
        <!--font awesome-->
        <script src="https://kit.fontawesome.com/72fb3712df.js" crossorigin="anonymous"></script>
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

                <?php
                if(isset($messages) && !empty($messages['common'])) {
                    echo '<div class="flash-message">
                            <i class="fa-solid fa-check"></i>
                            <p>'.$messages['common'].'</p>
                        </div>';
                    }
                ?>

            <div class="content">

             <h1 class="m-10">Inquiry List</h1>
            <table>
          
                    <tr>
                       
                        <th>Inquiry ID</th>
                        <th>Name</th>
                        <th>contact number</th>
                        <th>email</th>
                        <th>Inquiry</th>
                        <th>date</th>
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

    <script>
        var deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
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
                        window.location = 'csr-tickets.php?action=delete&id=' + id;
                    }
        });
    });
});
    </script>
</body>

</html>

<?php mysqli_close($connection); ?>