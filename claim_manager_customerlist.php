


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
        // connect with databse
        require_once("config.php");
    ?>

<div class="sidebar">
       
        <nav>
            <ul>
               
                <li><a class ="active" href="claim_manager_customerlist.php">Customer list</a></li>
                <li><a  href="claim_manager_claimlist.php">Claims</a></li>
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

    <div class='table-container'>
        <table>
            <thead>
                <tr>
                    <th>Insured Name</th>
                    <th>NIC</th>
                    <th>Contact No</th>
                    
                </tr>
            </thead>

            <tbody>
                <?php
                    $sql="SELECT customer.first_name,customer.nic,customer_contact_no.contact_no
                    FROM customer
                    JOIN customer_contact_no
                    ON customer.customer_id=customer_contact_no.customer_id" ;
                    
                    $result=mysqli_query($conn,$sql);

                    if(mysqli_num_rows($result)>0){
                        while($row= mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>".$row["first_name"]."</td>";
                            echo "<td>".$row["nic"]."</td>";
                            echo "<td>".$row["contact_no"]."</td>";
                            echo "</tr>";
                        }
                    }
                
                ?>
                

            </tbody>
        </table>
    </div>
    

</body>
</html>