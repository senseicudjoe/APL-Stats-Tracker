<?php

//db connection
include "../../includes/config.php";

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Check for form data
if($_SERVER["REQUEST_METHOD"] == 'GET'){
    //validate form data(server side)
    $query = "SELECT 
    m.match_id,
    m.home_team_score,
    m.away_team_score,
    t1.team_name AS home_team,
    t2.team_name AS away_team
FROM 
    matches m
JOIN 
    teams t1 ON m.home_team_id = t1.team_id
JOIN 
    teams t2 ON m.away_team_id = t2.team_id
ORDER BY 
    m.match_id DESC;
";

    $stmt = $conn->prepare($query);

    //execute statement
    if ($stmt -> execute()){
        $results = $stmt -> get_result();
        $matches = [];

        if(!empty($results)){
            while($row = $results -> fetch_assoc()){
                $matches[] = $row;
            }

            echo json_encode($matches);
       
        }else{
            echo "<script> alert('No Matches Found.') </script>";    
        }   
    
    }else{
        echo json_encode("Unable to load users");
    }
    $stmt -> close();
}

$conn -> close();
?>