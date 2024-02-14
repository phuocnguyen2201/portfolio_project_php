<?php

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
}
//connect to db
include 'contact_db.php';

//write sql statement to insert data
$sql = "insert into inquiry_data(email, name)
    values ('$email', '$name')";



if ($conn->query($sql)===TRUE){
    echo "Your data was recorded.";
}
else {
    echo "Error :" .$sql . "<br>" . $conn->error;
}

//close the db connection

$conn->close();

?>
