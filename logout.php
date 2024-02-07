<?php 
    setcookie("user", "", time() - 10, "/");
    header("Location: home.php");
    exit();
?>