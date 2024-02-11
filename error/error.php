<?php 
    $error = $_SERVER['REDIRECT_STATUS'];

    if ($error == 404) {
        $title = "404 Not Found";
        $description = "Wow such empty";
    } else {
        $title = "500 Internal Server Error";
        $description = "500 Internal Server Error";
    }
    include "extension/header_error.php";

    include "extension/footer.php";
?>