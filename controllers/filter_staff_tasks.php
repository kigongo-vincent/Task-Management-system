<?php

if(isset($_POST["start"]) && isset($_POST["end"])){

    if(isset($_GET["user_id"]) && isset($_GET["name"])){

        header(sprintf("Location: ../templates/staff_tasks.php?user_id=%s&name=%s&start=%s&end=%s", $_GET["user_id"], $_GET["name"], $_POST["start"], $_POST["end"]));

    }else{
    header("Location: ../templates/dashboard.php");

    }


}else{
    header("Location: ../templates/dashboard.php");
}

?>