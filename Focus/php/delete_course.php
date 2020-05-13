<?php 
	$courses_id = $_POST['course_id_value'];
	$con = mysqli_connect('127.0.0.1:3307','root','');
    $url = 'http://localhost/mundia/Focus/';
    if(!$con){
      echo 'Server NOT CONNECTED';
    }
    if(!mysqli_select_db($con,'focus')){
      echo 'DB NOT CONNECTED';
    }
    $rqt_note = "DELETE from note where id_course = '$courses_id'";
    $rqt_registred = "DELETE from registred where id_course = '$courses_id'";
    $rqt_chap = "DELETE from chapter where id_course = '$courses_id'";
    $rqt_crs_cat = "DELETE from course_category where id_course = '$courses_id'";
    $rqt_video = "DELETE from video where id_chapter in(select id_chapter from chapter where id_course = '$courses_id') ";
    $rqt = "DELETE from course where id_course = '$courses_id'";
    $ex_rqt1 = mysqli_query($con, $rqt_comment);
    $ex_rqt2 = mysqli_query($con, $rqt_note);
    $ex_rqt3 = mysqli_query($con, $rqt_registred);
    $ex_rqt5 = mysqli_query($con, $rqt_crs_cat);
    $ex_rqt7 = mysqli_query($con, $rqt_video);
    $ex_rqt4 = mysqli_query($con, $rqt_chap);
    $ex_rqt6 = mysqli_query($con, $rqt);
    if( !$ex_rqt2 || !$ex_rqt3 || !$ex_rqt4 || !$ex_rqt5 || !$ex_rqt6 || !$ex_rqt7 ){
    	echo $ex_rqt1.'<br>'.$ex_rqt2.'<br>'.$ex_rqt3.'<br>'.$ex_rqt4.'<br>'.$ex_rqt5.'<br>'.$ex_rqt6.'<br>'.$ex_rqt7 ;
    }else{
    	header("location: http://localhost/mundia/Focus/mycourse.php");
    }
?>