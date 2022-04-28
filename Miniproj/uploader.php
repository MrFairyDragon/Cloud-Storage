<?php
session_start();

$filename = $_FILES['file']['name'];

$userID = $_SESSION["id"];

if(!file_exists($userID)) {
	mkdir("$userID");
}

$location = "$userID/".$filename;

#$location = "filestorage/".$filename;

if( move_uploaded_file($_FILES['file']['tmp_name'], $location) ) {
	echo 'File Upload: Success';}
else {
	echo 'Error Uploading File';}
header("location: upload.php")
?>