<?php 

    $title ='Information | Portfolio';
    $hero_title = "Something not right?";
    $description = "Please correspond below.";
    
    $isNeedButton = false;

    $img_desc = "A pen layout in the notebook and a cup of coffee on the table.";
    $img_url = "/portfolio_project_php/image/kelly-sikkema-Lo6OIm82gTs-unsplash.jpg";

    include "extention/header.php"?>
    <div class="content-white py-5">
        <div class="container-lg">
            <?php
                $receivedData = $_GET['username'];
                
                ?>
        <div class="row">
                <div class="col-lg-4 text-center">
                    <img class="img-thumbnail" alt="Phuoc's portrait" src="image/teams/phuoc.jpg">
                </div>
                <div class="col-lg-8">
                    <div class="row">
                    <form class='py-3' name='form-edit-information' method='POST'>
                        <div class='form-group row pb-3'>
                            <label for='inputFirstName' class='col-sm-3 col-form-label'>First Name:</label>
                            <div class='col-sm-8'>
                            <input type='text' name='firstname' class='form-control' id='inputFirstName'>
                            </div>
                        </div>
                        <div class='form-group row pb-3'>
                            <label for='inputLastName' class='col-sm-3 col-form-label'>Last Name:</label>
                            <div class='col-sm-8'>
                            <input type='text' name='lastname' class='form-control' id='inputLastName'>
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
                                <textarea class="form-control" id="inputDescription" rows="3"></textarea>
                            </div>
                        </div>
                        <div class='form-group row pb-3'>
                            <label for='inputDescription' class='col-sm-3 col-form-label'>Skills:</label>
                            <div class='col-sm-8'>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">Planning</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                                </div>
                            </div>
                        </div>
                        </div>
                      
                        <br>
                        <div class='form-group row' style='text-align: left;'>
                            <div class='col-sm-3'></div>
                            <div class='col-sm-8'><input class='btn-bottom' type='submit' name='form-login' value='Save'></div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include "extention/footer.php"?>