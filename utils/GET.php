<?php


function GET($db_connection, $table, $many){

    try {

        $sql = "SELECT * FROM " . $table;
    
        $response = mysqli_query($db_connection, $sql);
        
        if($many){

            $count = mysqli_num_rows($response);
            
            $response = mysqli_fetch_all($response);
    
            return ["data"=> $response, "status"=> 200, "count" => $count];
            
        }
    
        $response= mysqli_fetch_assoc($response);
    
        return ["data"=> $response, "status"=> 200];
    

    } catch (\Throwable $th) {
        
        return ["status" => 400, "error"=> $th];

    }

    mysqli_close();

}

?>