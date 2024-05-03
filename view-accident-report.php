<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
    $accidentId = $_GET['accident_id'];

    $query = "SELECT * FROM Accident WHERE accident_id = '$accidentId' ";

    $result = mysqli_query($connection, $query);

    $accident_report = mysqli_fetch_array($result, MYSQLI_ASSOC);

    //accident images
    $query_1 = "SELECT * FROM accident_image WHERE accident_id = '$accidentId'";

    $result_1 = mysqli_query($connection, $query_1);

    $images = '';

    while ($row = mysqli_fetch_array($result_1)) {
        $images .= "<img src='uploads/accidents/". $row['image']."' style='width:20%;'>";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Your Road to Safety and Savings</title>
    <link rel="stylesheet" href="css/style.css">
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/72fb3712df.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require_once('inc/header.php') ?>

    <div class="flex">
        <?php require_once('inc/agent-sidebar.php') ?>  

        <div class="flex flex-col content-wrapper">
            <ul class="bredcrumb">
                <li>Dashboard</li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li><a href="agent-reports.php">Reports</a></li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li><a href="view-accident-report.php">View Accident Report</a></li>
            </ul>

            <div class="flex flex-col view-accident-report">
                <div class="flex flex-col details">
                    <div class="flex flex-col">
                        <strong>Informant Name</strong>
                        <?php echo $accident_report['informant_name']; ?>
                    </div>

                    <div class="flex flex-col">
                        <strong>Vehicle Id</strong>
                        <?php echo $accident_report['vehicle_id']; ?>
                    </div>
                    
                    <div class="flex flex-col">
                        <strong>Date</strong>
                        <?php echo $accident_report['date']; ?>
                    </div>
                    
                    <div class="flex flex-col">
                        <strong>Place</strong>
                        <?php echo $accident_report['place']; ?>
                    </div>  
                    
                    <div class="flex flex-col">
                        <strong>Description</strong>
                        <?php echo $accident_report['description']; ?>
                    </div>
                </div>

                <div class="flex flex-col m-10">
                    <strong>Accident Images</strong>
                    <div class="flex m-10 images">
                        <?php echo $images; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php require_once('inc/footer.php') ?>
</body>
</html>

<?php mysqli_close($connection); ?>