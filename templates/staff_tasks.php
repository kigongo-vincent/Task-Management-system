<?php include("../components/header.php") ?>

<!-- get tasks  -->
<?php 
include("../components/connect.php");
include("../utils/FILTER.php");

if($_SESSION["role"] != "admin" || !isset($_GET["user_id"]) || !isset($_GET["name"])){
    header("Location: dashboard.php");
}

$tasks = [];

$tasks_res = FILTER($db_connection, "task", "user", $_GET["user_id"]);

if($tasks_res["status"] == 200){
    $tasks = $tasks_res['data'];
}

if(isset($_GET["start"]) && isset($_GET["end"])){

    $tasks = [];

    $sql = sprintf("SELECT * FROM task WHERE created_at BETWEEN '%s' AND '%s' AND user = %s", $_GET["start"], $_GET["end"], $_GET["user_id"]);

    $searched_res = mysqli_query($db_connection, $sql);

    if(mysqli_num_rows($searched_res) > 0 ){
        $tasks = mysqli_fetch_all($searched_res);
    }

}


?>

<body class="">
    
    <?php include("../components/navbar.php") ?>

    <div class="container mt-60" >
        <?php if(sizeof($tasks) > 0): ?>
        <div class="bg-black-500 p-4 rounded">
            <h1>Filter <?php echo trim($_GET["name"]) ?>'s tasks by date</h1>
            
            <form action="../controllers/filter_staff_tasks.php?user_id=<?php echo $_GET["user_id"] ?>&name=<?php echo $_GET["name"] ?>" method="POST" class="d-lg-flex align-items-end bg-black-900 mt-4 p-4 rounded">
            <div>
            <p>starting date</p>
            <?php if(isset($_GET["start"])): ?>

                <input type="date" value=<?php echo $_GET["start"] ?> required name="start"  id="" >
                <?php else: ?>
                    <input type="date" required name="start"  id="" >

            <?php endif ?>

            </div>
            <div class="mx-1"></div>
           <div>
           <p class="mt-3">ending date</p>
          <?php if(isset($_GET["end"])): ?>

                <input type="date" value=<?php echo $_GET["end"] ?> required name="end"  id="" >
                <?php else: ?>
                    <input type="date" required name="end"  id="" >

            <?php endif ?>
           </div>
           <br>
           <div class="mx-1"></div>
          <div class="d-flex align-items-center align-self-end">
          <input type="submit" value="scan" class="bg-black-500 text-light px-4 py-2 rounded my-3">
          <div class="mx-1"></div>
          <a href="staff_tasks.php?name=<?php echo $_GET["name"] ?>&user_id=<?php echo $_GET["user_id"] ?>" class="nav-link rounded px-4 py-2 bg-black-500">Clear search</a>
          </div>
        </form>
         
        </div>
        <?php endif ?>

        <p class="mt-4">Tasks reported by @<?php echo trim($_GET["name"]) ?></p>

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
            <h1>No tasks reported by <?php echo $_GET["name"] ?></h1>
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