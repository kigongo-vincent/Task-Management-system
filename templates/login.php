


<?php include("../components/header.php"); 

if(isset($_SESSION["is_active"])){
    
    if($_SESSION["is_active"] == 1){
        header("Location: dashboard.php");
    }else{
        header("Location: blocked_account.php");
    }

}


?>
<body class="d-flex align-items-center justify-content-center fullwidth">
    
    <form action="../controllers/signin.php" method="post" class="bg-black-500 border-sm w-100-custom p-4 rounded">


       <div class="text-center mb-4">
        <h1 class="text-gradient">Task Management System</h1>
       <p>Smoothening your workflow</p>
       </div>

       <!-- email input  -->
        <div class="mb-3">
            <label for="">Company Email</label> <br>
            <input name="email" required type="email" placeholder="example@tekjuicee.com">
        </div>

        <!-- password input  -->
        <div class="mb-3">
            <label for="">Password</label> <br>
            <input name="password" required minlength="4" type="password" placeholder="***********">
        </div>

        <!-- submit  -->
         <input type="submit" value="Continue" class="linear-gradient w-100 border-0 py-2 rounded">

    </form>

    <!-- message  -->
     <?php if(isset($_GET["title"]) && isset($_GET["body"])): ?>
        <div class="alert bg-black-500 p-3 d-flex flex-column">
            <h1><?php echo $_GET["title"] ?></h1>
            <p><?php echo $_GET["body"] ?></p>
            <a href="login.php" class="close-btn bg-black-900 text-light align-self-end px-4 py-1 pointer rounded">close</a>
        </div>
    <?php endif ?>

    <script>
        window.addEventListener("load", ()=>{
  const alertComponent = document.querySelector(".alert")

  if(alertComponent){
    alertComponent.classList.add("show")
  }
})
    </script>

</body>
</html>