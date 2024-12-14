<?php

//db connection
include "../../includes/config.php";

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Check for form data
if($_SERVER["REQUEST_METHOD"] == 'PUT'){
    $data = json_decode(file_get_contents('php://input'),true);
    //validate form data(server side)
    $fname = $data['fname'];
    $lname = $data['lname'];
    $email = $data['email'];
    $role = $data['role'];
    $user_id = $data['user_id'];
    

    //check if fields are empty
    if(empty($fname)||empty($lname)||empty($email)||empty($role)){
        die("Do not leave fields empty");
    }

    $query = "UPDATE apl_users SET first_name=?,last_name=?,email=?,role=? WHERE user_id = ?";
    //clean your data before passing it to database. Prevents SQL injection
    $stmt = $conn->prepare($query);
    //bind parameters to sql statement
    $stmt->bind_param('ssssi',$fname, $lname,$email,$role,$user_id);
    //execute statement
    

    if ($stmt -> execute()){
        echo json_encode(['success' => true, 'message' => 'User updated successfully.']);
    }else{
        echo json_encode(['success' => false, 'message' => 'Failed to update user details.']);
    }
    $stmt ->close();
}

$conn -> close();
?>