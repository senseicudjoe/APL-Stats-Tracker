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
                    <a href="../../auth/logout.php" class="btn btn-dark btn-lg">Logout</a>
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
    // AJAX request to fetch data for the bar graph
        $.ajax({
            url: '../../functions/admin/getBarGraphData.php', // PHP endpoint
            type: 'GET',
            dataType: 'json', // Expecting a JSON response
            success: function (data) {
                // Parse data for Chart.js
                const teamNames = data.map(team => team.team_name); // Extract team names
                const teamWins = data.map(team => team.total_wins); // Extract team wins

                // Get the canvas context for Chart.js
                const ctx = $('#myBarGraph')[0].getContext('2d');

                // Create the bar graph
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: teamNames, // Labels for the x-axis
                        datasets: [{
                            label: 'Goals', // Dataset label
                            data: teamWins, // Data for the y-axis
                            backgroundColor: '#000000', // Black bar color
                            borderColor: '#000000', // Black border color
                            borderWidth: 1 // Bar border width
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top', // Legend position
                                labels: {
                                    color: '#000000' // Black legend text
                                }
                            },
                            title: {
                                display: true,
                                text: 'Top Teams Goal Contributions', // Chart title
                                color: '#000000', // Black title text
                                font: {
                                    size: 18 // Title font size
                                }
                            }
                        },
                        scales: {
                            x: {
                                ticks: {
                                    color: '#000000' // Black x-axis labels
                                },
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.1)' // Light gray grid lines
                                }
                            },
                            y: {
                                ticks: {
                                    color: '#000000' // Black y-axis labels
                                },
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.1)' // Light gray grid lines
                                }
                            }
                        }
                    }
                });
            },
            error: function (xhr, status, error) {
                // Log any errors to the console
                console.error('Error fetching data:', error);
            }
        });
    });


    </script>
</body>
</html>
