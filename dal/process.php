<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form-create-account'])){
        include_once "account.php";

        $username = $_POST['create-username'];
        $password = $_POST['create-password'];
        echo $username;
        echo $password;
        //create_account($username, $password);
    }

    //For request from edit form.
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form-edit-information'])){
        include_once "update_information.php";

        $receivedData       = $_GET['username'];
        $id                 = $_GET['id'];
        $first_name         = $_POST['firstname'];
        $last_name          = $_POST['lastname'];
        $description        = $_POST['description'];
        $title              = $_POST['title'];
        $checkbox           = $_POST['check'];

        update_info($receivedData, $id, $first_name, $last_name, $description, $title);
    } 

    //For request from upload file form.
    function render_image(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formFile'])){

            $receivedData   = $_GET['username'];
            $id             = $_GET['id'];
            $alt            = $_POST['alt'];
            $fileName       = $_FILES['file']['name'];
            
            $fileTmpName    = $_FILES['file']['tmp_name'];
            $fileSize       = $_FILES['file']['size'];
            $fileError      = $_FILES['file']['error'];
            $fileType       = $_FILES['file']['type'];

            $fileExt        = explode('.', $fileName);
            $fileActualExt  = strtolower(end($fileExt));

            $allowed        = array('jpg', 'jpeg', 'png');

            if(in_array($fileActualExt, $allowed)){
                if($fileError === 0){
                    if($fileSize < 10000000){
    
                        $fileNameNew = "profile".$receivedData.".".$fileActualExt;
                        $fileDestination = 'image/teams/'.$fileNameNew;
                        
                        if(move_uploaded_file($fileTmpName, $fileDestination)){
                            exec_query(query_command::update_image_url($receivedData, $fileNameNew, urlencode($alt)));
                        }
                        
                    } else {
                        echo "Your file is too big!";
                    }
                } else {
                    echo "There was an error uploading your file!";
                }
            } else {
                echo "You cannot upload files of this type!";
            }
        }
    }

    function render_info_form(){
        $receivedData = isset($_GET['username'])? $_GET['username'] : null;
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

                $resultSkills = exec_select(query_command::$select_All_Skills);

                if($resultSkills->num_rows > 0){
                    echo "<div class='form-group row pb-3'>
                    <label for='inputDescription' class='col-sm-3 col-form-label'>Skills:</label>
                    <div class='col-sm-8'>";

                    while($row = $resultSkills->fetch_assoc()){
                        echo "
                                <div class='form-check form-check-inline'>
                                    <input class='form-check-input' type='checkbox' id='inlineCheckbox{$row['id']}' name='check{$row['id']}' value='{$row['id']}' ".(isChecked($row['s_name'], $selectedValues)?'checked' : '').">
                                    <label class='form-check-label' for='inlineCheckbox{$row['id']}'>{$row['s_name']}</label>
                                </div>";
                    }
                    echo "</div></div>";

                }
            }
            else
                render_skills();
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
                </div>";

                render_skills();
        }
    }

    function render_skills(){
        $result = exec_select(query_command::$select_All_Skills);

        if($result->num_rows > 0){
            echo "<div class='form-group row pb-3'>
            <label for='inputDescription' class='col-sm-3 col-form-label'>Skills:</label>
                <div class='col-sm-8'>";

            while($row = $result->fetch_assoc()){
                echo "  <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='inlineCheckbox{$row['id']}' name='check{$row['id']}' value='{$row['id']}'>
                            <label class='form-check-label' for='inlineCheckbox{$row['id']}'>{$row['s_name']}</label>
                        </div>";
            }
            echo "</div>
            </div>";
        }
    }

   
?>