<?php session_start(); ?>

<?php require_once('inc/connection.php') ?>

<?php
    if(!isset($_SESSION['first_name']) && !isset($_SESSION['agent_id'])) {
        header('Location: agent-login.php');
    }

    $agent_id = $_SESSION['agent_id'];

    $query = "SELECT v.vehicle_id FROM Customer c JOIN Vehicle v ON c.customer_id = v.customer_id WHERE c.agent_id = '$agent_id'";

    $result = mysqli_query($connection, $query);

    if($result) {
        
        $vehicle_list = '';

        while($row = mysqli_fetch_array($result)) {
            $vehicle_list .= "<option value='" . $row['vehicle_id'] . "'>";
            $vehicle_list .= $row['vehicle_id'];
            $vehicle_list .= "</option>";
        }
    }
?>

<?php
     $agentId = $_SESSION['agent_id'];

     $query_1 = "SELECT * FROM Accident WHERE agent_id = '$agentId' ";

     $result = mysqli_query($connection, $query_1);

     $accident_list = '';

     while($row = mysqli_fetch_array($result)) {
        $accident_list .= "<tr>";
        $accident_list .= "<td>" . $row['vehicle_id'] . "</td>";
        $accident_list .= "<td>" . $row['informant_name'] . "</td>";
        $accident_list .= "<td>" . $row['date'] . "</td>";
        $accident_list .= "<td>" . $row['place'] . "</td>";
        $accident_list .= "<td class='text-center'><div class='action-buttons'><a href='view-accident-report.php?accident_id=". $row['accident_id']."' class='btn btn-primary mr-5'><i class='fa-solid fa-eye'></i> View</a><button class='btn btn-danger delete-button' data-id='" . $row['accident_id']. "'><i class='fa-solid fa-trash'></i> Delete</button></div></td>";
        $accident_list .= "</tr>";
     }

?>

<?php
    if(isset($_POST['submit'])) {

        $messages = array();

        if(!isset($_POST['informant_name']) || strlen(trim($_POST['informant_name'])) < 1) {
            $messages['informant_name'] = "Informant name is required";
        }
        
        if(!isset($_POST['vehicle_id']) || strlen(trim($_POST['vehicle_id'])) < 1) {
            $messages['vehicle_id'] = "Vehicle Id is required";
        }

        if(!isset($_POST['date']) || strlen(trim($_POST['date'])) < 1) {
            $messages['date'] = "Date is required";
        }

        if(!isset($_POST['place']) || strlen(trim($_POST['place'])) < 1) {
            $messages['place'] = "Place is required";
        } 

        
        // if(!isset($_FILES['images[]'])) {
        //     $messages['images'] = "Accident images are required";
        // }
        

        if (empty($messages)) {
            $informant_name =  mysqli_real_escape_string($connection, $_POST['informant_name']);
            $vehicle_id =  mysqli_real_escape_string($connection, $_POST['vehicle_id']);
            $date =  mysqli_real_escape_string($connection, $_POST['date']);
            $place =  mysqli_real_escape_string($connection, $_POST['place']);
            $description =  mysqli_real_escape_string($connection, $_POST['description']);

            $agent_id = $_SESSION['agent_id'];

            $query =  "INSERT INTO Accident(agent_id,informant_name,vehicle_id,date,place,description)
            VALUES ('$agent_id','$informant_name','$vehicle_id','$date','$place','$description')";

            $result = mysqli_query($connection,  $query);

            if($result) {

                //upload accident images
                $accident_id = mysqli_insert_id($connection);

                $upload_path = "uploads/accidents/";

                foreach($_FILES['images']['name'] as $key => $image) {

                    $file_name = $_FILES['images']['name'][$key];            
                    $file_type = $_FILES['images']['type'][$key];
                    $temp_name = $_FILES['images']['tmp_name'][$key];
                    $file_size = $_FILES['images']['size'][$key];

                    move_uploaded_file($temp_name, $upload_path . $file_name);

                    $file_query = "INSERT INTO Accident_image (accident_id, image) VALUES('$accident_id', '$file_name')";
                    mysqli_query($connection, $file_query);
                }

                $_SESSION['success_message'] = "Claim Intimation successfully added!";
                header("Location: agent-reports.php");
                exit();
            } else{
                echo "Error: " .  $query . "<br>" . mysqli_error($connection);
            } 
        }
    }     
?>

