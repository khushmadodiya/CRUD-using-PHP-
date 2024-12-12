<?php
include "db.php";
$data = json_decode(file_get_contents("php://input"));

if(isset($data->id)){
    $id = $data->id;
    $sql = "Delete from users where uid = $id";
    if($conn->query($sql)=== TRUE){
        echo json_encode(["success"=> true,"message"=> "succesfully record deleted"]);
    }
    else{
        echo json_encode(["success"=> false,"message"=> "Some error occured"]);
    }
}
else{
    echo json_encode(["error"=> "Some error occure"]);
}

?>