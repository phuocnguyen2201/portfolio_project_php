<?php 

function connect_and_query($query){
    try{
        $conn = mysqli_connect("host.docker.internal", "root", "password", "testing","6034");

        if(mysqli_connect_error()){
            echo mysqli_connect_error();
            die("");
        }
    
        $result = $conn->query($query);

        return $result;
    }
    catch (Exception $e){
        echo $e->getMessage();
    }
    finally{
        $conn->close();
    }
}
  
?>