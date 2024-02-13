<?php
$servername = "localhost";
$username = "aleksei23000";
$password = "7qBYHQM1";
$dbname = "wp_aleksei23000";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection Failed". $conn->connect_error);
}
