<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
    //get customer id from session 
    $customerId = $_SESSION['customer_id'];

    //get customer details
    $query = "SELECT * FROM Customer WHERE customer_id = '$customerId'";

    $result = mysqli_query($connection, $query);

    $customer = mysqli_fetch_array($result, MYSQLI_ASSOC);

    //get customer contcat details
    $query_1 = "SELECT * FROM Customer_Contact_no WHERE customer_id = '$customerId' ";

    $result_1  = mysqli_query($connection, $query_1) ;

    $contact_no_list = '';



    while($row = mysqli_fetch_array($result_1)) {
        $contact_no_list .= "<tr>";
        $contact_no_list .= "<td>" . $row['contact_no'] . "</td>";
        $contact_no_list .= "<td class='text-center'><button class='btn btn-danger'><i class='fa-solid fa-trash'></i></button></td>";
        $contact_no_list .= "</tr>";
    }
    
?>

<?php

    if(isset($_POST['submit'])) {

        $messages = array();

        //update user profile
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $home_no = $_POST['home_no'];
        $street = $_POST['street'];
        $city = $_POST['city'];

        $query = "UPDATE Customer SET 
        first_name = '$first_name', 
        last_name = '$last_name',
        email = '$email',
        home_no = '$home_no',
        street = '$street',
        city = '$city' 
        WHERE customer_id = '$customerId'";

        $result = mysqli_query($connection, $query);

        if($result) {
            $_SESSION['first_name'] = $first_name;
            $messages['common'] = "Profile successfully updated!";
        }

        //create contact number
        if(isset($_POST['contact_numbers'])) {
        
            foreach($_POST['contact_numbers'] as $contact_no) {

                $escapedContactNo = mysqli_real_escape_string($connection, $contact_no);

                $sql = "INSERT INTO Customer_Contact_no (contact_no, customer_id) VALUES ('$escapedContactNo', $customerId)";

                if (mysqli_query($connection, $sql)) {
                    $messages['common'] = "Contact number successfully created!";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Your Road to Safety and Savings</title>
    <link rel="stylesheet" href="css/style.css">
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/72fb3712df.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once('inc/header.php') ?>

    <div class="container">
        <div class="flex">

            <?php require_once('inc/customer-dash.php') ?>

            <div class="flex flex-col content-wrapper">

                <ul class="bredcrumb">
                    <li><a href="my-account-dashboard.php">Dashboard</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li><a href="my-user-profile.php">User Profile</a></li>
                </ul>

                <?php
                if(isset($messages) && !empty($messages['common'])) {
                    echo '<div class="flash-message">
                            <i class="fa-solid fa-check"></i>
                            <p>'.$messages['common'].'</p>
                        </div>';
                    }
                ?>
                

                <form action="my-user-profile.php" method="post">

                    <!--personal info-->
                    <div class="flex flex-col">
                        <h4> Personal Details </h4>
                        
                        <div class="flex flex-row form">
                            <div class="form-item flex flex-col">
                                <label for=""> First Name <span class="required">*</span></label>
                                <input type="text" name="first_name" placeholder="Full Name"
                                    value="<?php echo $customer['first_name'] ?>">
                            </div>

                            <div class="form-item flex flex-col">
                                <label for=""> Last Name <span class="required">*</span></label>
                                <input type="text" name="last_name" placeholder="Full Name"
                                    value="<?php echo $customer['last_name'] ?>">
                            </div>
                        </div>

                        <div class="flex flex-row form">
                            <div class="form-item flex flex-col">
                                <label for=""> NIC <span class="required">*</span></label>
                                <input type="text" name="nic" placeholder="NIC" value="<?php echo $customer['nic'] ?>"
                                    disabled>
                            </div>

                            <div class="form-item flex flex-col">
                                <label for="">Email <span class="required">*</span></label>
                                <input type="email" name="email" placeholder="email"
                                    value="<?php echo $customer['email'] ?>">
                            </div>
                        </div>


                        <div class="flex flex-row form">
                            <div class="form-item flex flex-col">
                                <label for=""> Address<span class="required">*</span></label>
                                <input type="text" name="home_no" placeholder="contact number"
                                    value="<?php echo $customer['home_no'] ?>">
                                <input type="text" name="street" placeholder="contact number"
                                    value="<?php echo $customer['street'] ?>">
                                    <div class="flex flex-row form"></div>
                                    <input type="text" name="city" placeholder="contact number"
                                    value="<?php echo $customer['city'] ?>">
                            </div>
                        </div>

                        


                           
                        

                        <!-- <div>
                            <h5>Policy Details </h5>
                            <div class="flex flex-col">
                                <label for="">Policy ID <span class="required">*</span></label>
                                <input type="text" name="" placeholder="Policy ID">



                            </div>

                            <div class="flex flex-col">
                                <p>Coverage Type</p>
                                <select name="Coverage Type" id="">
                                    <option value="">Select Coverage Type</option>
                                    <option value="Third Party">Third Party</option>
                                    <option value="Comprehensive">Comprehensive</option>
                                </select>
                            </div>

                            <div class="flex flex-col">
                                <label for="">Duration <span class="required">*</span></label>
                                <input type="number" name="" placeholder="Your Policy Duration">
                            </div>

                            <div class="flex flex-col">
                                <label for="">Registration Date <span class="required">*</span></label>
                                <input type="date" name="" placeholder="Registration Date">
                            </div>


                            <div class="flex flex-col">
                                <label for="">Expire Date <span class="required">*</span></label>
                                <input type="date" name="" placeholder="Expire Date">
                            </div>


                            <div class="flex flex-col">
                                <label for="">Vehicle Book <span class="required">*</span></label>
                                <input type="File" name="" placeholder="Add a file">
                            </div>

                            <div class="flex flex-col">
                                <label for="">Licence <span class="required">*</span></label>
                                <input type="File" name="" placeholder="Add a licience">
                            </div>
                        </div> -->
                    </div>

                    <!--contact numbers-->
                    <div class="flex flex-col">
                        <h4>Contact info</h4>

                        <div class="">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Contact number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo $contact_no_list; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="flex flex-col">
                            <div class="flex">
                                <button type="button" class="btn btn-primary" onclick="addInput()">
                                    <i class="fa-solid fa-plus"></i> 
                                    Add Contact number
                                </button>
                            </div>

                            <div class="flex flex-col" id="phoneNumberContainer"></div>
                        </div>
                    </div>


                    <div class="flex" style="margin-top: 10px">
                        <button type="submit" name="submit" class="btn btn-primary"
                            style="margin-right: 10px;">Update Profile</button>
                       
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php require_once('inc/footer.php') ?>
    <script>
        function addInput() {
            var newDiv = document.createElement("div");
            newDiv.className = "form-item flex-col";

            var newLabel = document.createElement("label");
            newLabel.textContent = "Phone Number ";

            var requiredSpan = document.createElement("span");
            requiredSpan.className = "required";
            requiredSpan.textContent = "*";

            newLabel.appendChild(requiredSpan);

            var flexDiv = document.createElement("div");
            flexDiv.className = "flex";

            var newInput = document.createElement("input");
            newInput.type = "number";
            newInput.name = "contact_numbers[]";
            newInput.placeholder = "Phone Number";
            newInput.required = true;

            var removeButton = document.createElement("button");
            removeButton.textContent = "Remove";
            removeButton.type = "button";
            removeButton.className = "btn btn-danger";

            removeButton.addEventListener("click", function() {
                newDiv.remove();
            });

            flexDiv.appendChild(newInput);
            flexDiv.appendChild(removeButton);

            newDiv.appendChild(newLabel);
            newDiv.appendChild(newInput);
            newDiv.appendChild(removeButton);

            document.getElementById("phoneNumberContainer").appendChild(newDiv);
        }
    </script>
</body>

</html>

<?php mysqli_close($connection); ?>