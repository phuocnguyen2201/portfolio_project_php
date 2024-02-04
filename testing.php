<?php

$title ='Testing Database Connection';
$excercise = "Testing Database Connection";
$description = "Testing Database Connection";

include "../individual_tasks/extension/header.php";
?>

<div class="content-white py-5">
    <div class="container-lg">
        <div class="row">
            <div class=col-lg-12>
               
                <form class="py-3" name="form-login" method="POST">
                        <div class="form-group row pb-3 ">
                            <label for="inputUserName" class="col-sm-2 col-form-label">User Name:</label>
                            <div class="col-sm-10">
                            <input type="text" name='username' class="form-control" id="inputUserName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password:</label>
                            <div class="col-sm-10">
                            <input type="password" name='password' class="form-control" id="inputPassword">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row" style="text-align: left;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10"><input class="btn-bottom" type="submit" name="form-login" value="Submit"></div>
                        </div>
                </form>
               
                <?php
                    
                    
                    
                    $result = connect_and_query(query_command::$select_All_Students);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "Username: " . $row["name"] . " - Email: " . $row["email"] . "<br>";
                        }
                    } else {
                        echo "0 results";
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include "../individual_tasks/extension/footer.php";?>
