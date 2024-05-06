


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
    <?php require_once("claim_manager_sidebar.php")?> 
    <?php
        // connect with databse
        require_once("config.php");

        //read data in database
        $sql="SELECT first_name,nic FROM customer";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            //read data
            while($row=$result->fetch_assoc()){
                echo $row["first_name"]."-".$row["nic"]."<br>";
            }
        }
        else{
            echo"error";
        }
    ?>

    <div class="date">
    
        <form action="">
        <input class="input" type="text" placeholder="Search by Reg No...">
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
                    <th>Policy No</th>
                    <th>Reg No</th>
                    <th>Coverage Type</th>
                    <th>Contact No</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Insuared Name</td>
                    <td>Policy No</td>
                    <td>Reg No</td>
                    <td>Coverage Type</td>
                    <td>Contact No</td>
                    <td>Contact No</td>
                </tr>

                <tr>
                    <td>Insuared Name</td>
                    <td>Policy No</td>
                    <td>Reg No</td>
                    <td>Coverage Type</td>
                    <td>Contact No</td>
                    <td>Contact No</td>
                </tr>

                <tr>
                    <td>Insuared Name</td>
                    <td>Policy No</td>
                    <td>Reg No</td>
                    <td>Coverage Type</td>
                    <td>Contact No</td>
                    <td>Contact No</td>
                </tr>

                <tr>
                    <td>Insuared Name</td>
                    <td>Policy No</td>
                    <td>Reg No</td>
                    <td>Coverage Type</td>
                    <td>Contact No</td>
                    <td>Contact No</td>
                </tr>

            </tbody>
        </table>
    </div>
    

</body>
</html>