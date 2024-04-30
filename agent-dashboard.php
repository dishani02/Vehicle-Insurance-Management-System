<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Your Road to Safety and Savings</title>
    <link rel="stylesheet" href="css/style.css">
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/72fb3712df.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once('inc/header.php') ?>

    <div class="container">
        <div class="flex">
            <div class="nav">
                <?php require_once('inc/agent-sidebar.php') ?>
            </div>

            <div class="content">
                content here
                <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
            </div>
        </div>
    </div>

    <?php require_once('inc/footer.php') ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>


    <script>
        var xValues = ["2020", "2021", "2022", "2023", "2024"];
        var yValues = [35, 49, 44, 24, 55];
        var barColors = ["pink", "purple", "blue", "orange", "red"];

       

        const myChart = new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Chart.js Bar Chart'
                    }
                }
            },
        });
   </script>

   
</body>

</html>