<?php 


if(isset($_POST["start"]) && isset($_POST["end"])){

    header(sprintf("Location: ../templates/dashboard.php?start=%s&end=%s", $_POST["start"], $_POST["end"]));

}else{
    header("Location: ../templates/dashboard.php");
}

?>