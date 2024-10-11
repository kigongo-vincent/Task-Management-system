<?php include("../components/header.php") ?>

<?php
ini_set("display_errors", "off");

if(!isset($_SESSION["is_active"])){
   header("Location: login.php");
}

if($_SESSION["is_active"]){
   header("Location: dashboard.php");
}
?>

   <body class="d-flex align-items-center justify-content-center fullwidth">
   
    <form action="../controllers/logout.php" class="bg-black-500 border-sm rounded w-100-custom p-5 shadow-d d-flex align-items-center justify-content-center flex-column">

        <!-- intro  -->
        <h1 >Blocked account</h1>
        <hr>
        <p class="sub-heading">Your account is still under review by the admin</p>
        <p class="text-center opacity-50">please be patient as the admin  <br>reviews your account</p>
        <!-- if error  -->
        <!-- <p class="error mt-2">please provide a valid password</p> -->

        <!-- submit button   -->
         <button type="submit" class="border-0 linear-gradient mt-4 py-2 rounded-edges w-100">
            Logout
         </button>
        </form>
   </body>

</html>


