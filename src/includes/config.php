<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "football_management";

$conn = mysqli_connect($serverName, $userName, $password, $dbName) or die("Could not connect to Databse");

if ($conn->connect_error){
    die("connection failed");
}
?>