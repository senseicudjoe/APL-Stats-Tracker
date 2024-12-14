<?php

//db connection
include "../../includes/config.php";

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$user_id = $_GET['id'];
//Check for form data
if($_SERVER["REQUEST_METHOD"] == 'GET'){
    $query = "SELECT 
    user_id,
    first_name,
    last_name,
    email,
    role
FROM 
    apl_users
WHERE 
    user_id = ?";
    //clean your data before passing it to database. Prevents SQL injection
    $stmt = $conn->prepare($query);
    //bind parameters to sql statement
    $stmt->bind_param('i',$user_id);
    //execute statement
    $stmt->execute();
    $results = $stmt -> get_result();
    $row = $results -> fetch_assoc();
    echo json_encode($row);
    $stmt ->close();
}

$conn -> close();
?>