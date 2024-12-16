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
    $name = $data['team_name'];
    $year = $data['year'];
    $matches = $data['matches'];
    $wins = $data['wins'];
    $losses = $data['losses'];
    $draws = $data['draw'];
    $team_id = $data['id'];

    

    //check if fields are empty
    if(empty($name)||empty($year)||empty($matches)||empty($wins)||empty($losses)||empty($draws)){
        die("Do not leave fields empty");
    }

    $query = "UPDATE teams SET team_name=?,founded_year=?,total_matches=?,total_wins=?,total_losses=?,total_draws=? WHERE team_id=?";
    //clean your data before passing it to database. Prevents SQL injection
    $stmt = $conn->prepare($query);
    //bind parameters to sql statement
    $stmt->bind_param('siiiiii',$name, $year,$matches,$wins,$losses,$draws,$team_id);
    //execute statement
    

    if ($stmt -> execute()){
        echo json_encode(['success' => true, 'message' => 'Team updated successfully.']);
    }else{
        echo json_encode(['success' => false, 'message' => 'Failed to update team details.']);
    }
    $stmt ->close();
}

$conn -> close();
?>