<!DOCTYPE html>

<html>
<body>

<?php

$filename = $_FILES['file']['name'];

$userID = $_POST["id"];

if(!file_exists($userID)) {
	mkdir("$userID");
}

$location = "$userID/".$filename;

#$location = "filestorage/".$filename;

if( move_uploaded_file($_FILES['file']['tmp_name'], $location) ) {
	echo 'File Upload: Success';}
else {
	echo 'Error Uploading File';}
	
$seperateExt = explode('.', $filename);
$getExt = strtolower(end($seperateExt));

$img = "img/$getExt.png";

if(in_array($getExt, array('doc', 'pdf', 'xls', 'xml', 'zip'))) {
	echo "<img src='$img'>";}
else {
	echo '<img src="img/image.png">';}

#access folder
#$myfiles = array_diff(scandir($userID), array('.', '..'));
#echo $myfiles;
?>


</body>
</html>