<?php 

    $title ='G6 | Portfolio';
    $hero_title = "We are G6";
    $description = "Welcome to G6! We are a passionate and dedicated team of IT student and professionals with a keen interest in software development.Our commitment to delivering high-quality results, coupled with a love for continuous learning, has driven our professional growth";
    session_start();
    
    include "header.php"?>

    
        <div class="content">   
        <div class="container-lg py-5">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mt-5">
                  <h1 class="title">Contact us</h1>
                  <p>We serve customers all around the world</p>
                </div>
                <div class="col-lg-6 col-md-12 mb-4">
                  <img class="img-thumbnail" alt="colleagues in a meeting" src="image/Meeting_Image.jpg">
                </div>
            </div>
        </div>
    </div>
    <div class="content-white">
        <div class="container-lg py-5">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mt-5">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mb-4 mt-3">
                            Address (Headquarter): Hämeenlinna, Finland<br/>Phone: +358 123456789
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mb-4 mt-5">
                        Address: Helsinki, Finland<br/>Phone: +358 123666789
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mb-4 mt-5">
                        Address: Espoo, Finland<br>Phone: +358 123456789
                    </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-4 mt-5 text-center">
                    <div style="width: 100%;" class="form-inquiry">
                        <h1 class="title text-center pt-3">
                            Leave Inquiry   
                        </h1>
                        <h2>
                        <?php
                        if (isset($_SESSION['status']) && $_SESSION['status'] == true) {
                            echo 'Your data was recorded!';
                            unset($_SESSION['status']);
                        } else if (isset($_SESSION['status'])){
                            $error = $_SESSION['error'];
                            echo 'Something went wrong. ';
                            
                            echo $_SESSION['error'];
                            unset($_SESSION['status']);
                            unset($_SESSION['error']);
                        }
                        ?>
                        </h2>
                        <form class="px-3 py-3" method="post" action="contact_process.php" onsubmit="return validateNumber()"><br>
                            <div class="form-group row pb-3 ">
                              <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10">
                                <input type="Email" class="form-control" name="email" id="inputEmail" placeholder="Enter your Email" required>
                              </div>
                            </div>
                            <div class="form-group row pb-3">
                              <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="inputName" placeholder="Enter you Name" required>
                              </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Telephone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="number" id="inputNumber" placeholder="Enter your Telephone number" required>
                                    
                                </div>
                                <span id="numberError"></span>
                            </div>
                            <script>
                            function validateNumber() {
                                const number = document.getElementById("inputNumber").value;
                                const errorNumber = document.getElementById("numberError");

                                //console.log("Given String is: " + number);
                                let check = number.charCodeAt(0);
                                //console.log(check);
                                if ((check != 43)){
                                    numberError.innerHTML = "Number must start with \"+\"";
                                    return false;
                                }
                                else {
                                    numberError.innerHTML = "";
                                    return true;
                                }

                                
                            }

                            document.getElementById("inputNumber").addEventListener("input", validateNumber);

                            </script>
                            <br>
                            <div class="form-group row" style="text-align: left;">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10"><input class="btn-bottom" name="submit" type="submit" value="Submit" id="submit"></div>
                                </div>
                            </div>
                            
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include "footer.php"?>
