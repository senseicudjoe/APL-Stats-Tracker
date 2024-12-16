<?php

//db connection
include "../../../includes/config.php";

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Check for form data
if($_SERVER["REQUEST_METHOD"] == 'PUT'){
    $data = json_decode(file_get_contents('php://input'),true);
    //validate form data(server side)
    $fname = $data['fname'];
    $lname = $data['lname'];
    $position = $data['position'];
    $jersey = $data['jersey'];
    $DoB = $data['DoB'];
    $team_id = $data['team_id'];
    $matches = $data['total_matches'];
    $goals = $data['goals'];
    $assists = $data['assists'];
    $player_id = $data['id'];

    //check if fields are empty
    mysqli_begin_transaction($conn);

    try {
        // Update the player table
        $sql_update_player = "
            UPDATE players 
            SET first_name = ?, last_name = ?,position=?,jersey_number=?,date_of_birth=?,team_id = ?
            WHERE player_id = ?
        ";
        $stmt_player = mysqli_prepare($conn, $sql_update_player);
        mysqli_stmt_bind_param($stmt_player, "sssisii", $fname, $lname, $position, $jersey, $DoB, $team_id,$player_id);
        mysqli_stmt_execute($stmt_player);

        // Update the player's statistics in the player_stats table
        $sql_update_stats = "
            UPDATE player_stats 
            SET goals = ?, assists = ?
            WHERE player_id = ?
        ";
        $stmt_stats = mysqli_prepare($conn, $sql_update_stats);
        mysqli_stmt_bind_param($stmt_stats, "iii", $goals, $assists, $player_id);
        mysqli_stmt_execute($stmt_stats);

        // Commit the transaction
        mysqli_commit($conn);

        echo json_encode(['success' => true, 'message' => 'Player and statistics updated successfully..']);
        // echo "Player and statistics updated successfully.";

    } catch (Exception $e) {
        // Rollback the transaction in case of an error
        mysqli_rollback($conn);
        echo json_encode(['success' => false, 'message' => "Error updating player: " . $e->getMessage()]);
        // echo "Error updating player: " . $e->getMessage();
    }

    // Close the connection
    mysqli_close($conn);
    // if ($stmt -> execute()){
    //     echo json_encode(['success' => true, 'message' => 'Team updated successfully.']);
    // }else{
    //     echo json_encode(['success' => false, 'message' => 'Failed to update team details.']);
    // }
    // $stmt ->close();
}

// $conn -> close();
?>