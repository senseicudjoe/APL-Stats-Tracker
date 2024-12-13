<?php
//server male db coonnect
//submit form to server
//check if there's data
//server collect dat
//form validation
//check if user is already registered
//hash password
//send data to db
//execute
//check query execution

//db connection
include "../includes/config.php";

//Error checking and debugging
error_reporting(E_ALL);
ini_set("display errors",1);

//Check for form data
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    //validate form data(server side)
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['cpassword']);
    $userrole = 'user';

    //check if fields are empty
    if (empty($fname)||empty($lname)||empty($email)||empty($password)||empty($confirm_password)){
        die("Dont leave field empty");
    }

    if ($confirm_password != $password){
        die("Password doesn't match");
    }

    //clean your data before passing it to database. Prevents SQL injection
    $stmt = $conn->prepare('SELECT email from apl_users where email = ?');
    //bind parameters to sql statement
    $stmt->bind_param('s',$email);
    //execute statement
    $stmt -> execute();
    $results = $stmt -> get_result();

    if ($results->num_rows > 0){
        echo "<script> alert('registration failed, user already registered') </script>";
        echo "<script> window.location.href = register.php </script>";
    }else{
        //hash password before inserting into db
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        //Write a prepare statement to insert a new user into db
        $query = 'INSERT INTO apl_users(first_name,last_name,email,password_hash,role) VALUES (?,?,?,?,?) ';
        $stmt = $conn-> prepare($query);
        $stmt -> bind_param('sssss',$fname,$lname,$email,$hashed_password,$userrole);
        
        //if user has been registered redirect to login page

        if($stmt -> execute()){
            header("Location: ../auth/login.php");
        }else{
            header("Location: register.php");
            echo "<script> alert('registration failed!') </script>";
        }
    }
    $stmt ->close();
    

}

$conn -> close();
?>