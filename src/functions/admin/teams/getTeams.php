<?php

//db connection
include "../../../includes/config.php";

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Check for form data
if($_SERVER["REQUEST_METHOD"] == 'GET'){
    //validate form data(server side)
    $query = "SELECT team_id, team_name, total_matches, total_wins,total_losses,total_draws from teams";

    $stmt = $conn->prepare($query);

    //execute statement
    if ($stmt -> execute()){
        $results = $stmt -> get_result();
        $teams = [];

        if(!empty($results)){
            while($row = $results -> fetch_assoc()){
                $teams[] = $row;
            }

            echo json_encode($teams);
       
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