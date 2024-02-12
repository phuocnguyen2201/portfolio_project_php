<?php 

    $title ='Change Newpassword';
    $hero_title = "Change Newpassword";
    $description = "Welcome to G6! We are a passionate and dedicated team of IT student and professionals with a keen interest in software development.Our commitment to delivering high-quality results, coupled with a love for continuous learning, has driven our professional growth";
    
    $isNeedButton = false;

    $img_desc = "A man sitting on the rooftop and working with his laptop";
    $img_url = "image/avi-richards-Z3ownETsdNQ-unsplash.jpg";
    include "extension/header.php"?>
    <div class="content-white py-5">
    <div class="container-lg">
        <div class="row">
            <div class="col-lg-10">
                <?php 
                    if(isset($_COOKIE['user'])){
                        echo "
                        <h1 class='text-center'>Change password</h1>
                        <form class='py-3' action='dal/process.php' name='form-change-password' method='POST'>
                        <div class='form-group row pb-3'>
                            <label for='inputnewPassword' class='col-sm-3 col-form-label'>New password:</label>
                            <div class='col-sm-5'>
                            <input type='password' name='newPassword' class='form-control' id='inputnewPassword'>
                            <div id='newPasswordError' class='error_alert'>Please type something in newPassword box</div>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for='inputconfirmnewPassword' class='col-sm-3 col-form-label'>Confirm NewPassword:</label>
                            <div class='col-sm-5'>
                            <input type='password' name='confirmNewpassword' class='form-control' id='inputconfirmnewPassword'>
                            <div id='passError' class='error_alert'>Please type something in confirm NewPassword box</div>
                            </div>
                        </div>
                        <br>
                        <div class='form-group row' style='text-align: left;'>
                            <div class='col-sm-3'></div>
                            <div class='col-sm-8'><input class='btn-bottom' type='submit' name='form-change-password' value='Submit'></div>
                        </div>
                    </form>";
                        $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
                        if(!empty($msg) && $msg == 'invalid'){
                            echo "<h1 class='text-center'>Invalid username or password</h1>";
                        }
                    }
                   
                ?>
            </div>
            
        </div>
    </div>
</div>
<?php include "extension/footer.php"?>