<?php  
    include_once "connection.php";
    include_once "query.php";

    function update_info($username, $id, $first_name, $last_name, $description, $title){
        $connection = connection();
        $connection->begin_transaction();
        try{
            execution_with_transaction(query_command::remove_user_skill($username));
            for($i = 1; $i < 5; $i++){
                if(!empty($_POST['check'.$i])){
                    execution_with_transaction(query_command::update_user_skill(intval($id), $i));
                }
            }
            execution_with_transaction(query_command::update_user_info($id, $first_name, $last_name, urlencode($description), $title));
            $connection->commit();
        }
        catch(Exception $e){
            $connection->rollback();
        }
        finally{
            $connection->close();
        }

        
        header("Location: ../modify.php?username=$username&id=$id");

    }
    function create_info($id, $first_name, $last_name, $description, $title){
        try{
            $connection = connection();
            $connection->begin_transaction();
            exec_query(query_command::create_user_info($id,$first_name, $last_name, urlencode($description), $title));
            for($i = 1; $i < 5; $i++){
                if(!empty($_POST['check'.$i])){
                    exec_query(query_command::update_user_skill(intval($id), $i));
                }
            }
            $connection->commit();}
        catch(Exception $e){
            $connection->rollback();
        }
        finally{
            $connection->close();
        }
        
        header("Location: ../team.php");
    }
?>