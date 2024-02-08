<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form-create-account'])){
        include_once "account.php";

        $username = $_POST['create-username'];
        $password = $_POST['create-password'];

        create_account($username, $password);
    }
    function upate_info(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form-edit-information'])){
            $receivedData       = $_GET['username'];
            $id                 = $_GET['id'];
            $first_name         = $_POST['firstname'];
            $last_name          = $_POST['lastname'];
            $description        = $_POST['description'];
            $title              = $_POST['title'];
            
            exec_query(query_command::remove_user_skill($receivedData));
            for($i = 1; $i < 5; $i++){
                if(!empty($_POST['check'.$i])){
                    exec_query(query_command::update_user_skill(intval($id), $i));
                }
            }
            exec_query(query_command::update_user_info($receivedData, $first_name, $last_name, urlencode($description), $title));
        }
    }
    
    function render_info_form(){
        $receivedData = $_GET['username'];
        if($receivedData != null){
            $name   = exec_select(query_command::query_user_info($receivedData));
            $skill  = exec_select(query_command::query_user_skill($receivedData));
            
            if($name->num_rows > 0){
                $row = $name->fetch_assoc();
                echo "<div class='form-group row pb-3'>
                        <label for='inputFirstName' class='col-sm-3 col-form-label'>First Name:</label>
                        <div class='col-sm-8'>
                        <input type='text' name='firstname' class='form-control' id='inputFirstName' value='".$row['first_name']."'>
                        </div>
                    </div>
                    <div class='form-group row pb-3'>
                        <label for='inputLastName' class='col-sm-3 col-form-label'>Last Name:</label>
                        <div class='col-sm-8'>
                        <input type='text' name='lastname' class='form-control' id='inputLastName' value='".$row['last_name']."'>
                        </div>
                    </div>  
                    <div class='form-group row pb-3'>
                        <label for='inputDescription' class='col-sm-3 col-form-label'>Description:</label>
                        <div class='col-sm-8'>
                            <textarea class='form-control' name='description' id='inputDescription' rows='3'>".urldecode($row['description'])."</textarea>
                        </div>
                    </div>
                    <div class='form-group row pb-3'>
                        <label for='inputTitle' class='col-sm-3 col-form-label'>Title:</label>
                        <div class='col-sm-8'>
                        <input type='text' name='title' class='form-control' id='inputTitle' value='".$row['title']."'>
                        </div>
                    </div>";
            }
    
            
            if($skill->num_rows > 0){
                $selectedValues = array();

                function isChecked($value,$compareValues){
                    return in_array($value, $compareValues);
                }

                while($row = $skill->fetch_assoc()){
                    array_push($selectedValues, $row["s_name"]);
                }
                echo " 
                    <div class='form-group row pb-3'>
                        <label for='inputDescription' class='col-sm-3 col-form-label'>Skills:</label>
                        <div class='col-sm-8'>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='checkbox' id='inlineCheckbox1' name='check1' value='1' ".(isChecked("Coding", $selectedValues)?'checked' : '').">
                                <label class='form-check-label' for='inlineCheckbox1'>Coding</label>
                                </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='checkbox' id='inlineCheckbox2' name='check2' value='2' ".(isChecked("Planning", $selectedValues)?'checked' : '').">
                                <label class='form-check-label' for='inlineCheckbox2'>Planning</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='checkbox' id='inlineCheckbox3' name='check3' value='3' ".(isChecked("Design", $selectedValues)?'checked' : '').">
                                <label class='form-check-label' for='inlineCheckbox3'>Design</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='checkbox' id='inlineCheckbox4' name='check4' value='4' ".(isChecked("Game Design", $selectedValues)?'checked' : '').">
                                <label class='form-check-label' for='inlineCheckbox4'>Game Design</label>
                            </div>
                        </div>
                    </div>";
            }
            else{
                echo " 
                <div class='form-group row pb-3'>
                    <label for='inputDescription' class='col-sm-3 col-form-label'>Skills:</label>
                    <div class='col-sm-8'>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='inlineCheckbox1' name='check' value='1'>
                            <label class='form-check-label' for='inlineCheckbox1'>Coding</label>
                            </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='inlineCheckbox2' name='check' value='2'>
                            <label class='form-check-label' for='inlineCheckbox2'>Planning</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='inlineCheckbox3' name='check' value='3'>
                            <label class='form-check-label' for='inlineCheckbox3'>Design</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='inlineCheckbox4' name='check' value='4'>
                            <label class='form-check-label' for='inlineCheckbox4'>Game Design</label>
                        </div>
                    </div>
                </div>";
            }
        }
        else{
            echo " <div class='form-group row pb-3'>
                    <label for='inputFirstName' class='col-sm-3 col-form-label'>First Name:</label>
                    <div class='col-sm-8'>
                    <input type='text' name='firstname' class='form-control' id='inputFirstName'>
                    </div>
                </div>
                <div class='form-group row pb-3'>
                    <label for='inputLastName' class='col-sm-3 col-form-label'>Last Name:</label>
                    <div class='col-sm-8'>
                    <input type='text' name='lastname' class='form-control' id='inputLastName' >
                    </div>
                </div>
                <div class='form-group row pb-3'>
                    <label for='inputTitle' class='col-sm-3 col-form-label'>Title:</label>
                    <div class='col-sm-8'>
                    <input type='text' name='title' class='form-control' id='inputTitle'>
                    </div>
                </div>
                <div class='form-group row pb-3'>
                    <label for='inputDescription' class='col-sm-3 col-form-label'>Description:</label>
                    <div class='col-sm-8'>
                        <textarea class='form-control' id='inputDescription' rows='3'></textarea>
                    </div>
                </div>
                <div class='form-group row pb-3'>
                    <label for='inputDescription' class='col-sm-3 col-form-label'>Skills:</label>
                    <div class='col-sm-8'>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='inlineCheckbox1' value='option1'>
                            <label class='form-check-label' for='inlineCheckbox1'>Planning</label>
                            </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='inlineCheckbox2' value='option2'>
                            <label class='form-check-label' for='inlineCheckbox2'>Coding</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='inlineCheckbox3' value='option3'>
                            <label class='form-check-label' for='inlineCheckbox3'>Game Design</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='inlineCheckbox4' value='option4'>
                            <label class='form-check-label' for='inlineCheckbox4'>Design</label>
                        </div>
                    </div>
                </div>";
        }
    }

   
?>