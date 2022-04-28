<?php

$host_name = "localhost";
$user_name = "cloud";
$database_password = "yC)80a2((35JvEaX";
$database = "cloudservice";
$name = $_POST['usernameSignUp'];
$password = $_POST['passwordSignUp'];
    
$connect = mysqli_connect($host_name, $user_name, $database_password, $database);
if(mysqli_connect_error())
    echo '<p> "failed to connect to SQL Database" </p>';
else
    echo '<p> "Succesfully connected" </p>';
$sql = "CREATE TABLE IF NOT EXISTS loginInformation(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL
)";
if(mysqli_query($connect, $sql))
    echo '<p> Created Table </p>';
else
    echo '<p> Failed in creating table </p>';

$sql = "INSERT INTO loginInformation (username, password) VALUES ('$name', '$password')";
if(mysqli_query($connect, $sql))
    echo '<p> Generated user </p>';
else
    echo '<p> Failed to generate user </p>';

mysqli_close($connect);
header('Location: sign.php');
exit;
?>