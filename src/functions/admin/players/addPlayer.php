<?php

//db connection
include "../../../includes/config.php";

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Check for form data
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    // Validate form data (server-side)
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $position = trim($_POST['position']);
    $jerseyNo = intval($_POST['jersey']);
    $DoB = trim($_POST['dob']);
    $team_id = intval($_POST['team']);

    // Check if fields are empty
    if (empty($fname) || empty($lname) || empty($position) || empty($jerseyNo) || empty($DoB) || empty($team_id)) {
        die("Don't leave fields blank");
    }

    // Start transaction
    mysqli_begin_transaction($conn);

    try {
        // Insert player into players table
        $stmt1 = mysqli_prepare(
            $conn,
            "INSERT INTO players (team_id, first_name, last_name, position, jersey_number, date_of_birth) 
             VALUES (?, ?, ?, ?, ?, ?)"
        );
        mysqli_stmt_bind_param($stmt1, "isssis", $team_id, $fname, $lname, $position, $jerseyNo, $DoB);
        mysqli_stmt_execute($stmt1);

        // Check if the player was inserted
        if (mysqli_stmt_affected_rows($stmt1) <= 0) {
            throw new Exception("Failed to insert player.");
        }

        // Get the last inserted player ID
        $player_id = mysqli_insert_id($conn);

        // Insert player stats into player_stats table
        $season = date("Y"); // Current year
        $stmt2 = mysqli_prepare(
            $conn,
            "INSERT INTO player_stats (player_id, games_played, goals, assists, season_year) 
             VALUES (?, 0, 0, 0, ?)"
        );
        mysqli_stmt_bind_param($stmt2, "ii", $player_id, $season);
        mysqli_stmt_execute($stmt2);

        // Check if stats were inserted
        if (mysqli_stmt_affected_rows($stmt2) <= 0) {
            throw new Exception("Failed to insert player stats.");
        }

        // Commit transaction
        mysqli_commit($conn);
        echo json_encode(['success' => true, 'message' => 'Player added successfully.']);
    } catch (Exception $e) {
        // Rollback transaction on error
        mysqli_rollback($conn);
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        // echo "Error: " . $e->getMessage();
    }

    // Close the statements and connection
    mysqli_stmt_close($stmt1);
    mysqli_stmt_close($stmt2);
    mysqli_close($conn);
}
?>
