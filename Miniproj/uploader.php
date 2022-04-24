<html>
	<head>
		<title> Uploader Page </title>
	</head>
	<body>
		<form <form method='post' action='upload.php' enctype="multipart/form-data">
			<input type="file" name="file" />
			<input type="submit" value="Upload" />
			<input type="hidden" name="id" value="<?php echo !empty($_GET['id']) ?htmlspecialchars($_GET['id']) :''; ?>" />
		</form>
	</body>
</html>