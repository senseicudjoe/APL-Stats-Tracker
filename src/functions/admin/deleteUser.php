<?php

//db connection
include "../../includes/config.php";

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Check for form data
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    //Sanittize id to make sure it is an integer
    $id = intval($_POST['id']);
    //validate form data(server side)
    $query = 'DELETE FROM apl_users WHERE user_id = ?';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    //execute statement
    if ($stmt -> execute()){
        echo json_encode(['success' => true, 'message' => 'Item deleted successfully.']);
    }else{
        echo json_encode(['success' => false, 'message' => 'Failed to delete the item.']);
    }
    $stmt->close();
    $conn -> close();

}else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}

?>