<?php
include 'db.php';

// $data = json_decode(file_get_contents('php//:input'));

$sql = 'select * from users';
$result = $conn->query($sql);
$users = [];

while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}


    echo json_encode(["success"=>TRUE ,"data"=>$users]);
   


?>