<?php 

include("../components/header.php");

if($_SESSION["role"] != "super_admin"){
    header("Location: dashboard.php");
}

?>
<body class="">
    
    <?php include("../components/navbar.php") ?>


    <?php
    
    // get all staff members in dept 

    include("../utils/FILTER.php");

    $staff = [];

    $staff_res = FILTER($db_connection, "user", "role", "admin");

    if($staff_res["status"] == 200){
        $staff = $staff_res["data"];
    }

    if(isset($_GET["q"])){
        $staff = array_filter($staff, function($member){
            return str_contains($member[1], $_GET["q"]) || str_contains($member[2], $_GET["q"]);
        });
    }
    
    ?>

    <div class="container mt-60" >

        <p class="mt-5 py-3 mb-2">Administrators (department heads)</p>
        <?php if(sizeof($staff) > 0): ?>
        <div class="row my-1">
            <?php foreach($staff as $member): ?>
            <div class="col-lg-4">
                <div class="bg-black-500 mb-3 border-sm rounded p-3">
                    
                        <div class="container-fluid d-flex flex-column align-items-center">
    
                        <?php if(isset($member[4])): ?>
                            <div style="background-image: url(../uploads/<?php echo $member[4] ?>); background-position: center; background-size: cover;" class="img-lg" id="imageBox"></div>
                        <?php else: ?>
                            <div id="imageBox" style="background-image: ''; background-position: center; background-size: cover;" class="img-lg bg-black-900" >
                        </div>
                        <?php endif ?>
    
                            <div class="bg-black-900 rounded-edges px-4 py-2 my-3">
                                @<?php echo $member[1] ?>
                            </div>
    
                            <div>
                                <span><?php echo $member[2] ?></span>
                            </div>
                            <div class="border-sm mt-2 justify-content-between w-100 px-4 py-2 rounded d-flex align-items-center">
                                <span>Account status</span>
                                <div class="switch pointer" onclick="toggleSwitch(<?php echo $member[0] ?>)" id="U<?php echo $member[0] ?>">
                                    <div class="thumb  <?php if($member[8] == 1){ echo "on";} ?>" ></div>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <?php else: ?>

            <h1>No admins found</h1>

        <?php endif ?>    

    </div>

    <?php include("../components/footer.php") ?>
    

    <script>

const toggleSwitch=async(id)=>{
    // console.log(event.target.id)
    document.querySelector(`#U${id} .thumb`).classList.toggle("on")

    const isActive= document.querySelector(`#U${id} .thumb`).classList.contains("on")

    const is_active = isActive ? 1 : 0


    const res = await fetch("/tasks v2/api/updateAccountState.php",{
        method: "POST",
        headers: {
            "Content-type": "application/json"
        },
        body: JSON.stringify({id: id, is_active: is_active})
    })

} 

    </script>
</body>
</html>