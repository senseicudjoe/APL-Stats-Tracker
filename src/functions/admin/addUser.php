<?php

//db connection
include "../../includes/config.php";

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Check for form data
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    //validate form data(server side)
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $role = $_POST['role'];
    $password = trim($_POST['password']);
    $cpassword = trim($_POST['cpassword']);

    //check if fields are empty
    if(empty($fname)||empty($lname)||empty($email)||$role == " "){
        die("Don't leave fields blank");
    }

    if ($cpassword != $password){
        die("Password doesn't match");
    }

    $stmt = $conn->prepare('SELECT email from apl_users where email = ?');
    //bind parameters to sql statement
    $stmt->bind_param('s',$email);
    //execute statement
    $stmt -> execute();
    $results = $stmt -> get_result();

    if ($results->num_rows > 0){
        echo "<script> alert('registration failed, user already registered') </script>";
    }else{
        //hash password before inserting into db
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        //Write a prepare statement to insert a new user into db
        $query = 'INSERT INTO apl_users(first_name,last_name,email,password_hash,role) VALUES (?,?,?,?,?) ';
        $stmt = $conn-> prepare($query);
        $stmt -> bind_param('sssss',$fname,$lname,$email,$hashed_password,$role);
        
        //if user has been registered redirect to login page
        if ($stmt -> execute()){
            echo json_encode(['success' => true, 'message' => 'User added successfully.']);
        }else{
            echo json_encode(['success' => false, 'message' => 'Failed to add user.']);
        }
    }
}

$conn -> close();
?>