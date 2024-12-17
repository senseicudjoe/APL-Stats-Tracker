<?php include "../../functions/user/userSession.php" ?>
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
    <style>
        .match-card-container {
            max-height: 400px; /* Set a maximum height */
            overflow-y: auto; /* Enable vertical scrolling */
        }
        .match-item {
            transition: background-color 0.3s ease;
        }
        .match-item:hover {
            background-color: #f8f9fa;
        }
        /* Custom scrollbar styling */
        .match-card-container::-webkit-scrollbar {
            width: 8px;
        }
        .match-card-container::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        .match-card-container::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }
        .match-card-container::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Include Navbar -->
        <?php include '../../templates/userNavbar.php'; ?>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            <div class="container bg-light p-3 rounded-3 shadow">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="ps-2">Welcome <?php echo $lastName ?>! 😎</h1>
                    <a href="../../auth/logout.php" class="btn btn-dark btn-lg">Logout</a>
                </div> 
            </div>

            <div class="container bg-light p-3 rounded-3 shadow mt-5" style="max-height: 600px; overflow-y: auto;">
                <div class="row mt-5">
                    <div class="col">
                    <div class="card">
                    <div class="card-header text-center bg-dark text-white">
                        <h3>Football Scores</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group match-card-container">
                            <!-- Match 1 -->
                            <!-- <div class="list-group-item match-item py-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-start w-25">
                                        <strong>Manchester City</strong>
                                    </div>
                                    <div class="text-center">
                                        <span class="badge bg-secondary fs-5">3 - 1</span>
                                    </div>
                                    <div class="text-end w-25">
                                        <strong>Liverpool</strong>
                                    </div>
                                </div>
                                <div class="text-center mt-2">
                                    <small class="text-muted">Full Time</small>
                                </div>
                            </div> -->
                            <div id="getMaches">

                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>       
    </div>
    <script src="../../../assets/js/user/get_matches.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
