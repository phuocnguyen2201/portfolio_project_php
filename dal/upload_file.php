<?php
function render_picture(){

    $receivedData   = $_GET['username'];
    $id             = $_GET['id'];

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formFile'])){
        $alt            = $_POST['alt'];
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

                    exec_query(query_command::update_image_url($receivedData, $fileNameNew, urlencode($alt)));
                    
                    echo "<img class='img-thumbnail' alt='".($alt)."' src='image/teams/".($fileNameNew)."'>";
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
        $result = exec_select(query_command::query_user_info($receivedData));
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $alt = urldecode($row['alt_text']);
            echo "<img class='img-thumbnail' alt=\"$alt\" src='image/teams/".$row['image_url']."'>";
        }
    }
}
?>