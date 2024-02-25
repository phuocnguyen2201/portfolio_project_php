<?php


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
}
//connect to db
include 'db.php';

//write sql statement to insert data
$sql = "insert into inquiry_data(email, name, number)
    values ('$email', '$name', '$number')";

session_start();

$status = false;
if ($conn->query($sql)===TRUE){
    $status = true;
    //echo "Your data was recorded.";
}
else {
    $status = false;
    $_SESSION["error"] = "Error :" .$sql . "<br>" . $conn->error;
    //echo "Error :" .$sql . "<br>" . $conn->error;
}

//close the db connection
$_SESSION['status'] = $status;
header('location:contact.php');
$conn->close();














?>
