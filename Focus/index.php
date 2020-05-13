<?php
	include "header.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Learn for free with us">
		<title>Home Page</title>
		<link rel="stylesheet" href="css/css_index.css">
		<link rel="shortcut icon" href="img/let.png" />
		<script src="script/script.js"></script>
	</head>
	<body>
		<section id="home_section" class="
			<?php
				if($connected){
					echo  "hide";
				}else{
					echo  "nohide";
				}
		 	?>">
			<div id="home_section_p">
				<h1>Focus</h1>
				<input type="button" name="" value="GET STARTED" id="get_started" onclick="f1()">
				<center><p><b><em>Learn anything and everything <br>for Free!!</em></b></p></center>
			</div>
		</section>
		<section id="home_section" class="
			<?php
				if($connected){
					echo  "nohide";
				}else{
					echo  "hide";
				}
		 	?>">
			<div id="home_section_p">
				<h1>Focus</h1>
				<input type="button" name="" value="Show my courses" id="get_started" onclick="f2()">
				<center><p><b><em>Learn anything and everything <br>for Free!!</em></b></p></center>
			</div>
		</section>
		<br><br><br><br>
	</body>
</html>