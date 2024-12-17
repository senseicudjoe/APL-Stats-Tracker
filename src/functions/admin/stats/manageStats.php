<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'football_management';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch match data from POST
$home_team = intval($_POST['home_team']);
$away_team = intval($_POST['away_team']);
$home_score = intval($_POST['home_score']);
$away_score = intval($_POST['away_score']);
$goal_scorers = json_decode($_POST['goal_scorers'], true); // Decode JSON to PHP array
echo "<script>console.log($home_team)</script>";
// Get the current year
$current_year = date('Y');

// Insert match details into matches table
$stmt = $conn->prepare("
    INSERT INTO matches (home_team_id, away_team_id, home_team_score, away_team_score, season_year) 
    VALUES (?, ?, ?, ?, ?)
");
$stmt->bind_param('iiiii', $home_team, $away_team, $home_score, $away_score, $current_year);
$stmt->execute();
$stmt->close();

// Update teams table
$conn->query("UPDATE teams SET total_matches = total_matches + 1 WHERE team_id IN ($home_team, $away_team)");

if ($home_score > $away_score) {
    $conn->query("UPDATE teams SET total_wins = total_wins + 1 WHERE team_id = $home_team");
    $conn->query("UPDATE teams SET total_losses = total_losses + 1 WHERE team_id = $away_team");
} elseif ($home_score < $away_score) {
    $conn->query("UPDATE teams SET total_wins = total_wins + 1 WHERE team_id = $away_team");
    $conn->query("UPDATE teams SET total_losses = total_losses + 1 WHERE team_id = $home_team");
} else{
    $conn->query("UPDATE teams SET total_draws = total_draws + 1 WHERE team_id = $away_team");
    $conn->query("UPDATE teams SET total_draws = total_draws + 1 WHERE team_id = $home_team");
}

// Update player statistics
foreach ($goal_scorers as $scorer) {
    $player_id = intval($scorer['player_id']);
    $goals = intval($scorer['goals']);
    $conn->query("UPDATE players SET goals_scored = goals_scored + $goals WHERE player_id = $player_id");
}

echo json_encode(['status' => 'success', 'message' => 'Match statistics updated successfully!']);
$conn->close();
?>
