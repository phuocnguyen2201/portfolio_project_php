<?php  
    include_once "connection.php";
    include_once "query.php";

    function update_info($username, $id, $first_name, $last_name, $description, $title){
    
        exec_query(query_command::remove_user_skill($username));
        for($i = 1; $i < 5; $i++){
            if(!empty($_POST['check'.$i])){
                exec_query(query_command::update_user_skill(intval($id), $i));
            }
        }
        exec_query(query_command::update_user_info($username, $first_name, $last_name, urlencode($description), $title));

    }
    function create_info($id, $first_name, $last_name, $description, $title){
        exec_query(query_command::create_user_info($id,$first_name, $last_name, urlencode($description), $title));
        for($i = 1; $i < 5; $i++){
            if(!empty($_POST['check'.$i])){
                exec_query(query_command::update_user_skill(intval($id), $i));
            }
        }
        header("Location: ../team.php");
    }
?>