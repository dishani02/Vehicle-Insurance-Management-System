<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claims & Payments History | Your Road to Safety and Savings</title>
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
                    <li><a href="my-claim-history.php">Claims & Payments History</a></li>
                </ul>

            <div class="content">
                <h2>Payment History</h2>
                <table>
                    <tr>
                        <th>Policy ID</th>
                        <th>Vehicle ID</th>
                        <th>Coverage Type</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Method</th>
                        
                    </tr>

                    <tr>
                        <td>213</td>
                        <td>ty65</td>
                        <td>full</td>
                        <td>4500</td>
                        <td>2002/08/9</td>
                        <td>online</td>
                    </tr> 
                    
                    <tr>
                        <td>213</td>
                        <td>ty65</td>
                        <td>full</td>
                        <td>4500</td>
                        <td>2002/08/9</td>
                        <td>online</td>
                    </tr>
                    
                </table>

                <h2>Claims History</h2>
                <table>
                    <tr>
                        <th>Policy ID</th>
                        <th>Vehicle ID</th>
                        <th>Coverage Type</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Method</th>
                        
                    </tr>

                    <tr>
                        <td>213</td>
                        <td>ty65</td>
                        <td>full</td>
                        <td>4500</td>
                        <td>2002/08/9</td>
                        <td>online</td>
                    </tr> 
                    
                    <tr>
                        <td>213</td>
                        <td>ty65</td>
                        <td>full</td>
                        <td>4500</td>
                        <td>2002/08/9</td>
                        <td>online</td>
                    </tr>
                    
                </table>

              


             



            </div>
            </div>
        </div>
    </div>

    <?php require_once('inc/footer.php') ?>
</body>

</html>