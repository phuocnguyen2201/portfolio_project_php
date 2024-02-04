<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Exploring your future wonderful highly skilled freelancer.">
    <title><?php echo $title?></title>

    <link rel="icon" type="image/x-icon" href="/individual_tasks/image/favicon_io/favicon.ico">

   
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/individual_tasks/style/styles.css">
    <link rel="stylesheet" type="text/css" href="/individual_tasks/style/header.css">
    <link rel="stylesheet" type="text/css" href="/individual_tasks/style/styling-phuoc.css">
    <script src="https://kit.fontawesome.com/192e3b220b.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="main">
        <div class="header">        
            <div class="container-lg pt-3">
                <div class="row"> 
                    <nav class="menu">
                        <div class="logo">
                            <a href="home.php"><img class="header-logo" alt="G6 Portfolio Logo" src="/individual_tasks/image/favicon_io/header-favicon-32x32.png"></a>
                        </div>
                        <input type="checkbox" id="check">
                        <label for="check" class="checkbtn">
                            <i class="fa-solid fa-bars"></i>
                        </label>
                        <ul role="menubar" class="nav-list">
                            <hr class="divider">
                            <li role="menuitem" class="has-children">
                                  <a href="home.php">Home</a>
                              </li>
                              <li role="menuitem" class="has-children">
                                  <a href="about.php">About</a>
                              </li>
                              <li role="menuitem" class="has-children">
                                  <a href="team.php">Team</a>
                              </li>
                              <li role="menuitem" class="has-children">
                                  <a href="contact.php">Contact</a>
                              </li>

                              <?php
                                if(isset($_COOKIE['username'])){
                                    echo "<li role=\"menuitem\" class=\"has-children\">
                                    <a href=\"logout.php\">Logout</a>
                                </li>";
                            }
                                else{   
                                    echo "<li role=\"menuitem\" class=\"has-children\">
                                    <a href=\"login.php\">Login</a>
                                </li>";
                            }
                             
                              ?>
                            <hr class="divider">
                        </ul>
                    </nav>
                    
                </div>
        </div>
    </div>
    <div class="content">   
        <div class="container-lg py-5">
          <div class="row">
              <div class="col-lg-6 col-md-12 mb-4 mt-5">
                  <h1 class="title"><?php echo $title?></h1>
                  <h4 class="title"><?php echo $description?></h4>
              </div>
              <div class="col-lg-6 col-md-12 mb-4">
                  <img class="img-thumbnail" alt="404 error" src="/individual_tasks/image/404.jpg">
              </div>
          </div>
    </div></div>