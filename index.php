<?php     
    session_start();
    include "dal/connection.php";
    include "dal/query.php";

   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

         // Login and set cookie
        if(isset($_POST['form-login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $match = connect_and_query(query_command::query_account($username, $password));
            
            if ($match->num_rows > 0 && !isset($_COOKIE['username'])) {
                setcookie("username", $username, time() + 200, "/");
            }

            // Redirect to home page
            header("Location: home.php");
            exit();
        }
    }
  
   
