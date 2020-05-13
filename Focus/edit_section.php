<?php 
	include"header.php";
	if(!isset($_SESSION['email'])){
		header("location: http://localhost/mundia/Focus/");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <title>Focus</title>
    <link rel="stylesheet" type="text/css" href="css/css_section.css"/>
    <link href="boot/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="script/jquery-3.3.1.min.js"></script>
    <script type ="text/javascript" src="script/jquery.js"></script>
</head>
<body>
	<br><br><br><br><br><br><br><br><br>
	<input type="text" name="" class="btn btn-secondary">
</body>
</html>