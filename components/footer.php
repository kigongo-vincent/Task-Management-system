<!-- change password  -->
<div action="" method="post"
    class="modal fade"
    id="changePassword"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content max-width bg-black-500">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Change your password
                </h5>
                <button
                    type="button"
                    class="btn-close bg-light"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <form action="../controllers/change_password.php" method="post" class="modal-body">
                <p>New password</p>
               <input type="password" name="password" placeholder="*********" id="" required minlength="8">
               <p class="mt-3">Confirm password</p>
               <input type="password" name="password1" placeholder="*********" id="" required minlength="8"> <br>
               <input type="submit" name="submit" value="save changes" class="linear-gradient px-4 py-2 w-100 rounded my-3">
            </form>

            
        </div>
    </div>
</div>

    <!-- add a new user  -->
    <div action="" method="post"
    class="modal fade"
    id="addStaff"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content max-width bg-black-500">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Add a new user
                </h5>
                <button
                    type="button"
                    class="btn-close bg-light"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <form class="modal-body" action="../controllers/addStaff.php" method="post">
                <p>email</p>
               <input type="email" name="email" placeholder="example@gmail.com" id="" required >
               
               <br>
               <input type="submit" name="submit" value="add a new user" class="linear-gradient px-4 py-2 w-100 rounded my-3">
            </form>

            
        </div>
    </div>
</div>

 <!-- add a new admin  -->
 <div action="" method="post"
 class="modal fade"
 id="addAdmin"
 tabindex="-1"
 role="dialog"
 aria-labelledby="modalTitleId"
 aria-hidden="true"
>
 <div class="modal-dialog" role="document">
     <div class="modal-content max-width bg-black-500">
         <div class="modal-header">
             <h5 class="modal-title" id="modalTitleId">
                 Add a new admin
             </h5>
             <button
                 type="button"
                 class="btn-close bg-light"
                 data-bs-dismiss="modal"
                 aria-label="Close"
             ></button>
         </div>
         <form class="modal-body" action="../controllers/addadmin.php" method="post">
             <p>email</p>
            <input type="email" name="email" placeholder="example@gmail.com" id="" required >
            <br>
            <div class="mt-3">
                <p>Department</p>
                <select name="department" id="" class="py-2">
                    <?php foreach($departments as $department): ?>
                    <option value="<?php echo $department[1] ?>"><?php echo $department[0] ?></option>
                    <?php endforeach ?>
                </select>

               
            </div>
            <br>
            <input type="submit" name="submit" value="add a new user" class="linear-gradient px-4 py-2 w-100 rounded my-3">
         </form>

         
     </div>
 </div>
</div>

<!-- add a new department  -->
<div action="" method="post"
class="modal fade"
id="addDepartment"
tabindex="-1"
role="dialog"
aria-labelledby="modalTitleId"
aria-hidden="true"
>
<div class="modal-dialog" role="document">
    <div class="modal-content max-width bg-black-500">
        <div class="modal-header">
            <h5 class="modal-title" id="modalTitleId">
                Add a new department
            </h5>
            <button
                type="button"
                class="btn-close bg-light"
                data-bs-dismiss="modal"
                aria-label="Close"
            ></button>
        </div>
        <form class="modal-body" action="../controllers/addDept.php" method="post">
            <p>department</p>
           <input type="text" name="name" placeholder="e.g sales" id="" required minlength="5">
           
           <br>
           <input type="submit" name="submit" value="add a new department" class="linear-gradient px-4 py-2 w-100 rounded my-3">
        </form>

        
    </div>
</div>
</div>

<!-- filter tasks by date  -->
<div
class="modal fade"
id="filterTasks"
tabindex="-1"
role="dialog"
aria-labelledby="modalTitleId"
aria-hidden="true"
>
<div class="modal-dialog" role="document">
    <div class="modal-content max-width bg-black-500">
        <div class="modal-header">
            <h5 class="modal-title" id="modalTitleId">
                Filter tasks by date
            </h5>
            <button
                type="button"
                class="btn-close bg-light"
                data-bs-dismiss="modal"
                aria-label="Close"
            ></button>
        </div>
        <form class="modal-body" action="../controllers/filter_tasks_by_date.php" method="post">
            <p>starting date</p>
            <?php if(isset($_GET["start"])): ?>
                <input type="date" value=<?php echo $_GET["start"] ?> required name="start"  id="" >
            <?php else: ?>
                <input type="date" required name="start"  id="" >
            <?php endif ?>

           <p class="mt-3">ending date</p>
           <?php if(isset($_GET["end"])): ?>
                <input type="date" value=<?php echo $_GET["end"] ?> required name="end"  id="" >
            <?php else: ?>
                <input type="date" required name="end"  id="" >
            <?php endif ?>
           <br>
           <input type="submit" value="scan" class="linear-gradient px-4 py-2 w-100 rounded my-3">
        </form>

        
    </div>
