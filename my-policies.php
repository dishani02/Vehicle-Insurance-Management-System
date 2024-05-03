<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
    //get customer id from session 
    $vehicle_id = $_GET['vehicle_id'];
 


    //get  customer's vehicle details
    $query = "SELECT * FROM Policy WHERE vehicle_id = '$vehicle_id' ";

    $result  = mysqli_query($connection, $query) ;

    $policy_list = '';

    while($row = mysqli_fetch_array($result)) {
        $policy_list .= "<tr>";
        $policy_list .= "<td>" . $row['policy_id'] . "</td>";
        $policy_list .= "<td>" . $row['vehicle_id'] . "</td>";
        $policy_list .= "<td>" . $row['coverage_type'] . "</td>";
        $policy_list .= "<td>" . $row['start_date'] . "</td>";
        $policy_list .= "<td>" . $row['end_date'] . "</td>";
        $policy_list .= "</tr>";
    }
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments | Your Road to Safety and Savings</title>
    <link rel="stylesheet" href="css/style.css">
        <!--font awesome-->
        <script src="https://kit.fontawesome.com/72fb3712df.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once('inc/header.php') ?>

    <div class="container">
        <div class="flex">

            <div class="nav">
                <?php require_once('inc/customer-dash.php') ?>
            </div>

            <div class="flex flex-col content-wrapper">

            <ul class="bredcrumb">
                    <li><a href="my-account-dashboard.php">Dashboard</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li><a href="my-vehicles.php">Vehicles</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li><a href="my-policies.php">Policies</a></li>
            </ul>



            <h2>Policies</h2>
            <table>
                    <tr>
                        <th>Policy ID</th>
                        <th>Vehicle ID</th>
                        <th>Coverage Type</th>
                        <th>Registration date</th>
                        <th>Expire Date</th>
                    </tr>    
                    
                    <tbody>
                            <?php echo $policy_list; ?>
                        </tbody>
                    
                </table>


                
          


<h4 class="text-center">Renew Policies Form</h4>

<form action="" method="post">
    <div class="flex flex-row form">
        <div>
            
            <div class="flex flex-col">
                <label for=""> Current  Vehicle ID <span class="required">*</span></label>
                <input type="text" name="" placeholder="Current  Vehicle ID">
            </div>

            <div class="flex flex-col">
                <label for="">Current Policy ID <span class="required">*</span></label>
                <input type="text" name="" placeholder="Current Policy ID">
            </div>


            <div class="flex flex-col">
                <label for="">Contact Number <span class="required">*</span></label>
                <input type="number" name="" placeholder="contact number">
            </div>
        </div>
            
         <div>
            <div class="flex flex-col">
                <label for="">Motor Insurance category<span class="required">*</span></label>
                <select>
                    <option value="volvo">Select category</option>
                    <option value="Car Insurance ">Car Insurance </option>
                    <option value="Three-Wheeler ">Three-Wheeler Insurance</option>
                    <option value="Motorcycle Insurance">Motorcycle Insurance</option>
                    <option value="Commercial Vehicle Insurance">Commercial Vehicle Insurance</option>
                </select>
            </div>

            <div class="flex flex-col">
                <label for="">Coverage Type<span class="required">*</span></label>
                <select>
                    <option value="Select Coverage Type">Select Coverage Type</option>
                    <option value="Third Party">Third Party</option>
                    <option value="Comprehensive">Comprehensive</option>
                   
                </select>
            </div>

            <div class="flex flex-col">
                <label for="">Duration<span class="required">*</span></label>
                <select>
                    <option value="Select Coverage Type">Select Duration</option>
                    <option value="6 months">6 months</option>
                    <option value="1 year">1 year</option>
                    <option value="2 year">2 year</option>
                </select>
            </div>
            </div>
           
            <div>
            <div class="flex flex-col">
                <label for="">installment Type<span class="required">*</span></label>
                <select>
                    <option value="Select Coverage Type">Select installment Type</option>
                    <option value="Monthly Payment">Monthly Payment</option>
                    <option value="Quarterly Payment">Quarterly Payment</option>
                    <option value="Semi-Annual Payment">Semi-Annual Payment</option>
                    <option value="Annual Payment">Annual Payment</option>
                </select>
            </div>

            <div class="flex flex-col">
                <label for="">Vehicle Book <span class="required">*</span></label>
                <input type="File" name="" placeholder="Add a file">
            </div>

            <div class="flex flex-col">
                <label for="">Licence <span class="required">*</span></label>
                <input type="File" name="" placeholder="Add a licience">
            </div>
            </div>
       
        
    </div>

    <div class="flex" style="margin-top: 10px">
        <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </div>
</form>

</div>


                




            </div> 
        </div>
    </div>

    <?php require_once('inc/footer.php') ?>
</body>

</html>
<?php mysqli_close($connection); ?>