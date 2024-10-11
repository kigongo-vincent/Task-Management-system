<?php

function FILTER($db_connection, $table, $field_name, $field){

    try {

        $sql = sprintf('SELECT * FROM %s where %s  = "%s"', $table, $field_name, $field);
    
        $response = mysqli_query($db_connection, $sql);

        if(mysqli_num_rows($response) != 0){

        $count = mysqli_num_rows($response);
            
            $response = mysqli_fetch_all($response);
    
            return ["data"=> $response, "status"=> 200, "count" => $count];

        }

        else{

            return ["status" => 404, "count"=>0];

        }

    } catch (\Throwable $th) {
        
        return ["status" => 400, "error"=> $th];

    }

    mysqli_close();

}

?>