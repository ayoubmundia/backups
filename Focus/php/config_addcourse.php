<?php
  session_start();
	$v_title = strtolower($_POST['in_course_title']);
	$v_description = strtolower($_POST['in_course_description']);
	$v_level = $_POST['select_level'];
	$v_category = $_POST['select_categories'];
	$v_language = $_POST['select_language'];
	$v_date = date("Y-m-d");
  $v_user = $_SESSION['email'];
  // echo $v_title;
  // echo $v_description;
  // echo $v_level;
  // echo $v_category;
  // echo $v_language;
  // if(isset($_FILES['file'])){
  //   echo "string";
  // }
  // if(isset($_FILES['file-name'])){
  #---------- Start uploading file ----------
     // $fileName = $_FILES['file']['name'];
    // $fileTmpName = $_FILES['file']['tmp_name'];
    // $fileSize = $_FILES['file']['size'];
    // $fileError = $_FILES['file']['error'];
    // $fileType = $_FILES['file']['type'];

    // $fileExt = explode('.', $fileName);
    // $fileActualExt = strtolower(end($fileExt));

    // $allowed = array('jpg','jpeg','png', 'pdf', 'mp4', 'wmv', 'flv', 'avi');

    // if(in_array($fileActualExt, $allowed)){
    //   if($fileError === 0){
    //     if($fileSize < 20971520){
    //       $fileNewName = reset($fileExt).".".$fileActualExt;
    //       $fileDestination = 'uploads/'.ucfirst($listSelected).'/'.$fileNewName;
    //       move_uploaded_file($fileTmpName, $fileDestination);
    //       //header("Location: welcome.php?uploadsuccess");
    //     }else{
    //       echo "Your file is too big!";
    //     }
    //   }else{
    //     echo "There was an error uploading your file!";
    //   }
    // }else{
    //   echo "You cannot upload files of this type!";
    // }
  
  #---------- End uploading file ----------
  $con = mysqli_connect('127.0.0.1:3307','root','');
  if(!$con){
      echo 'Server NOT CONNECTED';
  }
  if(!mysqli_select_db($con,'focus')){
      echo 'DB NOT CONNECTED';
  }
  //Selection le champ de id pour l'utilisateur
  $sql = "SELECT id_user FROM user where email='$v_user'";
  $res = mysqli_query($con, $sql);
  if(mysqli_num_rows($res) > 0){
    $row = mysqli_fetch_assoc($res);
  }
  $id =  $row['id_user'];
  //Selection le champ de id pour le category
  $getidcategory = "SELECT id_category from category where name = '$v_category'";
  $res = mysqli_query($con, $getidcategory);
  if(mysqli_num_rows($res) > 0){
    $row = mysqli_fetch_assoc($res);
  }
  $category =  $row['id_category'];
  //Selection le champ de id pour le cours
  $res = mysqli_query($con, "SELECT max(id_course) from course");
  if(mysqli_num_rows($res) > 0){
    $row = mysqli_fetch_row($res);
  }
  $course =  $row[0] + 1;
  // **INSERER LES DONNEES
  $sql1 = "INSERT INTO course(title,description,date,level,language,id_user,id_course)VALUES('$v_title','$v_description','$v_date','$v_level','$v_language','$id','$course')";
  $sql2 = "INSERT INTO course_category(id_category,id_course) VALUES ('$category','$course')";
  if(!mysqli_query($con,$sql1) || !mysqli_query($con, $sql2))
  {
    echo 'Title : '.$v_title.'<br>description :'.$v_description.'<br>Date : '.$v_date.'<br>Level : '
    .$v_level.'<br>Language : '.$v_language.'<br> id : ' .$id.'<br>notinserted <br>id_category : '.$category.'
    <br>Id Course : '.$course . '<br>category: '.$v_category ;
  }else{
    header("location: http://localhost/mundia/Focus/course.php?namecourse=$course");
  }
