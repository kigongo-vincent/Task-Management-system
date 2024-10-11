<?php


function DELETE($table, $row){

    try {

        include("./components/connect.php");

        include("./utilities/GET_ONE.php");

        $result = GET_ONE($table, "id", $row);

        if($result["status"] != 200){

            return ["status" => 404];

        }

        $sql = sprintf('DELETE FROM %s WHERE %s.id = %s', $table, $table, $row);
    
        $response = mysqli_query($db_connection, $sql);

        if($response){
    
        return ["status"=> 202];

        }

        else{

            return ["status" => 400];

        }

    } catch (\Throwable $th) {
        
        return ["status" => 400, "error"=> $th];

    }

    mysqli_close();

}

?>