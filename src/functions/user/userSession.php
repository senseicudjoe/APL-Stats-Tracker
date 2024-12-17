<?php
session_start();

// Check if the user is logged in by verifying the session ID
if (!isset($_SESSION['id']) || $_SESSION['role'] != 'user') {
    header('Location: ../../auth/login.php');
    exit();
}

// If user is logged in, assign the appropriate role variables
$userId = $_SESSION['id'];
$lastName = $_SESSION['name'];
$role = $_SESSION['role'];


?>
