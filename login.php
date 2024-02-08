<?php 

    $title ='Login';
    $hero_title = "Login";
    $description = "Welcome to G6! We are a passionate and dedicated team of IT student and professionals with a keen interest in software development.Our commitment to delivering high-quality results, coupled with a love for continuous learning, has driven our professional growth";
    
    $isNeedButton = false;

    $img_desc = "A man sitting on the rooftop and working with his laptop";
    $img_url = "image/avi-richards-Z3ownETsdNQ-unsplash.jpg";
    include "extension/header.php"?>
    <div class="content-white py-5">
    <div class="container-lg">
        <div class="row">
            <div class="col-lg-6">
                <?php 
                    if(isset($_COOKIE['user'])){
                        echo "<h1>Welcome ".$_COOKIE['user']."</h1>";
                    }
                    else{
                        echo "
                        <h1 class='text-center'>Login</h1>
                        <form class='py-3' action='dal/process.php' name='form-login' id='form-login' method='POST'>
                        <div class='form-group row pb-3'>
                            <label for='inputUserName' class='col-sm-3 col-form-label'>User Name:</label>
                            <div class='col-sm-8'>
                            <input type='text' name='username' class='form-control' id='inputUserName'>
                            <div id='nameError' class='error_alert'>Please type something in Username box</div>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for='inputPassword' class='col-sm-3 col-form-label'>Password:</label>
                            <div class='col-sm-8'>
                            <input type='password' name='password' class='form-control' id='inputPassword'>
                            <div id='passError' class='error_alert'>Please type something in Password box</div>
                            </div>
                        </div>
                        <br>
                        <div class='form-group row' style='text-align: left;'>
                            <div class='col-sm-3'></div>
                            <div class='col-sm-8'><input class='btn-bottom' type='submit' name='form-login' value='Submit'></div>
                        </div>
                    </form>";
                        $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
                        if(!empty($msg) && $msg == 'invalid'){
                            echo "<h1 class='text-center'>Invalid username or password</h1>";
                        }
                    }
                ?>
            </div>
            <div class="col-lg-6 right-border">
                <h1 class='text-center'>Don't have account yet?</h1>
                    <form class='py-3' action="dal/process.php" name='form-create-account' method='POST'>
                    <div class='form-group row pb-3'>
                        <label for='inputUserName' class='col-sm-3 col-form-label'>User Name:</label>
                        <div class='col-sm-8'>
                        <input type='text' name='create-username' class='form-control' id='inputUserName'>
                        </div>
                    </div>
                    <div class='form-group row'>
                        <label for='inputPassword' class='col-sm-3 col-form-label'>Password:</label>
                        <div class='col-sm-8'>
                        <input type='password' name='create-password' class='form-control' id='inputPassword'>
                        </div>
                    </div>
                    <br>
                    <div class='form-group row' style='text-align: left;'>
                        <div class='col-sm-3'></div>
                        <div class='col-sm-8'><input class='btn-bottom' type='submit' name='form-create-account' value='Create'></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "extension/footer.php"?>