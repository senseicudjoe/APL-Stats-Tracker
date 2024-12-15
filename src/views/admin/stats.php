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
</head>
<body>
    <div class="d-flex">
        <!-- Include Navbar -->
        <?php include '../../templates/navbar.php'; ?>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            <div class="container bg-light p-3 rounded-3 shadow">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="ps-2">GAME STATISTICS ENTRY</h1>
                    <button type="button" class="btn btn-dark btn-lg">Logout</button>
                </div> 
            </div>

            <div class="container bg-light p-3 mt-5 rounded-3 shadow overflow-auto" style="max-height: 600px;">
                <form method="POST" id="myForm" action="#">
                    <div class="row mt-4">
                        <div class="col">
                            <label for="seasonYear" class="form-label"><b>Season Year*</b></label>
                            <input type="number" id="seasonYear" min="2024" class="form-control"  name="seasonYear" >
                        </div>
                        <div class="col">
                            <label for="home-options" class="form-label"><b>Home Team*</b></label>
                            <select id="home-options" name="home-options" class="form-select">
                                <option value="">Select Home Team</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-4">
                    <div class="col">
                            <label for="away-options" class="form-label"><b>Away Team*</b></label>
                            <select id="away-options" name="away-options" class="form-select">
                                <option value="">Select Away Team</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="homeScore" class="form-label"><b>Home Score*</b></label>
                            <input type="number" id="homeScore" min="0" class="form-control"  name="homeScore" >
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <label for="awayScore" class="form-label"><b>Away Score*</b></label>
                            <input type="number" id="awayScore" min="0" class="form-control"  name="awayScore" >
                        </div>
                        <div class="col">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <label for="player" class="form-label"><b>Player Name*</b></label>
                            <select id="player" name="player" class="form-select">
                                <option value="">Select Goal Scorer</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="goals" class="form-label"><b>Away Score*</b></label>
                            <input type="number" id="goals" min="0" class="form-control"  name="goals" >
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-success btn-lg mt-4" id="addGoalScorer">Add Goal Scorer</button>
                        </div>
                    </div>



                    <div class="mt-3">
                        <h3>Goal Scorers</h3>
                        <div id = "goalScorers">
                        </div>
                    </div>
                    <button type="button" class="btn btn-dark btn-lg d-block mx-auto mt-4" id="submitMatch">Add Match</button>
                    
                </form>

            </div>
        </div>


        

        
    </div>
    <script src="../../../assets/js/admin/stats.js"></script>
    <script src="../../../assets/js/admin/fill_teams.js"></script>
    <script src="../../../assets/js/admin/fill_players.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
