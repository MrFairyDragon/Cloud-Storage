<html>
<body>

<?php

$filename = $_FILES['file']['name'];

$location = "filestorage/".$filename;

if( move_uploaded_file($_FILES['file']['tmp_name'], $location) ) {
	echo 'File Upload: Success';}
else {
	echo 'Error Uploading File';}
	
if($filename == image/png)
	echo $filename

?>


</html>
</body>