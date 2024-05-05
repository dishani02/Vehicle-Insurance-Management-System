<?php 
session_start();
require_once('inc/connection.php');

$query = "SELECT * FROM Inquiry ORDER BY date DESC";
$result = mysqli_query($connection,$query);
$Inquiries = array();
while ($row = mysqli_fetch_assoc($result)){
    $Inquiries[]=$row;
}
mysqli_close($connection);

?>
<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset="UTF -8">
        <meta name="viewport" content="width=device-width,initial scale=1.0">
        <title>Inquiry List</title>
        <link rel=stylesheet href="css/styles.css">
    </head>
    <body>
        <div>
            <h1>Inquiry List</h1>
            <table>
                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Inquiry ID</th>
                        <th>Inquiry</th>
                        <th>date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Inquiries as $Inquiry):?>
                        <tr>
                            <td><?php echo $Inquiry ['customer_id'];?></td>
                            <td><?php echo $Inquiry ['inquiry_id'];?></td>
                            <td><?php echo $Inquiry ['inquiry'];?></td>
                            <td><?php echo $Inquiry['date'];?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <!--<script>
            document.addEventListener('DOMContentLoaded',function(){
                fetch('fetch_inquiries.php')
                .then(response=>response.json())
                .then(data=>{
                    const tbody=document.querySelector('tbody');
                    data.foeEach(inquiry=>{
                        const row=document.createElement('tr');
                        row.innerHTML=`
                        <td>${Inquiry.customer_id}</td>
                        <td>${Inquiry.inquiry_id}</td>
                        <td>${Inquiry.inquiry}</td>
                        <td>${Inquiry.date}</td>
                        `;
                        tbody.appendChild(row);

                    });
                })
                .catch(error=>console.error('Error:',error));
            });

        </script>-->


    </body>
</html>

