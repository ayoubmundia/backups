<?php
	include "header.php";
	if(empty($_SESSION['email']) && empty($_POST['id_course']) && empty($_GET['id_video']) && empty($_GET['id_course'])){
        header("location: http://localhost/mundia/Focus/connexion.php");
    }
    $con = mysqli_connect('127.0.0.1:3307','root','');
	if(!$con){
	    echo 'Server NOT CONNECTED';
	}
	if(!mysqli_select_db($con,'focus')){
	    echo 'DB NOT CONNECTED';
	}
    $email = $_SESSION['email'];
    if(!empty($_POST['id_course'])){
    	$id_course = $_POST['id_course'];
    }
    else{
		$id_course = $_GET['id_course'];
    }

    $res = mysqli_query($con, "SELECT id_user from user WHERE email='$email'");
    if(mysqli_num_rows($res) > 0){
    	$row = mysqli_fetch_row($res);
    }
    $id_user = $row[0];
    $res = mysqli_query($con, "SELECT id_user from registred WHERE id_course='$id_course'");
    if(mysqli_num_rows($res) == 0){
    	$res = mysqli_query($con, "INSERT into registred(id_course,id_user) VALUES('$id_course','$id_user')");
    	if(!$res){
    		echo "Wrong";
    	}
    }
    if(!isset($_GET["id_video"])){
    	$res = mysqli_query($con, "SELECT id_chapter from chapter WHERE id_course='$id_course' and index_chap='1'");
	    if(mysqli_num_rows($res) > 0){
	    	$row = mysqli_fetch_row($res);
	    }
	    $id_chapter = $row[0];
	    $res = mysqli_query($con, "SELECT id_video from video WHERE id_chapter='$id_chapter' and index_video='1'");
	    if(mysqli_num_rows($res) > 0){
	    	$row = mysqli_fetch_row($res);
	    }
	    $id_video = $row[0];
    	$res = mysqli_query($con, "SELECT url from video WHERE id_video = '$id_video'");
	    if(mysqli_num_rows($res) > 0){
	    	$row = mysqli_fetch_row($res);
	    }
	    $url = $row[0];
    }else{
    	$id_video = $_GET["id_video"];
    	$res = mysqli_query($con, "SELECT url from video WHERE id_video='$id_video'");
	    if(mysqli_num_rows($res) > 0){
	    	$row = mysqli_fetch_row($res);
	    }
	    $url = $row[0];
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Learn for free with us">
		<title>View Course</title>
		<link rel="stylesheet" href="css/css_start.css">
		<link rel="shortcut icon" href="img/let.png"/>
		<link href="boot/css/bootstrap.min.css" rel="stylesheet"/>
		<script src="script/script.js"></script>
	</head>
<body>
	<section class="course_section">
		<div class="course_div">
			<video id="my_video_1" class="" controls data-setup="{}" preload="auto" width="100%" height="100%" poster="<?php
			if(!empty($url)){
				echo "img/company-story-video-poster.jpg";
			}else{
				echo "img/unavailable.jpg";
			} ?>" src="videos/<?php echo $url; ?>">
		</div>
		<div class="courses_div" style="overflow-y: auto;">
			<center><h2  class="display-4">Course Content</h2></center>
			<br>
			<?php
				$res = mysqli_query($con, "SELECT * from chapter WHERE id_course='$id_course' order by index_chap ASC");
				$i = 1 ;
				if(mysqli_num_rows($res) > 0) {
					while ($row = mysqli_fetch_assoc($res)){
	   		?>
			<h3 style="margin-left: 10px;">Chapter<?php echo " ".$i.": ".$row["name"]; ?></h3>
			<?php 
				$rqtt = mysqli_query($con, "SELECT id_chapter from chapter WHERE id_course = '$id_course' and index_chap='$i'");
			    if(mysqli_num_rows($rqtt) > 0){
			    	$row = mysqli_fetch_row($rqtt);
			    }
			    $id_chapter = $row[0];
				$rqt = mysqli_query($con, "SELECT * from video WHERE id_chapter='$id_chapter' order by index_video ASC");
				if(mysqli_num_rows($rqt) > 0) {
					while ($row1 = mysqli_fetch_assoc($rqt)){
			?>
			<a href="<?php echo "http://localhost/mundia/Focus/start.php?id_video=".$row1["id_video"]."&id_course=".$id_course;?>"style="margin-left: 30px;"><em><?php echo $row1["name"]; ?></em></a>
			<br>
			<?php 
				}}$i = $i +1;}}
			?>
		</div>
	</section>
	<section class="comment_section">
		<?php 
			$res = mysqli_query($con, "SELECT id_chapter from video WHERE id_video = '$id_video'");
		    if(mysqli_num_rows($res) > 0){
		    	$row = mysqli_fetch_row($res);
		    }
		    $id_chapter = $row[0];
		    $res = mysqli_query($con, "SELECT name from chapter WHERE id_chapter = '$id_chapter'");
		    if(mysqli_num_rows($res) > 0){
		    	$row = mysqli_fetch_row($res);
		    }
		    $chap_name = $row[0];
		    $res = mysqli_query($con, "SELECT description from chapter WHERE id_chapter = '$id_chapter'");
		    if(mysqli_num_rows($res) > 0){
		    	$row = mysqli_fetch_row($res);
		    }
		    $chap_desc = $row[0];
		?>
		<h1 style="margin-left: 20px;"><?php echo $chap_name; ?></h1>
		<p class="font-weight-light" style="margin-left: 25px;font-size: 20px;"><?php echo $chap_desc; ?></p>
	</section>
	<section>
		
	</section>
</body>
</html>