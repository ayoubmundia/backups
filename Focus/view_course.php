<?php 
	include "header.php";
	include "footer.php";
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
	$id_course = $_POST["course_id_value"];
	$res = mysqli_query($con, "SELECT title from course WHERE id_course='$id_course'");
    if(mysqli_num_rows($res) > 0){
    	$row = mysqli_fetch_row($res);
    }
    $title = $row[0];
    $title = ucfirst($title);
    $res = mysqli_query($con, "SELECT description from course WHERE id_course='$id_course'");
    if(mysqli_num_rows($res) > 0){
    	$row = mysqli_fetch_row($res);
    }
    $description = $row[0];
    $res = mysqli_query($con, "SELECT COUNT(id_user) from registred WHERE id_course='$id_course'");
    if(mysqli_num_rows($res) > 0){
    	$row = mysqli_fetch_row($res);
    }
    $number_registred = $row[0];
    $res = mysqli_query($con, "SELECT language from course WHERE id_course='$id_course'");
    if(mysqli_num_rows($res) > 0){
    	$row = mysqli_fetch_row($res);
    }
    $language = $row[0];
    $res = mysqli_query($con, "SELECT level from course WHERE id_course='$id_course'");
    if(mysqli_num_rows($res) > 0){
    	$row = mysqli_fetch_row($res);
    }
    $level = $row[0];
    $email = $_SESSION['email'];
    $res = mysqli_query($con, "SELECT fullname from user WHERE email='$email'");
    if(mysqli_num_rows($res) > 0){
    	$row = mysqli_fetch_row($res);
    }
    $prof_name = $row[0];
    $res = mysqli_query($con, "SELECT id_user from user WHERE email='$email'");
    if(mysqli_num_rows($res) > 0){
    	$row = mysqli_fetch_row($res);
    }
    $id_user = $row[0];
    $res = mysqli_query($con, "SELECT COUNT(id_course) from course WHERE id_user='$id_user'");
    if(mysqli_num_rows($res) > 0){
    	$row = mysqli_fetch_row($res);
    }
    $number_courses = $row[0];
    $res = mysqli_query($con, "SELECT * from chapter WHERE id_course='$id_course' ORDER BY index_chap ASC");
    $i= 1;
?>
<!DOCTYPE>
	<html>
		<head>
			<meta charset="utf-8">
			<meta name="description" content="Learn for free with us">
			<title>View Course</title>
			<link rel="stylesheet" href="css/css_view-course.css">
			<link rel="shortcut icon" href="img/let.png"/>
			<link href="boot/css/bootstrap.min.css" rel="stylesheet"/>
			<script src="script/script.js"></script>
		</head>
	<body>
		<section class="section_data_course">
			<center><h1 class="display-1"><?php echo $title;?></h1></center>
			<br>
			<center><p class="text-center"><?php echo $description;?></p></center>
			<form method="post" action="start.php">
				<input type="hidden" name="id_course" value="<?php echo $id_course;?>">
				<center><input  type="submit" class="btn btn-primary" id="btn_started" value="Get Started"></input></center>
			</form>
			<center>
				<div class="spn">
					<span class="font-weight-bold" class="spn"><?php echo $number_registred;?> students enrolled</span>
					--
					<span class="font-weight-bold" class="spn">Language: <?php echo $language;?></span>
					--
					<span class="font-weight-bold" class="spn">Level: <?php echo $level;?></span>
				</div>
			</center>
		</section>
		<section class="section_data_prof">
			<div class="habobont">
				<div class="content_div">
					<button class="text-muted" id="content_btn">Course content</button>
					<br><br>
					<?php
						if(mysqli_num_rows($res) > 0) {
							while ($row = mysqli_fetch_assoc($res)){
	   				?>
					<span style="margin-left: 20px; color: #01A9DB" class="h5">Chapter<?php echo " ".$i.": ".$row["name"]; ?></span>
					<br>
					<?php
						$rqt = mysqli_query($con, "SELECT id_chapter from chapter Where id_course='$id_course' and index_chap='$i'");
						if(!$rqt)
							echo "LALA";
						if(mysqli_num_rows($rqt) > 0){
							$rw = mysqli_fetch_row($rqt);
						}
	    				$id_chapter = $rw[0];
						$rqt = mysqli_query($con, "SELECT * from video WHERE id_chapter='$id_chapter' ORDER BY index_video ASC");
						if(!$rqt)
							echo "LALA";
						while ($rw1 = mysqli_fetch_assoc($rqt)){
					?>
					<span style="margin-left: 50px;font-size: 17px;"><em><?php echo "+".$rw1["name"] ?></em></span>
					<br>
					<?php 
					}
					$i = $i + 1;
						;
					?>
					<br>
					<?php }}?>
				</div>
				<div class="prof_div">
					<button class="text-muted" id="prof_btn">About the instructor</button>	
					<br><br>
					<span style="margin-left: 10px;">FullName: <?php echo $prof_name; ?></span>	
					<br><br>	
					<span style="margin-left: 10px;">Email: <?php echo $email; ?></span>
					<br><br>	
					<span style="margin-left: 10px;">Course's Number: <?php echo $number_courses; ?></span>	
					<br><br>	
				</div>
			</div>
		</section>
	</body>
</html>