<?php

include("../utils/POST.php");
include("../utils/GET_ONE.php");
include("../utils/PATCH.php");
include("../components/connect.php");

if(isset($_POST["submit"])){

    $email = $_POST["email"];
    $password = password_hash("tekjuicee", PASSWORD_BCRYPT);
    $username = $email;
    $department = $_POST["department"];
    $is_active = 1;
    $role = "admin";

    // check for email uniqueness

    $account_res = GET_ONE($db_connection, "user", "email" , $_POST["email"]);

    if($account_res["status"] == 200){
        header("Location: ../templates/dashboard.php?msg=Account creation failed, email already registered");
    }
    else{
         

        $data = [
            "username" => $username,
            "email" => $email,
            "password" => $password,
            "role" => $role,
            "department" => $department,
            "is_active" => $is_active
        ];

        $res = POST("user", $data);

        if($res["status"] == 201){
            PATCH("department", $department, ["leader" => $email]);

            header("Location: ../templates/dashboard.php?msg=New admin has been added successfully");

        }else{
            header("Location: ../templates/dashboard.php?msg=Account creation failed please try again");
        }
    }

}else{
    header("Location: ../templates/dashboard.php");
}

?>