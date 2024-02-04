<?php 

    $title ='Team | Portfolio';
    $hero_title = "Our Team";
    $description = "Let see your potential colleagues in the future.";

    $isNeedButton  = false;

    $img_url = "image/jason-goodman-Oalh2MojUuk-unsplash.jpg";
    $img_decs = "colleagues in a meeting";
    include "extention/header.php"?>
    <div class="content-white">
        <div class="container-lg py-5">
            <div class="row" id="phuoc23000">
                <div class="col-lg-4 text-center">
                    <img class="img-thumbnail" alt="Phuoc's portrait" src="image/teams/phuoc.jpg">
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <?php
                            if (isset($_COOKIE['username'])){
                                echo "<a href='modify.php?username=phuoc23000'><button type='button' id='phuoc23000' class='btn-secondary mb-4'>Edit information</button></a>";
                            }
                        ?>
                        <ul class="skill-list">
                            <li><h2 class="title-h2">Skills</h2></li>
                            <li><p class="fw-bold px-4">Planning</p></li>
                            <li><p class="fw-bold px-4">Design</p></li>
                            <li><p class="fw-bold px-4">Coding</p></li>
                        </ul>
                    </div>
                    <div class="row"><h2 class="title-h2 pb-3">Team Lead, Developer</h2></div>
                    <div class="row"><h2 class="title-h2 pb-3 italic">Phuoc Nguyen</h2></div>
                    <div class="row"><p>Currently, I'm a student seeking my first degree besides some certificate related to the IT domain. Moreover, I'm looking for a remote/hybrid job, so don't hesitate to reach me.</p></div>
                    <div class="row">
                        <div class="col-lg-5 col-sm-6"> 
                            <button type="button" class="btn-secondary mb-4">Book a meeting</button></div>
                        <div class="col-lg-5 col-sm-6"> 
                            <button type="button" class="btn-secondary mb-4">Contact</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-orange">
      <div class="container-lg py-5 text-center">
        <div class="row">
            <h1 class="title pb-5"> Other ways to reach our team member</h1>
        </div>
        <div class="row pb-3">
            <div class="col-lg-3 col-sm-3"><a href="#"><img class="square-social-logo" alt="Instagram's logo" src="image/favicon_io/instagram_icon.png"></a></div>
            <div class="col-lg-3 col-sm-3"><a href="#"><img class="square-social-logo" alt="Facebook's logo" src="image/favicon_io/facebook_icon.png"></a></div>
            <div class="col-lg-3 col-sm-3"><a href="#"><img class="square-social-logo" alt="Linkedin's logo" src="image/favicon_io/linkedin_icon.png"></a></div>
            <div class="col-lg-3 col-sm-3"><a href="https://github.com/AlekseiYes/Portfolio_Project"><img class="square-social-logo" alt="Github's logo" src="image/favicon_io/github_icon.png"></a></div>
        </div>
      </div>
    </div>
<?php include "extention/footer.php"?>