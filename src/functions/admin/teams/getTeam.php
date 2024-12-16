<?php

//db connection
include "../../../includes/config.php";

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$team_id = $_GET['id'];
//Check for form data
if($_SERVER["REQUEST_METHOD"] == 'GET'){
    $query = "SELECT 
    team_id,
    team_name,
    founded_year,
    total_matches,
    total_wins,
    total_losses,
    total_draws
FROM 
    teams
WHERE 
    team_id = ?";
    //clean your data before passing it to database. Prevents SQL injection
    $stmt = $conn->prepare($query);
    //bind parameters to sql statement
    $stmt->bind_param('i',$team_id);
    //execute statement
    $stmt->execute();
    $results = $stmt -> get_result();
    $row = $results -> fetch_assoc();
    echo json_encode($row);
    $stmt ->close();
}

$conn -> close();
?>