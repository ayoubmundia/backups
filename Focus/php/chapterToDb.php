<?php
	if(isset($_GET['title']) && isset($_GET['desc'])){
		function dhtmlconsole($msg='') {
		    static $pos=0;
		    $pos++;
		   header('X-DHTML-CONSOLE-MSG'.$pos.': '.$msg);
		}
		$title = $_GET['title'] ;
		// dhtmlconsole($title);
		$description = $_GET['desc'] ;
		$nbr_chapitre = $_GET['nbr_chap'];
		$id_course = $_GET['id_course'];
		$section = $_GET['section'];
		$con = mysqli_connect('127.0.0.1:3307','root','');
		// $swap = true;
		if(!$con){
		    echo 'Server NOT CONNECTED';
		}
		if(!mysqli_select_db($con,'focus')){
		    echo 'DB NOT CONNECTED';
		}
		// Get chapter Id
		$res = mysqli_query($con, "SELECT max(id_chapter) from chapter");
	    if(mysqli_num_rows($res) > 0){
	    	$row = mysqli_fetch_row($res);
	    }
	    $id = $row[0] + 1;
	    //Get Video Id
	    $res = mysqli_query($con, "SELECT max(id_video) from video");
	    if(mysqli_num_rows($res) > 0){
	    	$row = mysqli_fetch_row($res);
	    }
	    $id_video = $row[0] + 1;
	    //set Chapter Data 
		$req = "SELECT * FROM chapter where index_chap = '$nbr_chapitre' and id_course ='$id_course' ";
		$res = mysqli_query($con, $req);
		if(!mysqli_num_rows($res)){
			$sql =  "INSERT INTO chapter(index_chap,name,description,id_course,id_chapter) VALUES('$nbr_chapitre','$title','$description','$id_course','$id')";
			if(!mysqli_query($con,$sql))
		    {
			   	echo "$title"."$description"."$nbr_chapitre"."$id_course";
			}
			// $swap = false;
		}
		else{
			$sql = "UPDATE chapter
				set name = '$title' , description='$description' 
				where  id_course = '$id_course' and index_chap = '$nbr_chapitre'
			";
			if(!mysqli_query($con,$sql))
		    {
		    	echo "$title"."$description"."$nbr_chapitre"."$id_course";
		    }
		}
		//set Video Section
		$swip = 1;
		$try_char = explode('-', $section);
		if($try_char == "undefined"){
			$table_data = array([0] => $section);
		}else{
			$table_data = explode('-', $section);
		}
		$max = sizeof($table_data);
		//Get chaptre id
		$sql = "SELECT id_chapter from chapter where id_course ='$id_course' and index_chap='$nbr_chapitre'";
		$rqt = mysqli_query($con,$sql);
		if(!$rqt){
		}
		if(mysqli_num_rows($rqt) > 0){
	    	$row = mysqli_fetch_row($rqt);//*****kant res
	    }
	    $id_chapter = $row[0];
	    //Set Sections
		foreach ($table_data as $value) {
			$res = "SELECT * FROM video where id_chapter = '$id_chapter' and index_video ='$swip' ";
			$rqt = mysqli_query($con,$res);
			if(mysqli_num_rows($rqt)>0){
				$sql = "UPDATE  video 
						set name = '$value' 
						WHERE id_chapter = '$id_chapter' and index_video ='$swip' ";
				if(!mysqli_query($con,$sql)){
					dhtmlconsole('Update-index_video'.$swip.'/id_video'.$id_video.'/value'.$value.'/id_chapter'.$id_chapter);
				}
				$swip = $swip + 1;
			}else{
				$sql = "INSERT INTO video(id_video,id_chapter,name,index_video) VALUES('$id_video','$id_chapter','$value','$swip')";
				if(!mysqli_query($con,$sql)){
					dhtmlconsole('Insert-index_video'.$swip.'/id_video'.$id_video.'/value'.$key.'/id_chapter'.$id_chapter.'d');
				}
				$swip = $swip + 1;
				$id_video = $id_video +  1;
			}
		}
		$res = "DELETE FROM video where id_chapter='$id_chapter' and index_video >= '$swip'";
		$rqt = mysqli_query($con,$res);
		if(!$rqt){
			dhtmlconsole('Delete');
		}
		mysqli_close($con);
	}