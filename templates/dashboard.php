<?php include("../components/header.php") ?>

<!-- get tasks  -->
<?php 
include("../components/connect.php");
include("../utils/FILTER.php");

$tasks = [];

$tasks_res = FILTER($db_connection, "task", "user", $_SESSION["user_id"]);

if($tasks_res["status"] == 200){
    $tasks = $tasks_res['data'];
}

if(isset($_GET["start"]) && isset($_GET["end"])){

    $tasks = [];

    $sql = sprintf("SELECT * FROM task WHERE created_at BETWEEN '%s' AND '%s' AND user = %s", $_GET["start"], $_GET["end"], $_SESSION["user_id"]);

    $searched_res = mysqli_query($db_connection, $sql);

    if(mysqli_num_rows($searched_res) > 0 ){
        $tasks = mysqli_fetch_all($searched_res);
    }

}


if(isset($_GET["q"])){
    $tasks = array_filter($tasks, function($task){
        return str_contains($task[1], $_GET["q"]) || str_contains($task[3], $_GET["q"]);
    });
}


?>

<body class="">
    
    <?php include("../components/navbar.php") ?>

    <div class="container mt-60" >
        <div class="bg-black-500 p-4 rounded">
            <h1>Welcome to your dashboard</h1>
            <a href="https://wa.me/+256756643681" class="nav-link mb-4 text-secondary">get assistance on how to use the application</a>
            <?php if($_SESSION["role"] == "user"): ?>
                <button data-bs-toggle="modal" data-bs-target="#addTask" class="linear-gradient px-4 py-2 rounded d-flex align-items-center">
                    add a task  
                </button>
            <?php elseif($_SESSION["role"] == "admin"): ?>
                <button data-bs-toggle="modal" data-bs-target="#addStaff" class="linear-gradient px-4 py-2 rounded d-flex align-items-center">
                    add a staff member  
                </button>   
            <?php else: ?>
                <button data-bs-toggle="modal" data-bs-target="#addAdmin" class="linear-gradient px-4 py-2 rounded d-flex align-items-center">
                    add an admin    
                </button>
            <?php endif ?>        
        </div>

        <?php if($_SESSION["role"] == "user"): ?>
        <p class="mt-4">Tasks you've reported</p>


        <?php if(sizeof($tasks) > 0): ?>
        <div class="row my-1">
            <?php foreach($tasks as $task): ?>
            <div class="col-lg-4">
                <div class="bg-black-500 mb-3 rounded p-3">
                    <span>
                        <?php if(strlen($task[1]) > 50): ?>
                            <?php echo substr($task[1], 0, 50 - 3) . "..."  ?>
                        <?php else: ?>
                            <?php echo $task[1] ?>
                        <?php endif ?>
                    </span>
                    <hr class="opacity-25">
                    <span class="d-flex align-items-center justify-content-between">
                        <span class="opacity-75">Added, <?php echo $task[3] ?></span>
                        <span onclick="showTask('<?php echo $task[1] ?>')" data-bs-toggle="modal" data-bs-target="#viewTask" class="border-sm pointer px-4 py-2 pointer rounded" >
                            view details
                        </span>
                    </span>
                </div>
            </div>
            <?php endforeach ?>
        </div>

        <?php else: ?>

            <h1>No results found</h1>

        <?php endif ?>    
        <?php endif ?>    

    </div>
    
 
    <?php include("../components/footer.php") ?>

    <!-- message  -->
    <?php if(isset($_GET["msg"])): ?>
        <div class="alert show bg-black-500 p-3 d-flex flex-column">
            <h1>Hey, <?php echo $_SESSION["username"] ?></h1>
            <p><?php echo $_GET["msg"] ?></p>
            <a href="dashboard.php" class="close-btn bg-black-900 text-light align-self-end px-4 py-1 pointer rounded">close</a>
        </div>
    <?php endif ?>

</body>
</html>