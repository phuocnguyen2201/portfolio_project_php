<?php
    include_once "connection.php";
    include_once "query.php";

    function validate_account_exsited($username){
        $result = exec_select(query_command::query_user_info($username));

        if($result->num_rows > 0)
            return false;
        return true;
    }
    
    function create_account($username, $password){
        $flag = validate_account_exsited($username);
        if($flag){
            exec_query(query_command::create_user($username, $password));
            
            header("Location: ../login.php?msg=created");
            exit();
        }
        else    
        {
            header("Location: ../login.php?msg=existed");
        }
    }
?>