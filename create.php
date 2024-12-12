<?php
// Include database connection
include 'db.php';

// Ensure database connection is established
if (!$conn) {
    die("Database connection failed!");
}

// Read input data
$data = json_decode(file_get_contents("php://input"));

if (isset($data->name) && isset($data->email)) {
    $name = $data->name;
    $email = $data->email;
    $phone = isset($data->phone) ? $data->phone : '';

    $sql = "INSERT INTO users(name, email, phone) VALUES ('$name', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
    
        echo json_encode(["success" => true, "message" => "Record created successfully."]);
    } else {
      
        echo json_encode(["success" => false, "message" => $conn->error]);
    }
} else {

    echo json_encode(["success" => false, "message" => "Invalid data provided."]);
}
?>
