<?php

session_start();

session_destroy();

header("Location: ../templates/login.php?title=session terminated&&body=You have been logged out");

?>