<?php

function UPLOAD_PNG($temporary_strorage, $name){

    try {

        $name = $name.'.png';

        $destination = '../uploads/'.$name;

        move_uploaded_file($temporary_strorage, $destination);

        return ["status" => 201, "data" => $name];
    
} catch (\Throwable $th) {
    
    return ["status" => 400];

}

}

?>

