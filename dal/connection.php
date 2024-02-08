<?php 

function connection(){
    try{

        $server = 'db';
        $user = 'root';
        $password = 'password';
        $database = 'phuoc';

        $conn = mysqli_connect($server, $user, $password, $database);

        if(mysqli_connect_error()){
            echo mysqli_connect_error();
            die("");
        }
        return $conn;
    }
    catch (Exception $e){
        echo $e->getMessage();
    }
}

function exec_query($query){
    if(connection()->query($query) === true){
        echo "<script>console.log('Success')</script>";
    }
    else
    {
        echo "Error: " . $query . "<br>" . connection()->error;
    }
    connection()->close();
}

function exec_select($query){
    $result = connection()->query($query);
    return $result;

    connection()->close();
}
?>