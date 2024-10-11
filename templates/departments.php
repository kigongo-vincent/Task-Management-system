<?php 

include("../components/header.php");

if($_SESSION["role"] != "super_admin"){
    header("Location: dashboard.php");
}

?>

<?php

require_once("../components/connect.php");

$sql = "SELECT d.name, u.photo, u.username, u.email, d.leader FROM department d LEFT JOIN user u on d.leader = u.email";

$res = mysqli_query($db_connection, $sql);

$departments_all_captured = mysqli_fetch_all($res);

?>

<body class="">

    <?php include("../components/navbar.php")?>

    <div class="container mt-60" >

        <h1 class="mt-5 py-3 mb-2">Departments</h1>

        <?php if(sizeof($departments_all_captured) > 0): ?>

        <div class="row my-1">

            <?php foreach($departments_all_captured as $department): ?>    
            <div class="col-lg-4">
                <div class="bg-black-500 mb-3 rounded p-3">
                       <?php echo $department[0] ?>
                    
                       <hr/>
                       <?php if(isset($department[2])): ?>
                        <div class="d-flex align-items-center">
                        <?php if(isset($department[1])): ?>
                                <div style="background-image: url(../uploads/<?php echo $department[1] ?>); background-position: center; background-size: cover;" class="img">
                                </div>
                                <?php else: ?>
                                    <div class="img bg-black-900">
                                </div>
                            <?php endif ?>
                            <span class="mx-2"><span class="opacity-75">headed by</span>, @<?php echo $department[2] ?></span>
                        </div>

                    <?php else: ?>  
                        <div style="height: 35px">This department has no supervisor</div> 
                    <?php endif ?>
                </div>
            </div>
            <?php endforeach ?>
        </div>

        <?php else: ?>

            <h1>No departments found</h1>

        <?php endif ?>    

    </div>
 
    <?php include("../components/footer.php") ?>

    <script>

const toggleSwitch=async(id)=>{
    // console.log(event.target.id)
    document.querySelector(`#U${id} .thumb`).classList.toggle("on")

    const isActive= document.querySelector(`#U${id} .thumb`).classList.contains("on")

    const is_active = isActive ? 1 : 0

    console.log(is_active)

    if(is_active == 1){
    document.querySelector(`#L${id}`).innerText = "activate account"
        
    }else{
    document.querySelector(`#L${id}`).innerText = "deactivate account"

    }

    const res = await fetch("/tasks/api/updateAccountState.php",{
        method: "POST",
        headers: {
            "Content-type": "application/json"
        },
        body: JSON.stringify({id: id, is_active: is_active == 0 ? 1 : 0})
    })

    if(res){

        const data =await res.json()

        setTimeout(() => {
       window.location = "workers.php"     
        }, 500);

    }


} 

    </script>
</body>
</html>