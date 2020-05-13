<?php 
    include"header.php";
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
    $email = $_SESSION['email'];
    $getiduser = "SELECT id_user from user where email ='$email'";
    $ext_getiduser = mysqli_query($con, $getiduser);
    if(mysqli_num_rows($ext_getiduser) > 0){
      $row = mysqli_fetch_assoc($ext_getiduser);
    }
    $id = $row['id_user'];
	$sql = "SELECT * from course where id_user='$id'";
    $res = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Course</title>
    <link rel="stylesheet" type="text/css" href="css/css_mycourseK.css" />
    <script src=""></script>
</head>
<body>
    <section class="us_sec">
        <?php if (mysqli_num_rows($res) > 0) while ($row = mysqli_fetch_assoc($res)) :;?>
        <div class="course_id">
            <div id="div_img">
                <img src="img/icon.png" id="img_course">
            </div>
            <div id="div_text">
                <h1><?php echo ucfirst($row["title"]); ?></h1>
                <p><?php echo ucfirst($row["description"]);?></p>
                <span>Date : <?php echo $row["date"];?></span>
                <br>
                <span>Level : <?php echo $row["level"];?></span>
                <br>
                <span>Language : <?php echo $row["language"];?></span>
    
                <div class="buttons">
                    <form action="course.php" method="post">
                        <input type="text" name="course_id_value" value="<?php echo $row["id_course"];?>" id="courseid">
                        <input type="submit" value="Edit Course" id="ed_course">                        
                    </form>
                    <form action="php/delete_course.php" method="post">
                        <input type="text" name="course_id_value" value="<?php echo $row["id_course"];?>" id="courseid">
                        <input type="submit" value="Delete Course" id="dt_course">
                    </form>
                    <form action="view_course.php" method="post">
                        <input type="text" name="course_id_value" value="<?php echo $row["id_course"];?>" id="courseid">
                        <input type="submit" value="View Course" id="vr_course">
                    </form>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <?php endwhile; ?>
    </section>
</body>
</html>