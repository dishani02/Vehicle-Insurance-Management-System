
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
              
                <li><a href="claim_manager_customerlist.php">Customer list</a></li>
                <li><a  href="claim_manager_claimlist.php">Claims</a></li>
                <li><a class ="active" href="claim_manager_paymentlist.php">Payments</a></li>
            </ul>
        </nav>
    </div>
    <div class="date">
    
    <form action="">
        <label class="label" for="submit">Generate a report:</label>
        <input class="submit" type="submit" id="submit" value="Generate">
        </form> 
    </div>

    <div class='table-container'>
        <table>
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Insured Name</th>
                    <th>Amount(Rs)</th>
                    <th>Payment Date</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $sql="SELECT payment.customer_id,customer.first_name,payment.payment_date,payment.amount
                    FROM payment
                    JOIN customer
                    ON customer.customer_id=payment.customer_id" ;
                    
                    $result=mysqli_query($conn,$sql);

                    if(mysqli_num_rows($result)>0){
                        while($row= mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>".$row["customer_id"]."</td>";
                            echo "<td>".$row["first_name"]."</td>";
                            echo "<td>".$row["amount"]."</td>";
                            echo "<td>".$row["payment_date"]."</td>";
                            echo "</tr>";
                        }
                    }
                
                ?>
                

            </tbody>
        </table>
    </div>
    

</body>
</html>