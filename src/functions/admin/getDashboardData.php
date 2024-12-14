<?php

//db connection
include "../../includes/config.php";

//Check for form data

//validate form data(server side)
$query = "SELECT
                (SELECT COUNT(team_id) FROM teams) as total_teams,
                (SELECT COUNT(player_id) FROM players) as total_players,
                (SELECT COUNT(match_id) FROM matches) as total_matches";
$stmt = $conn->prepare($query);
$stmt -> execute();
$results = $stmt -> get_result();
$row = $results -> fetch_assoc();
$total_matches = $row['total_matches'];
$total_players = $row['total_players'];
$total_teams = $row['total_teams'];

// $tasks = [];

// if(!empty($results)){
//     while($row = $results -> fetch_assoc()){
//         $tasks[] = $row;
//     }

//     echo json_encode($tasks);
// }else{
//     echo json_encode("no tasks found, add a new task.");
// }
$stmt -> close();


$conn -> close();
?>