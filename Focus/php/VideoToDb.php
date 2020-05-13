<?php 
	function dhtmlconsole($msg='') {
	    static $pos=0;
	    $pos++;
	    header('X-DHTML-CONSOLE-MSG'.$pos.': '.$msg);
	}

	$con = mysqli_connect('127.0.0.1:3307','root','');
    if(!$con){
      dhtmlconsole('Server NOT CONNECTED');
    }
    if(!mysqli_select_db($con,'focus')){
      dhtmlconsole('DB NOT CONNECTED') ;
    }
    
	$fileName = $_FILES["file_video"]["name"]; 
	$fileTmpLoc = $_FILES["file_video"]["tmp_name"]; 
	$fileType = $_FILES["file_video"]["type"]; 
	$fileSize = $_FILES["file_video"]["size"];
	$id_course = $_POST["id_course"];
	$index_video = $_POST["index_vid"];
	$index_chapitre = $_POST["chapter_idx"];
	$extension = explode('.', $fileName);
	$extension = end($extension);
	$random_name = rand();
	// Get chapter Id 
	$res = mysqli_query($con, "SELECT id_chapter from chapter where id_course='$id_course' and index_chap ='$index_chapitre'");
	    if(mysqli_num_rows($res) > 0){
	    	$row = mysqli_fetch_row($res);
	    }
		$id_chapter = $row[0];
	//Get video Id
	// Move Video
	if($fileSize < 20971520){
		if(move_uploaded_file($fileTmpLoc, "../videos/".$random_name.'.'.$extension)){
			dhtmlconsole("Inserted".$extension.$id_course."Data");
			$sql = "UPDATE video
					set url = '$random_name.$extension' 
					where  id_chapter = '$id_chapter' and index_video = '$index_video'
			";
			if(!mysqli_query($con,$sql))
		    {
		    	dhtmlconsole("Video has been successfully uploaded !");
		    }
		}else{
		    dhtmlconsole($fileName.'--'.$fileTmpLoc.'--'.$fileType.'--'.$fileSize);
		}
	}
