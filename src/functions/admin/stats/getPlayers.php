<?php

//db connection
include "../../../includes/config.php";

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$team1_id = $_GET['id1'];
$team2_id = $_GET['id2'];

//Check for form data
if($_SERVER["REQUEST_METHOD"] == 'GET'){
    $query = "SELECT 
    p.player_id, 
    CONCAT(p.first_name,' ',p.last_name) AS player_name
FROM 
    players p
JOIN 
    teams t ON p.team_id = t.team_id
WHERE 
    p.team_id IN (?, ?)";
    //clean your data before passing it to database. Prevents SQL injection
    $stmt = $conn->prepare($query);
    //bind parameters to sql statement
    $stmt->bind_param('ii',$team1_id,$team2_id);
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
            echo "<script> alert('No Users Found. Add a new user') </script>";    
        }   
    
    }else{
        echo json_encode("Unable to load users");
    }
    $stmt -> close();
}

$conn -> close();
?>