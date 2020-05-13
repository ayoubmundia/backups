<?php
	session_start();
	if(isset($_SESSION['email']) & isset($_SESSION['password'])){
		$connected = true;
		$user_email = $_SESSION['email'] ;
	}else{
		$connected = false;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Learn for free with us">
		<title>Focus</title>		
		<link rel="stylesheet" href="css/css_header.css">
		<link rel="shortcut icon" href="img/let.png"/>
		<script src="script/script.js"></script>
	</head>
	<body> 
		<header>
			<img src="img/a.png" id="icon_site" id="icon_site" onclick="click1()">
			<input
				type="text"
				name="in_search"
				class="<?php 
				if($connected){
					echo  "input_search_con";
				}else{
					echo  "input_search";
				}?>"
				placeholder ="Search for Courses"
			>
			<input type="button" class="<?php 
				if($connected){
					echo  "hide";
				}else{
					echo  "nohide";
				} ?> " 
				name="signup_button" value="Connexion" id="btn_signup" onclick="f1()">
			<div id="place_list" class="<?php 
				if($connected){
					echo  "nohide";
				}else{
					echo  "hide";
				} ?>">
				<ul class=" nohide " >
				<li> <a>
						<?php 
					 		if($connected){
								echo  $user_email;
							}
						?>
					 </a>
					 <ul>
							<li><a href="http://localhost/mundia/Focus">Profile</a></li>
							<li><a href="http://localhost/mundia/Focus/mycourse.php">My Courses</a></li>
							<li><a href="http://localhost/mundia/Focus/php/destroy.php">Log Out</a></li>
				     </ul>
				</li>
				</ul>
				<input type="button" name="" value="Add a Course" id="btn_add_course" onclick="toAddCourse()">
			</div>
		</header>
	</body>
</html>
