<?php

//db connection
include "../../includes/config.php";

//Check for form data

//validate form data(server side)
$query = "SELECT team_name, total_wins FROM teams ORDER BY total_wins DESC LIMIT 4";
$stmt = $conn->prepare($query);
$stmt -> execute();
$result = $stmt -> get_result();
$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($data);
$stmt -> close();
$conn -> close();
?>