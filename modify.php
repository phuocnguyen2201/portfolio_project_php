<?php 

    $title ='Information | Portfolio';
    $hero_title = "Something not right?";
    $description = "Please correspond below.";
    
    $isNeedButton = false;

    $img_desc = "A pen layover in the notebook and a cup of coffee on the table.";
    $img_url = "image/kelly-sikkema-Lo6OIm82gTs-unsplash.jpg";

    include "extension/header.php";
    include "dal/process.php";
    include "dal/upload_file.php";
?>
    <div class="content-white py-5">
        <div class="container-lg">

        <div class="row">
                <div class="col-lg-4 text-center">
                    
                    <form name="formFile" method="post" enctype="multipart/form-data">
                    <?php

                        $receivedData = isset($_GET['username']) ? $_GET['username'] : '';
                        $id = isset($_GET['id']) ? $_GET['id'] : '';
                        $msg = isset($_GET['msg']) ? $_GET['msg'] : '';

                        upload_image();

                        $result = exec_select(query_command::query_user_info($receivedData));
                        if($result->num_rows > 0){
                            $row = $result->fetch_assoc();
                            $alt = urldecode($row['alt_text']);
                            echo "<img class='img-thumbnail' alt=\"$alt\" src='image/teams/".$row['image_url']."'>";
                    }?>
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control form-control-lg" name='file' id="formFile" type="file" accept=".jpg,.jpeg,.png">

                        <div class='form-group row my-3' style='text-align: left;'>
                            <label for='alt' class='col-sm-1 col-form-label'>Alt:</label>
                            <div class='col-sm-11'>
                                <input type='text' name='alt' class='form-control' id='alt' required>
                            </div>
                        </div>
                        <input class='btn-bottom my-4' type='submit' name='formFile' value='Upload'>
                    </form>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                    <form class='py-3' action="dal/process.php?msg=<?php echo $msg?>&id=<?php echo $id?>" name='form-edit-information' method='POST'>
                        <?php 
                            render_info_form();
                        ?>
                        <br>
                        <div class='form-group row' style='text-align: left;'>
                            <div class='col-sm-3'></div>
                            <div class='col-sm-8'><input class='btn-bottom' type='submit' name='form-edit-information' value='Save'></div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include "extension/footer.php"?>