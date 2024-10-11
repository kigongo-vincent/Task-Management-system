<?php

session_start();

include("../utils/PATCH.php");

if($_SESSION["user_id"]){

    $response = PATCH("user", $_SESSION["user_id"], ["is_active" => 0]);

    if($response["status"] ==202){
        header("Location: logout.php");
    }

    else{

        header("Location: ../templates/dashboard.php");

    }

}else{
    header("Location: ../templates/login.php");

}

?>