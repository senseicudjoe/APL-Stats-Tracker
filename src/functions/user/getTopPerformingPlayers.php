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
    p.player_id, 
    CONCAT(p.first_name,' ',p.last_name) as name, 
    ps.goals, 
    ps.assists
FROM 
    players p
INNER JOIN 
    player_stats ps
ON 
    p.player_id = ps.player_id
ORDER BY 
    ps.goals DESC, 
    ps.assists DESC
LIMIT 3;";

    $stmt = $conn->prepare($query);

    //execute statement
    if ($stmt -> execute()){
        $results = $stmt -> get_result();
        $players = [];

        if(!empty($results)){
            while($row = $results -> fetch_assoc()){
                $players[] = $row;
            }

            echo json_encode($players);
       
        }else{
            echo "<script> alert('No Teams Found. Add a new user') </script>";    
        }   
    
    }else{
        echo json_encode("Unable to load teams");
    }
    $stmt -> close();
}

$conn -> close();
?>