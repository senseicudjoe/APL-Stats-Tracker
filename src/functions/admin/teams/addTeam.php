<?php

//db connection
include "../../../includes/config.php";

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Check for form data
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    //Sanittize id to make sure it is an integer
    $team_name = trim($_POST['name']);
    $founded_year = trim($_POST['year']);

    //validate form data(server side)
    $query = "INSERT INTO teams (team_name, founded_year) VALUES (?,?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $team_name, $founded_year);
    //execute statement
    if ($stmt -> execute()){
        echo json_encode(['success' => true, 'message' => 'Team added successfully.']);
    }else{
        echo json_encode(['success' => false, 'message' => 'Failed to add team.']);
    }
    $stmt->close();
    $conn -> close();

}else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}

?>