<?php 

    $title ='Team | Portfolio';
    $hero_title = "Our Team";
    $description = "Let see your potential colleagues in the future.";

    $isNeedButton  = false;

    $img_url = "image/jason-goodman-Oalh2MojUuk-unsplash.jpg";
    $img_desc = "colleagues in a meeting";
    include "extension/header.php";
    include_once "dal/connection.php";
    include_once "dal/query.php";?>

    <div class="content-white">
        <div class="container-lg">
            <div class="row py-4">
                <div class="col-lg-12">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" name="form-search" method="post">
                        <div class="form-group row pb-3"> 
                            <div class="col-sm-5"> 
                                <select class="form-select" name="option_value" aria-label="Skills option select box">
                                    <option value ='0' selected>Open this select menu</option>
                                    <?php
                                        
                                        $result_skills= exec_select(query_command::$select_All_Skills);
                                        if($result_skills->num_rows > 0){
                                            while($row = $result_skills->fetch_assoc()){
                                                echo "<option value='{$row['s_name']}'>{$row['s_name']}</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="col-sm-5">
                                <input type="search" class="form-control" name="search_input" placeholder="Type the name or title you want to looking for" aria-label="Search" aria-describedby="search-addon" />
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" name="form-search" class="btn btn-primary" data-mdb-ripple-init>search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form-search'])){

                $name = isset($_POST['search_input'])? $_POST['search_input'] : "";
                $option = $_POST['option_value'] == '0'? "Coding', 'Planning', 'Design', 'Game Design": $_POST['option_value'];
                $result = exec_select(query_command::search_user($name, $name, $option));

                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){

                        $result_user = exec_select(query_command::query_user_info($row['username']));
                        if($result_user->num_rows > 0){
                            while($childRow = $result_user->fetch_assoc()){

                                $alt = urldecode($childRow['alt_text']);
                                echo " <div class='container-lg py-5'>
                                <div class='row' id='{$childRow['username']}'>
                                <div class='col-lg-4 text-center'>
                                    <img class='img-thumbnail' alt=\"$alt\" src='image/teams/{$childRow['image_url']}'>
                                </div>
                                <div class='col-lg-8'>";
                                if (isset($_COOKIE['user'])){
                                    echo "<a href='modify.php?username={$childRow['username']}&id={$childRow['id']}'><button type='button' id='{$childRow['username']}' class='btn-secondary mb-4'>Edit information</button></a>";
                                }
                                    $childResult = exec_select(query_command::query_user_skill($childRow['username']));
                                    if($childResult->num_rows > 0){ 
                                        echo "<div class='row'> 
                                                <ul class='skill-list'>
                                                <li><h2 class='title-h2'>Skills</h2></li>";
                                        while($skillsRow = $childResult->fetch_assoc()){
                                            echo "<li><p class='fw-bold px-4'>{$skillsRow['s_name']}</p></li>";
                                        } 
                                        echo "
                                            </ul>
                                            </div>";
                                    
                                    }
                                    else{
                                        echo "  <div class='row'>
                                                    <ul class='skill-list'>
                                                        <li><h2 class='title-h2'>Skills</h2></li>
                                                    </ul>
                                                </div>";
                                    }
                                
                                    echo"
                                        <div class='row'><h2 class='title-h2 pb-3'>{$childRow['title']}</h2></div>
                                        <div class='row'><h2 class='title-h2 pb-3 italic'>".$childRow['first_name'] ." ".$childRow['last_name']."</h2></div>
                                        <div class='row'><p>".urldecode($childRow['description'])."</p></div>
                                        <div class='row'>
                                            <div class='col-lg-5 col-sm-6'> 
                                                <button type='button' class='btn-secondary mb-4'>Book a meeting</button></div>
                                            <div class='col-lg-5 col-sm-6'> 
                                                <button type='button' class='btn-secondary mb-4'>Contact</button></div>
                                        </div>
                                    </div>
                                </div>
                                </div>";
                            }
                        }
                    }
                }
                else
                {
                    echo "  
                    <div class='container-lg py-5'>
                        <div class='row border py-3'>
                            <div class='col-lg-12 text-center'>
                            <h2>Sorry, we can't find any result for your search</h2>
                        </div>
                    </div>";
                }
            }
            else{
              
                $result = exec_select(query_command::$select_All_Account);
                if(isset($_COOKIE['user'])){
                    $result_User = exec_select(query_command::query_user_info($_COOKIE['user']));
                    if($result_User->num_rows == 0)
                    {        
                        $result_account = exec_select(query_command::query_account_id($_COOKIE['user']));
                        if($result_account->num_rows > 0){
                            $row = $result_account->fetch_assoc();
                            echo "  
                            <div class='container-lg py-5'>
                                <div class='row border py-3'>
                                    <div class='col-lg-12 text-center'>
                                    <h2>Look likes you are a new member, add your information now!</h2>
                                    <a href='modify.php?msg=new_user&username={$row['username']}&id={$row['id']}'><button type='button' class='btn-secondary mb-4'>Update your information</button></a>
                                </div>
                            </div>";
                        }
                    }
                       
                }
                if($result->num_rows > 0){

                    while($row = $result->fetch_assoc()){
                        $alt = urldecode($row['alt_text']);
                        echo " <div class='container-lg py-5'>
                        <div class='row' id='{$row['username']}'>
                        <div class='col-lg-4 text-center'>
                            <img class='img-thumbnail' alt=\"$alt\" src='image/teams/{$row['image_url']}'>
                        </div>
                        <div class='col-lg-8'>";
                        
                            if (isset($_COOKIE['user'])){
                                echo "<a href='modify.php?username={$row['username']}&id={$row['id']}'><button type='button' id='{$row['username']}' class='btn-secondary mb-4'>Edit information</button></a>";
                            }
                        
                            $childResult = exec_select(query_command::query_user_skill($row['username']));
                            if($childResult->num_rows > 0){ 
                                echo "<div class='row'> 
                                        <ul class='skill-list'>
                                        <li><h2 class='title-h2'>Skills</h2></li>";
                                while($chiildRow = $childResult->fetch_assoc()){
                                    echo "<li><p class='fw-bold px-4'>{$chiildRow['s_name']}</p></li>";
                                } 
                                echo "
                                    </ul>
                                    </div>";
                            
                            }
                            else{
                                echo "  <div class='row'>
                                            <ul class='skill-list'>
                                                <li><h2 class='title-h2'>Skills</h2></li>
                                            </ul>
                                        </div>";
                            }
                        
                            echo"
                                <div class='row'><h2 class='title-h2 pb-3'>{$row['title']}</h2></div>
                                <div class='row'><h2 class='title-h2 pb-3 italic'>".$row['first_name'] ." ".$row['last_name']."</h2></div>
                                <div class='row'><p>".urldecode($row['description'])."</p></div>
                                <div class='row'>
                                    <div class='col-lg-5 col-sm-6'> 
                                        <button type='button' class='btn-secondary mb-4'>Book a meeting</button></div>
                                    <div class='col-lg-5 col-sm-6'> 
                                        <button type='button' class='btn-secondary mb-4'>Contact</button></div>
                                </div>
                            </div>
                        </div>
                        </div>";
                    }
                    
                }
            }
            ?>
        </div>
    </div>
<?php include_once "extension/footer.php"?>