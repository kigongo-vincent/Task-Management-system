<?php

// function for uploading new rows in a specified table 

// it takes in the name of the table and the data to be inserted into the table 

function POST($table, $data){

    $table_fields = "";

    $table_values = '';

    foreach ($data as $key => $value) {
        
        $table_fields .=  $key . ', ';

        $table_values .= sprintf('"%s", ', $value);
        
    }


    try {
        
        include("../components/connect.php");

        $sql = sprintf(
            
            'INSERT INTO %s (%s, %s) VALUES (NULL, %s);', 
            
            $table, 

            $table. "_id",
            
            substr($table_fields, 0,-2), 
            
            substr($table_values, 0, -2)
        
        );
    
        $response = mysqli_query($db_connection, $sql);

        if($response){

            return ["status" => 201];

        }else{

            echo $sql;

            return ["status" => 400];

        }

    } catch (\Throwable $th) {

        
        
        return ["status" => 418, "error"=> $th];

    }

}

?>