<?php 

    if(isset($_GET['action']) && $_GET['action'] == "delete") {
        
        $messages = array();

        if(isset($_GET['id'])) {

            $id = $_GET['id'];

            $delete_query = "DELETE FROM Accident WHERE accident_id = $id";

            if(mysqli_query($connection, $delete_query)) {
                $_SESSION['success_message'] = "Claim Intimation successfully delete!";
                header("Location: agent-reports.php");
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
    <title>Dashboard | Your Road to Safety and Savings</title>
    <link rel="stylesheet" href="css/style.css">
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/72fb3712df.js" crossorigin="anonymous"></script>
    <!--sweet alert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            </ul>

            <?php
                if(isset($_SESSION['success_message'])) {
                    echo '<div class="flash-message"><i class="fa-solid fa-check"></i><p>' . $_SESSION['success_message'] . '</p></div>';
                    unset($_SESSION['success_message']);
                }
            ?>

            <h4 class="m-10">Claim Intimation Form</h4>

            <form action="agent-reports.php" method="post" enctype="multipart/form-data">
                <div class="flex flex-col">
                    <div class=" flex flex-row form">
                        <div class="form-item flex flex-col">
                            <label for=""> Name of the informant <span class="required">*</span></label>
                            <input type="text" name="informant_name" placeholder="Name of the informant">
                            <?php
                                    if(isset($messages) && !empty($messages['informant_name'])) {
                                        echo '<div class="error required">'.$messages['informant_name'].'</div>';
                                    }
                                ?>
                        </div>

                        <div class="form-item flex flex-col">
                            <label for=""> Vehicle ID<span class="required">*</span></label>
                            <select name="vehicle_id">
                                <option value="">Select Vehicle Id</option>
                                <?php echo $vehicle_list; ?>
                            </select>
                            <?php
                                    if(isset($messages) && !empty($messages['vehicle_id'])) {
                                        echo '<div class="error required">'.$messages['vehicle_id'].'</div>';
                                    }
                                ?>
                        </div>

                    </div>

                    <div class="flex flex-row form">
                        <div class="form-item flex flex-col">
                            <label for=""> Date of the Accident<span class="required">*</span></label>
                            <input type="date" name="date" placeholder="Date of the Accident">
                            <?php
                                    if(isset($messages) && !empty($messages['date'])) {
                                        echo '<div class="error required">'.$messages['date'].'</div>';
                                    }
                                ?>
                        </div>

                        <div class="form-item flex flex-col">
                            <label for=""> Place of the Accident<span class="required">*</span></label>
                            <input type="text" name="place" placeholder="Place of the Accident">
                            <?php
                                    if(isset($messages) && !empty($messages['place'])) {
                                        echo '<div class="error required">'.$messages['place'].'</div>';
                                    }
                            ?>
                        </div>
                    </div>

                    <div class="flex flex-row form">
                        <div class="form-item flex flex-col">
                            <label for="">Description of the accident<span class="required">*</span></label>
                            <textarea type="text" name="description" placeholder="Description of the accident"
                                rows="5"></textarea>
                            <?php
                                    if(isset($messages) && !empty($messages['description'])) {
                                        echo '<div class="error required">'.$messages['description'].'</div>';
                                    }
                                ?>
                        </div>
                    </div>

                    <div class="flex flex-row form">
                        <div class="form-item flex flex-col">
                            <label for=""> Add images<span class="required">*</span></label>
                            <input type="file" name="images[]" placeholder="Add images" multiple>
                            <?php
                                    if(isset($messages) && !empty($messages['images'])) {
                                        echo '<div class="error required">'.$messages['images'].'</div>';
                                    }
                                ?>
                        </div>
                    </div>

                    <div class="flex" style="margin-top: 5px">
                        <button type="submit" name="submit" class="btn btn-primary"
                            style="margin-right: 10px;">Submit</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                    </div>
                </div>
            </form>

            <h4 class="m-10">Accident Reports</h4>

            <table>
                <thead>
                    <tr>
                        <th>Vehicle Id</th>
                        <th>Informant</th>
                        <th>Date</th>
                        <th>Place</th>
                        <th>Action(s)</th>
                    </tr>
                </thead>

                <tbody>
                    <?php echo $accident_list; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php require_once('inc/footer.php') ?>

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
                        window.location = 'agent-reports.php?action=delete&id=' + id;
                    }
        });
    });
});
    </script>
</body>

</html>

<?php mysqli_close($connection); ?>