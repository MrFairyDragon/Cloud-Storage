<?php
session_start()
?>

<?php

$host_name = "localhost";
$user_name = "cloud";
$database_password = "yC)80a2((35JvEaX";
$database = "cloudservice";
$name = $_REQUEST["name"];
$password = $_REQUEST["pass"];

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

$sql = "SELECT * FROM loginInformation WHERE username='$name' AND password='$password'";

$result = (mysqli_query($connect, $sql));
if(mysqli_num_rows($result) == 1) {
    //echo '<p> Succesfully found a user with that username and password loggin in </p>';
    $row = mysqli_fetch_row($result);
    $_SESSION['id'] = $row[0];
    mysqli_close($connect);
    echo '.success';
} else {
    //echo '<p> Failed to find user exitting </p>';
    mysqli_close($connect);
    echo '.failed';
}
exit;

?>
