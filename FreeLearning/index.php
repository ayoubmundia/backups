 <?php
 $isTouch = isset($_GET['email']);
 	if ($isTouch) {
 		$var = $_GET['email'];
 	}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Learn for free with us">
		<title>Focus</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="shortcut icon" href="img/icon.png" />
		<script src="script/scriptreallyhome.js"></script>
	</head>
	<body>
		<div id="preloder">
			<div class="loader"></div>
		</div>

		<header>
			<img src="img/a.png" id="icon_site" id="icon_site" onclick="click1()">
			<input
				type="text"
				name="in_search"
				id="input_search"
				placeholder ="Search for Courses"
			>
			<input type="button" class="<?php if(isset($var)){ echo 'hide'; } ?>" name="signup_button" value="Connexion" id="btn_signup" onclick="f1()">
			<select class="<?php if(isset($var)){ echo 'nohide'; } else{ echo 'hide';} ?>"
					name="" value="" id="select_list" onclick="">
				 <option value=""><?=(isset($var))?$var:""?></option>
				 <option value="deconnexion">Log Out</option>
			</select>
		</header>
	</body>
</html>
