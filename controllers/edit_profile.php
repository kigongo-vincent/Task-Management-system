<?php

session_start();

include("../utils/UPLOAD_PNG.php");
include("../utils/PATCH.php");

if(isset($_POST["username"]) && isset($_POST["email"])){

   $username = $_POST["username"];
   $email = $_POST["email"];

   $data = [

    "username" => $username,
    "email" => $email

   ];
   
   $image = "";

   if(isset($_FILES["image"]["name"])){

    $result = UPLOAD_PNG($_FILES["image"]["tmp_name"], $_SESSION["email"]);

    if($result["status"] == 201){
        $image = $result["data"];
        $data["photo"] = $image;
        $_SESSION["photo"] = $image;
    }

   }

   

   $response = PATCH("user", $_SESSION["user_id"], $data);

   if($response["status"] == 202){

    $_SESSION["username"] = $username;
    $_SESSION["email"] = $email;

    header("Location: ../templates/dashboard.php?msg=profile updated successfully");

   }
   else{
    header("Location: ../templates/dashboard.php?error=failed to update profile");
   }

}
else{
    header("Location: ../templates/dashboard.php");
}
?>