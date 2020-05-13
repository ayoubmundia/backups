<?php
	include "header.php";
	if(empty($_SESSION['email'])){
        header("location: http://localhost/mundia/Focus/connexion.php");
    }
	$con = mysqli_connect('127.0.0.1:3307','root','');
	if(!$con){
	    echo 'Server NOT CONNECTED';
	}
	if(!mysqli_select_db($con,'focus')){
	    echo 'DB NOT CONNECTED';
	}
	$sql = "SELECT name FROM category";
	$res = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Learn for free with us">
		<title>Add Course</title>
		<link rel="stylesheet" href="css/css_addcourse.css">
		<link rel="shortcut icon" href="img/let.png"/>
		<script src="script/jquery-3.3.1.min.js"></script>
    	<script type ="text/javascript" src="script/jquery_course.js"></script>
	</head>
	<body>
		<form action="php/config_addcourse.php" method="post" enctype="multipart/form-data">
			<section class="section1_addcourse">
				<div class="div1_addcourse">
					<h1>Course Information</h1>
					<div id="div1">
						<input type="text" name="in_course_title" class="inputData" placeholder="Course Title" >
					</div>
					<div id="div2">
						<textarea name="in_course_description" id="textarea_in" placeholder="Short Description" ></textarea>
					</div>
					<div id="div3">
						<select class="inputSelect" name="select_categories">
							<option disabled selected>
								Select Category
							</option>
							<?php if (mysqli_num_rows($res) > 0) while ($row = mysqli_fetch_assoc($res)) :;?>
							<option ><?php echo $row["name"] ;?></option>
							<?php endwhile; ?>
						</select>
					</div>
					<div id="div4">
						<select class="inputSelect" name="select_level" >
							<option disabled selected>
								Select Level
							</option>
							<option>Beginner</option>
							<option>Intermediate</option>
							<option>Advanced</option>
						</select>
					</div>
					<div id="div5">
						<select class="inputSelect" name="select_language">
							<option disabled selected>
								Select Language 
							</option>
							<option>English</option>
							<option>French</option>
							<option>Arabic</option>
						</select>
					</div>
					<input type="file" class="file_css" name="file" id="file">
					<div id="div5">
						<input type="submit" id="submit_in" value="Create">
					</div>
				</div>
			</section>
		</form>
	</body>
</html>