<?php

session_start();
include("../components/connect.php");
include("../utils/POST.php");
include("../utils/GET_ONE.php");

if(isset($_POST["name"])){

    

    $res = GET_ONE($db_connection, "department", "name", $_POST["name"]);

    if($res["status"] == 200){
      
    header("Location: ../templates/dashboard.php?msg=Department already exists, please select another name");
    }

    else{
      $response = POST("department", [
        "name" => $_POST["name"]
      ]);
      header("Location: ../templates/dashboard.php?msg=Department was successfully added");
    }

  }
  
  else{
    header("Location: ../templates/dashboard.php?msg=You are trying to act smart :)");
  }

?>