</div>
</div>
    
    <!-- add task Modal -->
    <form action="../controllers/addTask.php" method="post"
        class="modal fade"
        id="addTask"
        tabindex="-1"
        role="dialog"
        aria-labelledby="modalTitleId"
        aria-hidden="true"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-black-500">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Report a task
                    </h5>
                    <button
                        type="button"
                        class="btn-close bg-light"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <p>About task</p>
                        <textarea name="task" required minlength="4" required class="w-100 border-sm text-light p-3 rounded" rows="3" placeholder="type somthing" id=""></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="linear-gradient px-4 py-2 rounded">Add task</button>
                </div>
            </div>
        </div>
    </form>

    <!-- task details modal  -->
    <div 
        class="modal fade"
        id="viewTask"
        tabindex="-1"
        role="dialog"
        aria-labelledby="modalTitleId"
        aria-hidden="true"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-black-500">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        About task
                    </h5>
                    <button
                        type="button"
                        class="btn-close bg-light"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <p class="task"></p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <!-- user profile modal  -->
    <div action="" method="post"
        class="modal fade"
        id="viewProfile"
        tabindex="-1"
        role="dialog"
        aria-labelledby="modalTitleId"
        aria-hidden="true"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-black-500">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Your profile
                    </h5>
                    <button
                        type="button"
                        class="btn-close bg-light"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid d-flex flex-column align-items-center">

                    <?php if(isset($_SESSION["photo"]) && $_SESSION["photo"]): ?>
                            <div style="background-image: url(../uploads/<?php echo $_SESSION["photo"] ?>); background-position: center; background-size: cover;" class="img-lg"></div>
                        <?php else: ?>
                            <div style="background-image: ''; background-position: center; background-size: cover;" class="img-lg bg-black-900" >
                        </div>
                        <?php endif ?>

                        <div class="bg-black-900 rounded-edges px-4 py-2 my-3">
                        <?php
                        $dept_res = GET_ONE($db_connection, "department", "department_id", $_SESSION["department"]);

                        if($dept_res["status"] == 200){
                            echo $dept_res["data"]["name"];
                        }else{
                            echo "super admin";
                        }
                        ?>
                        </div>

                        <div class="bg-black-900 p-3 rounded mt-4 w-100">
                            <h4><?php echo $_SESSION["username"] ?></h4>

                        <span><?php echo $_SESSION["email"] ?></span> <br>

                        <div class="border-sm rounded px-4 py-2 my-2">
                           you are logged in as <?php if($_SESSION['role'] == "user"): ?> a staff member <?php elseif($_SESSION['role'] == "admin"): ?> the admin <?php else: ?> the super admin <?php endif ?>
                        </div>

                        </div>
                        
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>

        <!-- edit profile modal  -->
        <div action="" method="post"
        class="modal fade"
        id="editProfile"
        tabindex="-1"
        role="dialog"
        aria-labelledby="modalTitleId"
        aria-hidden="true"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-black-500 max-width">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Edit Your profile
                    </h5>
                    <button
                        type="button"
                        class="btn-close bg-light"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <form class="modal-body" action ="../controllers/edit_profile.php" method="post" enctype="multipart/form-data">
                    <div class="container-fluid d-flex flex-column align-items-center">

                        <?php if(isset($_SESSION["photo"]) && $_SESSION["photo"]): ?>
                            <div style="background-image: url(../uploads/<?php echo $_SESSION["photo"] ?>); background-position: center; background-size: cover;" class="img-lg" id="imageBox"></div>
                        <?php else: ?>
                            <div id="imageBox" style="background-image: ''; background-position: center; background-size: cover;" class="img-lg bg-black-900" >
                        </div>
                        <?php endif ?>
                        <!-- username input  -->
                        <div class="w-100">
                            <p>Username</p>
                            <input name="username" value="<?php echo $_SESSION["username"] ?>" required minlength="4" type="text" placeholder="username">   
                        </div>
                         <br>
                         <!-- email input  -->
                         <div class="w-100">
                            <p>email</p>
                         <input name="email" type="email" placeholder="example@gmail.com" value="<?php echo $_SESSION["email"] ?>" required>
                         </div>

                         <div class="w-100 position-relative">
                            <div class="border-sm px-4 py-2 rounded d-flex align-items-center w-100 mt-3 pointer">
                                <img  src="../assets/icons/camera.svg" height="15px" alt="">
                                <span class="mx-2">select another profile picture</span>
                             </div>

                             <input name="image" id="files" onchange="updateImage()" type="file" style="left: 0; top: 0; width: 100%; height: 100%;" class="position-absolute opacity-0">
                         </div>
                        

                        
                            <input name="submit" type="submit" class="mt-3 w-100 linear-gradient px-4 py-2 rounded" value="save changes">
                        

                        </div>
                        
                        
                    </div>
                </form>
                
            </div>
        </div>
    </div>