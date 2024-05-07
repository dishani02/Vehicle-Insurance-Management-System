
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claims Manager|Dashboard</title>
    <link rel="stylesheet" href="css/manager_styles.css">

</head>

<body>
    <?php require_once("inc/header.php")?>

    <?php
        // connect with database
        require_once("config.php");

        // Function to fetch data from the database
        function fetchData($conn) {
            $data = array();
            $sql = "SELECT * FROM claim";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        // Function to write report to file
        function writeReport($data) {
            $reportContent = '';
            foreach($data as $row) {
                $reportContent .= $row['claim_id'] . "\t" . $row['vehicle_id'] . "\t" . $row['amount'] . "\n";
            }
            file_put_contents('report.txt', $reportContent);
        }

        // Generate report if form submitted
        if(isset($_POST['generate'])) {
            $data = fetchData($conn);
            writeReport($data);
            echo "Report generated successfully!";
        }
    ?>

<div class="sidebar">
        <nav>
            <ul>
                <li><a href="">Dashboard</a></li>
                <li><a href="claim_manager_claimlist.php">Customer list</a></li>
                <li><a class ="active" href="claim_manager_claimlist.php">Claims</a></li>
                <li><a href="claim_manager_paymentlist.php">Payments</a></li>
            </ul>
        </nav>
    </div>

    <div class="date">
    
        <form method="post">
        <label class="label" for="starttime">Generate report from</label>
        <input class="date1" type="date" id="starttime" name="starttime">
        <label for="endtime">to<label for="starttime"></label>
        <input class="date2" type="date" id="endtime" name="endttime">
        <input class="submit" type="submit" id="generate" name="generate" value="Generate">
        </form>
    </div>

</body>
</html>
