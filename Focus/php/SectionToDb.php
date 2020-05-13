<?php 
	if(isset($_GET['id_course']) && isset($_GET['index_chap']) && ($_GET['index_vid'])){
		function dhtmlconsole($msg='') {
		    static $pos=0;
		    $pos++;
		   header('X-DHTML-CONSOLE-MSG'.$pos.': '.$msg);
		}
		$id_course = $_GET['id_course'];
		$index_vid = $_GET['index_vid'];
		$index_chap = $_GET['index_chap'];
		
		//Connection With DB
		$con = mysqli_connect('127.0.0.1:3307','root','');
		if(!$con){
		    dhtmlconsole("Serveur not connected");
		}
		if(!mysqli_select_db($con,'focus')){
		    dhtmlconsole("Db not connected");
		}
		//Get id Chapter
		$sql = "SELECT id_chapter from chapter where index_chap='$index_chap' and id_course ='$id_course'";
		$rqt = mysqli_query($con,$sql);
		if(mysqli_num_rows($rqt) > 0){
	    	$row = mysqli_fetch_row($rqt);//*****kant res
	    }
	    if(!isset($row[0])){
	    		echo "Nothing";
	    		return;
	    }
	    $id_chapter = $row[0];
	    	//dhtmlconsole("chapter:".$id_chapter);
	    //Get id course
	    $sql = "SELECT id_video from video where id_chapter='$id_chapter'";
		$rqt = mysqli_query($con,$sql);
		if(mysqli_num_rows($rqt) > 0){
	    	$row = mysqli_fetch_row($rqt);
	    }
	    $id_video = $row[0];
	    	//dhtmlconsole("video:".$id_video);
	    //Get name Title
	    $sql = "SELECT name from video where id_chapter='$id_chapter' and index_video ='$index_vid'";
		$rqt = mysqli_query($con,$sql);
		if(mysqli_num_rows($rqt) > 0){
	    	$row = mysqli_fetch_row($rqt);
	    }
	    	//dhtmlconsole($row[0]);
	    if(is_numeric($row[0])){
	    	echo "Nothing";
	    	return;
	    }
    	$title = $row[0];
		echo $title;

	}