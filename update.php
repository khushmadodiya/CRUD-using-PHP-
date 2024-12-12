<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"));

if (isset($data->id) && isset($data->name) && isset($data->email)) {
    $id = $data->id;
    $name = $data->name;
    $email = $data->email;
    $phone = $data->phone;

    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE uid=$id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => $conn->error]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid data"]);
}
?>
