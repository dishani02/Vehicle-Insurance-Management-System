<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
    //get customer id from session 
    $customerId = $_SESSION['customer_id'];

    //get customer details
    $query = "SELECT * FROM Customer WHERE customer_id = '$customerId'";

    $result = mysqli_query($connection, $query);

    $customer = mysqli_fetch_array($result, MYSQLI_ASSOC);

    //get customer contact details
    $query_1 = "SELECT * FROM Customer_Contact_no WHERE customer_id = '$customerId' ";

    $result_1  = mysqli_query($connection, $query_1) ;

    $contact_no_list = '';

    
    
    while($row = mysqli_fetch_array($result_1)) {
        $contact_no_list .= "<tr>";
        $contact_no_list .= "<td>" . $row['contact_no'] . "</td>";
        $contact_no_list .= "<td class='text-center'><button type='button' class='btn btn-danger delete-button' data-id='". $row['contact_no']."'><i class='fa-solid fa-trash'></i></button></td>";
        $contact_no_list .= "</tr>";
    }
?>



<?php
      if(isset($_POST['submit'])) {

        $messages = array();
    
        if(!isset($_POST['first_name']) || strlen(trim($_POST['first_name'])) < 1) {
            $messages['first_name'] = "First name is required";
        } 
    
        if(!isset($_POST['last_name']) || strlen(trim($_POST['last_name'])) < 1) {
            $messages['last_name'] = "Last name is required";
        } 
        
        if(!isset($_POST['nic']) || strlen(trim($_POST['nic'])) < 1) {
            $messages['nic'] = "NIC is required";
        }  
        
        if(!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1) {
            $messages['email'] = "Email is required";
        } 
         
        if(!isset($_POST['home_no']) || strlen(trim($_POST['home_no'])) < 1) {
            $messages['home_no'] = "Home number is required";
        } 
    
        if(!isset($_POST['street']) || strlen(trim($_POST['street'])) < 1) {
            $messages['street'] = "Street is required";
        } 
    
        if(!isset($_POST['city']) || strlen(trim($_POST['city'])) < 1) {
            $messages['city'] = "City is required";
        } 

    
        
    // if (empty($messages)) {
    //     //update user profile
    //     $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
    //     $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
    //     $nic = mysqli_real_escape_string($connection, $_POST['nic']);
    //     $email = mysqli_real_escape_string($connection, $_POST['email']);
    //     $home_no = mysqli_real_escape_string($connection, $_POST['home_no']);
    //     $street = mysqli_real_escape_string($connection, $_POST['street']);
    //     $city = mysqli_real_escape_string($connection, $_POST['city']);
    


    //  update user profile
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

        // if($result) {
        //     $_SESSION['first_name'] = $first_name;
        //     $messages['common'] = "Profile successfully updated!";
        // } 

        if($result) {
            $_SESSION['first_name'] = $first_name;
            $_SESSION['success_message'] = "Profile successfully updated!";
            header("Location: my-user-profile.php");
            exit();
        }  
        else {
            echo "Error: " .  $query . "<br>" . mysqli_error($connection);  
        }
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
    
?>

<?php 

    if(isset($_GET['action']) && $_GET['action'] == "delete") {
        
        $messages = array();

        if(isset($_GET['id'])) {

            $id = $_GET['id'];

            $delete_query = "DELETE FROM customer_contact_no WHERE contact_no = $id";

            if(mysqli_query($connection, $delete_query)) {
                $_SESSION['success_message'] = "Custom Contact successfully delete!";
                header("Location: my-user-profile.php");
                exit();
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
     <!--sweet alert-->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                // if(isset($messages) && !empty($messages['common'])) {
                //     echo '<div class="flash-message">
                //             <i class="fa-solid fa-check"></i>
                //             <p>'.$messages['common'].'</p>
                //         </div>';
                //     }
                ?>
                
                <?php
                if(isset($_SESSION['success_message'])) {
                    echo '<div class="flash-message"><i class="fa-solid fa-check"></i><p>' . $_SESSION['success_message'] . '</p></div>';
                    unset($_SESSION['success_message']);
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
                                    <?php
                                    if(isset($messages) && !empty($messages['first_name'])) {
                                    echo '<div class="error required">'.$messages['first_name'].'</div>';
                                    }
                                ?>
                            </div>

                            <div class="form-item flex flex-col">
                                <label for=""> Last Name <span class="required">*</span></label>
                                <input type="text" name="last_name" placeholder="Full Name"
                                    value="<?php echo $customer['last_name'] ?>">
                                    <?php
                                    if(isset($messages) && !empty($messages['last_name'])) {
                                        echo '<div class="error required">'.$messages['last_name'].'</div>';
                                    }
                                ?>
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
                                     <?php
                                    if(isset($messages) && !empty($messages['email'])) {
                                        echo '<div class="error required">'.$messages['email'].'</div>';
                                    }
                                ?>
                            </div>
                        </div>


                        <div class="flex flex-row form">
                            <div class="form-item flex flex-col">
                                <label for=""> Address<span class="required">*</span></label>
                                <input type="text" name="home_no" placeholder="home_no"
                                    value="<?php echo $customer['home_no'] ?>">
                                    <?php
                                    if(isset($messages) && !empty($messages['home_no'])) {
                                         echo '<div class="error required">'.$messages['home_no'].'</div>';
                                    }
                                ?>

                                <input type="text" name="street" placeholder="street"
                                    value="<?php echo $customer['street'] ?>">
                                     <?php
                                    if(isset($messages) && !empty($messages['street'])) {
                                        echo '<div class="error required">'.$messages['street'].'</div>';
                                    }
                                     ?>

                                    <div class="flex flex-row form"></div>
                                    <input type="text" name="city" placeholder="city"
                                    value="<?php echo $customer['city'] ?>">
                                    <?php
                                    if(isset($messages) && !empty($messages['city'])) {
                                        echo '<div class="error required">'.$messages['city'].'</div>';
                                    }
                                ?>

                            </div>
                        </div>

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
                        window.location = 'my-user-profile.php?action=delete&id=' + id;
                    }
        });
        });
        });
    </script>
</body>

</html>

<?php mysqli_close($connection); ?>