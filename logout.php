<?php 
    setcookie("username", "", time() - 10, "/");
    header("Location: home.php");
    exit();
?>