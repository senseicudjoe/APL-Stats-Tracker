<?php include "../../functions/user/userSession.php" ?>
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
    <style>
        .badgem {
            width: 100px; /* Set a fixed width */
            text-align: center; /* Center-align the text */
            display: inline-block; /* Ensure the width is respected */
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
                    <h1 class="ps-2">STATS</h1>
                    <a href="../../auth/logout.php" class="btn btn-dark btn-lg">Logout</a>
                </div> 
            </div>

            <div class="container bg-light p-3 mt-5 rounded-3 shadow">
                <div>
                    <h1 class="text-center mb-3">TOP PERFORMING TEAMS</h1>
                    <ul class="list-group list-group-flush">
                        <div id="list">
                        </div>
                    </ul>
                </div>
            </div>

            <div class="container bg-light p-3 mt-5 rounded-3 shadow">
                <div>
                    <h1 class="text-center mb-3">TOP PERFORMING PLAYERS</h1>
                    <ul class="list-group list-group-flush">
                        <div id="player_list">
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        
    </div>

    <script src="../../../assets/js/user/fill_performing_teams.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
