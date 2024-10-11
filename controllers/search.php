<?php 

session_start();

if(isset($_POST["q"])){

    switch ($_SESSION["role"]) {

        case 'user':
            header(sprintf("Location: ../templates/dashboard.php?q=%s", $_POST["q"]));
            break;
        
        case 'admin':
            header(sprintf("Location: ../templates/staff.php?q=%s", $_POST["q"]));
            break;
        
        case 'super_admin':
            header(sprintf("Location: ../templates/admins.php?q=%s", $_POST["q"]));
            break;

        default:
            header("Location: ../templates/dashboard.php");
            break;
    }

}
else{
    header("Location: ../templates/dashboard.php");
}

?>