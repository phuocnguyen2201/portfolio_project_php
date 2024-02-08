<?php     
    session_start();
    include_once "dal/connection.php";
    include_once "dal/query.php";

    function login($username, $password){
        $match = exec_select(query_command::query_account($username, $password));
                
        if ($match->num_rows > 0 && !isset($_COOKIE['user'])) {
            setcookie("user", $username, time() + (24 * 60 * 60), "/");
            // Redirect to home page
            header("Location: ../home.php");
            exit();
        }
        else{
            header("Location: ../login.php?msg=invalid");
        }

   }

    