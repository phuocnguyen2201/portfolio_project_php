<?php
    function render_picture(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formFile'])){

            $receivedData   = $_GET['username'];
            $user           = $_GET['alt'];
            $fileName       = $_FILES['file']['name'];
            
            $fileTmpName    = $_FILES['file']['tmp_name'];
            $fileSize       = $_FILES['file']['size'];
            $fileError      = $_FILES['file']['error'];
            $fileType       = $_FILES['file']['type'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png');

            if(in_array($fileActualExt, $allowed)){
                if($fileError === 0){
                    if($fileSize < 10000000){

                        $fileNameNew = "profile".$receivedData.".".$fileActualExt;
                        $fileDestination = 'image/teams/'.$fileNameNew;

                        move_uploaded_file($fileTmpName, $fileDestination);
                        
                        echo "<img class='img-thumbnail' alt='".$user."'s portrait' src='image/teams/".$fileNameNew."'>";
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
        else{
            echo "<img class='img-thumbnail' alt='Phuoc's portrait' src='image/teams/phuoc.jpg'>";
        
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
                            <textarea class='form-control' id='inputDescription' rows='3'>".$row['description']."</textarea>
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
                                <input class='form-check-input' type='checkbox' id='inlineCheckbox1' value='option1' ".(isChecked("Planning", $selectedValues)?'checked' : '').">
                                <label class='form-check-label' for='inlineCheckbox1'>Planning</label>
                                </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='checkbox' id='inlineCheckbox2' value='option2' ".(isChecked("Coding", $selectedValues)?'checked' : '').">
                                <label class='form-check-label' for='inlineCheckbox2'>Coding</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='checkbox' id='inlineCheckbox3' value='option3' ".(isChecked("Game Design", $selectedValues)?'checked' : '').">
                                <label class='form-check-label' for='inlineCheckbox3'>Game Design</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='checkbox' id='inlineCheckbox4' value='option4' ".(isChecked("Design", $selectedValues)?'checked' : '').">
                                <label class='form-check-label' for='inlineCheckbox4'>Design</label>
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