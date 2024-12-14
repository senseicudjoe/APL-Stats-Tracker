<?php include "../../functions/admin/adminSession.php" ?>
<?php include "../../functions/admin/getDashboardData.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/css/nav.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="d-flex">
        <!-- Include Navbar -->
        <?php include '../../templates/navbar.php'; ?>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            <div class="container bg-light p-3 rounded-3 shadow">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="ps-2">Welcome <?php echo $lastName ?>! 😎</h1>
                    <button type="button" class="btn btn-dark btn-lg">Logout</button>
                </div> 
            </div>

            <div class="container bg-light p-3 rounded-3 shadow mt-5">
                <div class="row mt-5">
                    <div class="col">
                        <div class="container bg-dark rounded-3 shadow">
                            <div class="py-3">
                                <div class="text-white mb-3 fs-4">Total Teams</div>
                                <h1 id="active-patients-count" class="count text-white"><?php echo $total_teams ?></h1>
                            </div>
                        </div>

                        <div class="container bg-secondary rounded-3 shadow mt-5">
                            <div class="py-3">
                                <div class="text-white mb-3 fs-4">Total Players</div>
                                <h1 id="active-patients-count" class="count text-white"><?php echo $total_players ?></h1>
                            </div>
                        </div>

                        <div class="container bg-dark rounded-3 shadow mt-5">
                            <div class="py-3">
                                <div class="text-white mb-3 fs-4">Matches</div>
                                <h1 id="active-patients-count" class="count text-white"><?php echo $total_matches ?></h1>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="container text-center ">
                            <canvas id="myBarGraph" style="max-width: 100%; height: 500px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

             
        </div>       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function () {
        const ctx = $('#myBarGraph')[0].getContext('2d');

        // Create the bar graph
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Category A', 'Category B', 'Category C', 'Category D'],
                datasets: [{
                    label: 'Data Values',
                    data: [25, 35, 20, 40], // Example data
                    backgroundColor: '#000000', // Black for bars
                    borderColor: '#000000', // Black for borders
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            color: '#000000' // Black for legend text
                        }
                    },
                    title: {
                        display: true,
                        text: 'All-Black Bar Graph',
                        color: '#000000', // Black for title
                        font: {
                            size: 18
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: '#000000' // Black for x-axis labels
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)' // Subtle light gray for grid lines
                        }
                    },
                    y: {
                        ticks: {
                            color: '#000000' // Black for y-axis labels
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)' // Subtle light gray for grid lines
                        }
                    }
                }
            }
        });
    });





    </script>
</body>
</html>
