<?php 

session_start();
  
  include("../utils/PATCH.php");

    if(isset($_POST["password"]) && isset($_POST["password1"])){

        $password = $_POST["password"];
        $password1 = $_POST["password1"];

        if($password == $password1){

            $response = PATCH("user", $_SESSION["user_id"], ["password" => password_hash($password, PASSWORD_BCRYPT)]);

            header("Location: ../templates/dashboard.php?msg=password updated successfully");


        }else{

            header("Location: ../templates/dashboard.php?msg=please provide matching passwords");

        }

    }

    else{
        header("Location: ../");
    }
  
  ?>