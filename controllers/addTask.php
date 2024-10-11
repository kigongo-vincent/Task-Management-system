<?php
session_start();
include("../utils/POST.php");

if(isset($_POST["task"])){

    $data = [
        "task"=>$_POST["task"],
        "user"=>$_SESSION["user_id"]
    ];

    $res = POST("task", $data);

    if($res["status"] == 201){
        header("Location: ../templates/dashboard.php?msg=Your Task has been reported successfully");

    }else{
    header("Location: ../templates/dashboard.php?msg=Failed to create task, please try again");
    }

}
else{
    header("Location: ../templates/dashboard.php");
}

?>