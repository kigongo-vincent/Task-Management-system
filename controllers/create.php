<?php

session_start();

include("../utils/PATCH.php");

$user_id = $_SESSION["user_id"];

if(isset($_POST["department"]) && isset($_POST["role"])){
    
    $response = PATCH("user", $user_id, ["department"=> $_POST["department"], "role"=> $_POST["role"]]);

    if($response["status"] == 202){
        header("Location: ../templates/blocked_account.php");
    }
    else{
        header("Location: ../templates/create.php?msg=failed to update your account, try again");
    }

}
else{
    header("Location: ../templates/create.php");
}

?>