<?php


include("../utils/GET_ONE.php");

include("../utils/GET.php");

include("../components/connect.php");

if(!isset($_SESSION["is_active"]) || !isset($_SESSION["user_id"]) || $_SESSION["is_active"] == 0 ){
    header("Location: blocked_account.php");
}

$response = GET_ONE($db_connection, "user", "user_id", $_SESSION["user_id"]);

$image = $response["data"]["photo"];

if(!isset($_SESSION["user_id"])){
  header("Location: login.php");
  return;
}

if(!$_SESSION["is_active"]){
  header("Location: blocked_account.php");
return;
}

$departments = [];

$dept_results = GET($db_connection, "department", TRUE);

$departments_all = $dept_results["data"];

if($dept_results["status"] ==200){

    $departments_data = $dept_results["data"];

    foreach($departments_data as $dept){
        if($dept[2] == ""){
            array_push($departments, $dept);
        }
    }

}

?>
 <nav class="navbar fixed-top navbar-dark shadow-sm bg-black-500 fixed-top">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">TMS</a>
            
            <div class="d-flex align-items-center">

                <span><span class="text-secondary">Hello</span>, <?php echo $_SESSION["username"] ?></span>

                <?php if(isset($_SESSION["photo"]) && $_SESSION["photo"]): ?>
                <div style="background-image: url(../uploads/<?php echo $_SESSION["photo"] ?>); background-position: center; background-size: cover;" class="img mx-3">
                   
                </div>
                <?php else: ?>
                    <div class="img mx-3 bg-black-900">
                </div>
                <?php endif ?>

                

                <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
            <div
                class="offcanvas offcanvas-end bg-black-500"
                tabindex="-1"
                id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel"
            >
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                        Menu
                    </h5>
                    <button
                        type="button"
                        class="btn-close text-reset bg-light"
                        data-bs-dismiss="offcanvas"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <form class="d-flex" action="../controllers/search.php" method="post">
                            <input
                                class="me-2"
                                type="search"
                                name="q"
                                placeholder="Search for <?php if($_SESSION["role"] == "user"){
                                    echo "tasks";
                                }elseif($_SESSION["role"] == "admin"){
                                    echo "staff members";
                                }else{
                                    echo "admins";
                                }
                                ?>"
                                aria-label="Search"
                            />
                            <button type="submit" class="d-flex align-items-center px-3 py-2 bg-black-900 rounded">
                                <img src="../assets/icons/search.svg" height="15px" alt="">
                                <span class="mx-2 text-white-100">Search</span>
                            </button>
                        </form>
                        <li class="nav-item mt-3">
                            <a
                                class="nav-link"
                                aria-current="page"
                                href="dashboard.php"
                                >Home</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pointer" data-bs-target="#viewProfile" data-bs-toggle="modal">View your profile</a>
                        </li>

                        <?php if($_SESSION["role"] == "user"): ?>
                        <li class="nav-item"></li>
                            <a class="nav-link pointer" data-bs-target="#addTask" data-bs-toggle="modal">Report a task</a>
                        </li>
                        <li class="nav-item"></li>
                            <a class="nav-link pointer" data-bs-toggle="modal" data-bs-target="#filterTasks">Filter tasks by date</a>
                        </li>
                        <?php endif ?>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-target="#editProfile" data-bs-toggle="modal" href="#">Edit your profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-target="#changePassword" data-bs-toggle="modal" href="#">Change your password</a>
                        </li>
                        <?php if($_SESSION["role"] == "admin"): ?>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-target="#addStaff" data-bs-toggle="modal" href="#">Add a new user</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="staff.php">View all staff members</a>
                        </li>
                        <?php endif ?>

                        <?php if($_SESSION["role"] == "super_admin"): ?>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-target="#addAdmin" data-bs-toggle="modal" href="#">Add a new admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-target="#addDepartment" data-bs-toggle="modal" href="#">Add a new department</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"href="admins.php">View all admins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="departments.php" href="#">View all departments</a>
                        </li>
                        <?php endif ?>
                        
                        
                        <li class="nav-item">
                            <a  class="nav-link pointer" onclick="Logout()">Logout</a>
                        </li>
                    </ul>
                   
                </div>
            </div>
        </div>
    </nav>

    <script>
        const Logout=()=>{
            const sure = confirm("Are you sure yu want to logout")

            if(sure){
                location.href = "../controllers/logout.php"
            }
        }
    </script>