<?php session_start(); ?>

<?php require_once('inc/connection.php'); ?>


<?php

    //get customer id from session 
   $engineerid = $_SESSION['engineer_id'];


    //get  customer's vehicle details
    $query = "SELECT * FROM  claim_intimation WHERE engineer_id = '$engineer_id' ";
   

    $result  = mysqli_query($connection, $query) ;
 

    $claim_list = '';

    while($row = mysqli_fetch_array($result)) {
        $claim_list .= "<tr>";
        
    
        $claim_list .= "<td>" . $row['claim_intimation_id'] . "</td>";
        $claim_list .= "<td>" . $row['insured_name'] . "</td>";
        $claim_list .= "<td>" . $row['vehicle_no'] . "</td>";
        $claim_list .= "<td>" . $row['vehicle_model'] . "</td>";
        $claim_list .= "<td>" . $row['vehicle_category'] . "</td>";
        $claim_list .= "<td>" . $row['phone_number'] . "</td>";
        $claim_list .= "<td>" . $row['chassi_number'] . "</td>";
        $claim_list .= "<td>" . $row['driver_name'] . "</td>";
        $claim_list .= "<td>" . $row['date DATE ,'] . "</td>";
        $claim_list .= "<td>" . $row['place'] . "</td>";
        $claim_list .= "<td>" . $row['description'] . "</td>";
        $claim_list .= "<td>" . $row['vehicle_condition'] . "</td>";
        $claim_list .= "</tr>";
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claim List | Your Road to Safety and Savings</title>
    <link rel="stylesheet" href="css/style.css">
        <!--font awesome-->
        <script src="https://kit.fontawesome.com/72fb3712df.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once('inc/header.php') ?>

    <div class="container">
        <div class="flex">

        <div class="nav">
                <?php require_once('inc/chief-engineer-sidebar.php') ?>
            </div>

          

            <div class="flex flex-col content-wrapper">

                <ul class="bredcrumb">
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li><a href="chief-engineer-claimlist.php">Claim List</a></li>
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

             <h1 class="m-10">Claim List</h1>
            <table>
          
                    <tr>
                       
                        <th>claim_intimation_id </th>
                        <th>insured_name</th>
                        <th> vehicle_no</th>
                        <th>vehicle_model</th>
                        <th>vehicle_category</th>
                        <th>phone_number</th>
                        <th>chassi_number</th>
                        <th> driver_name</th>
                        <th>date</th>
                        <th>place</th>
                        <th>description</th>
                        <th>vehicle_condition</th>
                    </tr>
                    <tbody>
                         <?php echo $claim_list ?>
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