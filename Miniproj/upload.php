<?php
session_start()
?>

<!DOCTYPE html>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>

<body>

<?php

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

$seperateExt = explode('.', $filename);
$getExt = strtolower(end($seperateExt));

$img = "img/$getExt.png";

#if(in_array($getExt, array('doc', 'pdf', 'xls', 'xml', 'zip'))) {
#	echo "<img src='$img'>";}
#else {
#	echo '<img src="img/image.png">';}

#scanning user's folder for files that are compared
#with the other array and $directories is the difference
$directories = array_diff(scandir($userID), array('..', '.'));
$readExt = [];

#for($x = 2; $x <= count($directories); $x++) {
#	$readExt[$x] = explode('.', $directories[$x]);
#	$imagekey = $readExt[$x][1];
#		if(in_array($readExt[$x][1], array('doc', 'pdf', 'xls', 'xml', 'zip'))) {
#			echo "<img src='img/$imagekey.png'>";
#			}
#		else {
#			echo '<img src="img/image.png">';}
#}

for($x = 2; $x < count($directories); $x++) {
	$directories[$x-2] = $directories[$x];
}
$directories = array_unique($directories);

$numFiles = count($directories);

?>
<div class="container-1">
	<p>Files Table</p>
	<ul id="mainUL" class="files">

	<!-- <li><a href="#"> <?php print_r($directories[0])?> </a></li> -->
	<!-- <li><a href="#"> <?php print_r($directories[1])?> </a></li> -->
	<!-- <li><a href="#"> <?php print_r($directories[2])?> </a></li> -->
	<!-- <li><a href="#"> <?php print_r($directories[3])?> </a></li> -->
	<!-- <li><a href="#"> <?php print_r($directories[4])?> </a></li> -->
	<!-- <li><a href="#"> <?php print_r($directories[5])?> </a></li> -->
	<!-- <li><a href="#"> <?php print_r($directories[6])?> </a></li> -->

	<script type="text/javascript">
	function function1() {
		var test = <?php echo json_encode($directories);?>;
		var ul = document.getElementById("mainUL");
		var extensions = [];
		var getExtensions = [];
		var k = [];
		var extensionNotImage = ['doc', 'pdf', 'xls', 'xml', 'zip'];
		var extensionImage = ['jpg', 'png'];
		for (let i = 0; i < <?php echo $numFiles ?>; i++) {
	  	k[i] = document.createElement("li");
	  	k[i].appendChild(document.createTextNode(test[i]));
	  	ul.appendChild(k[i]);
			extensions[i] = test[i].split(".");
			getExtensions = extensions[i][extensions[i].length-1].toLowerCase();
			if(extensionNotImage.includes(getExtensions)) {
				k[i].className = "ext" + getExtensions;
			}
			else if (extensionImage.includes(getExtensions)){
					k[i].className = "extimage"
			}
			else {
				k[i].className = "extdefault"
			}
	  }

	}
	function1();
	</script>
</ul>
</div>



</body>
</html>
