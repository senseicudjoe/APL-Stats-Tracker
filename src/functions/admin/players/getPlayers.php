<?php

//db connection
include "../../../includes/config.php";

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Check for form data
if($_SERVER["REQUEST_METHOD"] == 'GET'){
    //validate form data(server side)
    $query = "SELECT 
    players.player_id AS id,
    CONCAT(players.first_name, ' ', players.last_name) AS names,
    teams.team_name AS team_names,
    player_stats.goals,
    player_stats.assists
FROM 
    players
JOIN 
    teams ON players.team_id = teams.team_id
JOIN 
    player_stats ON players.player_id = player_stats.player_id;";

    $stmt = $conn->prepare($query);

    //execute statement
    if ($stmt -> execute()){
        $results = $stmt -> get_result();
        $users = [];

        if(!empty($results)){
            while($row = $results -> fetch_assoc()){
                $users[] = $row;
            }

            echo json_encode($users);
       
        }else{
            echo "<script> alert('No Users Found. Add a new user') </script>";    
        }   
    
    }else{
        echo json_encode("Unable to load users");
    }
    $stmt -> close();
}

$conn -> close();
?>