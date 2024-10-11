<?php

session_start();

include("../utils/GET_ONE.php");

include("../components/connect.php");

if(isset($_POST["email"])){

    $email = $_POST['email'];

    $password = $_POST["password"];

    $response = GET_ONE($db_connection, "user", "email", $email);

    $status = $response["status"];

    if($status == 200){

        $saved_password = $response["data"]["password"];

        if(password_verify($password, $saved_password)){

            $_SESSION["role"] = $response["data"]["role"];
            $_SESSION["username"] = $response["data"]["username"];
            $_SESSION["email"] = $response["data"]["email"];


            $_SESSION["user_id"] = $response["data"]["user_id"];

           if($response["data"]["photo"]){ 
            $_SESSION["photo"] = $response["data"]["photo"];
           }

            $_SESSION["is_active"] = $response["data"]["is_active"];

            $_SESSION["department"] = $response["data"]["department"];

            if($response["data"]["is_active"] == 0){
                header("Location: ../templates/blocked_account.php");
                return;
            }

            if($response["data"]["role"] == "admin"){

                header("Location: ../templates/dashboard.php");

            }else{

                header("Location: ../templates/dashboard.php");

            }

        }else{

            header("Location: ../templates/login.php?title=wrong password&&body=please try again with the correct password");

        }
        
    }
    else{

        header("Location: ../templates/login.php?title=user account not found&&body=Account under the sent email doesnot exist");


    }

}

?>