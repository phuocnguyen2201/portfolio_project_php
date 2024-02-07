<?php 

    $title ='G6 | Portfolio';
    $hero_title = "We are G6";
    $description = "Welcome to G6! We are a passionate and dedicated team of IT student and professionals with a keen interest in software development.Our commitment to delivering high-quality results, coupled with a love for continuous learning, has driven our professional growth";
    
    $isNeedButton = true;
    $button_name = "Read more";
    $button_path = "#";

    $img_desc = "A man sitting on the rooftop and working with his laptop";
    $img_url = "image/avi-richards-Z3ownETsdNQ-unsplash.jpg";

    include "extention/header.php"?>
    <div class="content-white">
      <div class="container-lg py-5">
        <div class="row pb-5 text-center">
          <h1 class="title">About us</h1>
          <p>We pride ourselves on delivering cutting-edge solutions and high-quality. With a relentless commitment to customer satisfaction, our team of experts strives to redefine standards and exceed expectations</p>
        </div>
        <?php 
            $result = exec_select(query_command::$select_All_Account);
            if($result->num_rows > 0){
                echo "<div class='row text-center'>";
                while($row = $result->fetch_assoc()){
                    echo "<div class='col-lg-3 col-md-12 mb-4'>
                                <a href='team.php#{$row['username']}'><img class='img-thumbnail square-thumbnail' alt='{$row['alt_text']}' src='image/teams/{$row['image_url']}'></a>
                                <a class='card-link' href='team.php#{$row['username']}'><h1>".$row['first_name']." ".$row['last_name']."</h1></a>
                        </div>";
                }
                echo "</div>";
            }
            ?>
        </div>
      </div>
    </div>
    <div class="content-black">
      <div class="container-lg py-5">
        <div class="row">
          <h1 class="title-white pb-5 text-center">Who inspiration us?</h1>
          <div id="carouselCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="image/inspiration/web_dev_simplified.png" class="d-block w-100" alt="Web dev simplified">
                <div class="carousel-caption d-none d-md-block">
                  <h4>Web Dev Simplified</h4>
                  <p>Web Dev Simplified is all about teaching web development skills and techniques in an efficient and practical manner.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="image/inspiration/tips-javascript.png" class="d-block w-100" alt="Tips JavaScript">
                <div class="carousel-caption d-none d-md-block">
                  <h4>Tips JavaScript</h4>
                  <p>An Vietnamese Software Enginner with more than 20 years experience, provide in-depth and cool tip, trick. Moreover, his POV about the tech industry.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="image/avi-richards-Z3ownETsdNQ-unsplash.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h4>Third slide label</h4>
                  <p>Some representative placeholder content for the third slide.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="content-orange">
      <div class="container-lg py-5">
        <div class="row">
          <div class="col-lg-6 vertical">
            <h1 class="title">Get to know our team</h1>
          </div>
          <div class="col-lg-6 text-center">
            <button type="button" class="btn-bottom">Meet the team</button>
            <br/>
            <button type="button" class="btn-bottom">Contact us</button>
          </div>
        </div>
      </div>
    </div>
<?php include "extention/footer.php"?>