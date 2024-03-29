<?php
function upload_image(){
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formFile'])){

        $receivedData   = $_GET['username'];
        $id             = $_GET['id'];
        $msg            = isset($_GET['msg']) ? $_GET['msg'] : '';

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
                        try{  
                            $connection = connection();
                            $connection->begin_transaction();
                            if($msg == ''){
                                execution_with_transaction(query_command::update_image_url($id, $fileNameNew, urlencode($alt)));
                            }
                            else if($msg == 'new_user'){
                                execution_with_transaction(query_command::create_image_url($id, $fileNameNew, urlencode($alt)));
                            }
                            $connection->commit();
                        }
                        catch(Exception $e){
                            echo $e->getMessage();
                        }
                        finally{
                            $connection->close();
                        }
                      
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
}?>