<?php

//db connection
include "../../../includes/config.php";

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$player_id = $_GET['id'];
//Check for form data
if($_SERVER["REQUEST_METHOD"] == 'GET'){
    $query = 'SELECT 
    p.player_id, 
    p.first_name,
    p.last_name, 
    p.date_of_birth,
    p.position,
    p.jersey_number,
    ps.games_played,
    ps.goals, 
    ps.assists, 
    t.team_id
FROM 
    players p
JOIN 
    player_stats ps ON p.player_id = ps.player_id
JOIN 
    teams t ON t.team_id = p.team_id
WHERE p.player_id = ?;';
    //clean your data before passing it to database. Prevents SQL injection
    $stmt = $conn->prepare($query);
    //bind parameters to sql statement
    $stmt->bind_param('i',$player_id);
    //execute statement
    $stmt->execute();
    $results = $stmt -> get_result();
    $row = $results -> fetch_assoc();
    echo json_encode($row);
    $stmt ->close();
}

$conn -> close();
?>