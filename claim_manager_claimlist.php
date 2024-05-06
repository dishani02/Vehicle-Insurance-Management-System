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
    ?>

<div class="sidebar">
        <nav>
            <ul>
                
                <li><a href="claim_manager_claimlist.php">Customer list</a></li>
                <li><a class ="active" href="claim_manager_claimlist.php">Claims</a></li>
                <li><a href="claim_manager_paymentlist.php">Payments</a></li>
            </ul>
        </nav>
    </div>

    <div class="date">
    
        <form action="">
        <label class="label" for="starttime">Generate report from</label>
        <input class="date1" type="date" id="starttime" name="starttime">
        <label for="endtime">to<label for="starttime"></label>
        <input class="date2" type="date" id="endtime" name="endttime">
        <input class="submit" type="submit" id="generate" value="Generate">
        </form>
    </div>


    <div class="tabcontainer">
    
    </div>
    <div class='table-container'>
        <table>
            <thead>
                <tr>
                    <th>Claim ID</th>
                    <th>Vehicle No</th>
                    <th>Estimation(Rs)</th>
                    <th>Approval Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $sql="SELECT * FROM claim" ;
                    
                    $result=mysqli_query($conn,$sql);

                    if(mysqli_num_rows($result)>0){
                        while($row= mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>".$row["claim_id"]."</td>";
                            echo "<td>".$row["vehicle_id"]."</td>";
                            echo "<td>".$row["amount"]."</td>";
                            echo "<td id='status".$row["claim_id"]."'>".$row["status"]."</td>"; // Add an id for status cell
                            echo "<td>";
                            echo "<button onclick='updateStatus(".$row["claim_id"].", \"approve\")'>Approve</button>";
                            echo "<button onclick='updateStatus(".$row["claim_id"].", \"reject\")'>Reject</button>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
                
                ?>
                

            </tbody>
        </table>

    </div>

    <script>
        function updateStatus(claimId, newStatus) {
            if (confirm("Are you sure you want to " + newStatus + " this claim?")) {
                // Send AJAX request to update status
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Update status in the table
                            document.getElementById("status" + claimId).innerText = newStatus;
                        } else {
                            console.error("Error updating status:", xhr.status);
                        }
                    }
                };
                xhr.open("POST", "update_status.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("claim_id=" + claimId + "&status=" + newStatus);
            }
        }
    </script>
    

</body>
</html>
