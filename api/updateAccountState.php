<?php

session_start();

include("../components/connect.php");
include("../utils/PATCH.php");

$result = trim(file_get_contents("php://input"));

$parsed_data = json_decode($result, TRUE);

$user = $parsed_data["id"];
$is_active = $parsed_data["is_active"];

$data=["is_active" => $is_active];

if($is_active == 0){
    $data["password"] = password_hash("tekjuicee", PASSWORD_BCRYPT);
}

$response = PATCH("user", $user, $data);

echo json_encode($response);

?>