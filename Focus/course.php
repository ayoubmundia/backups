<?php 
    include"header.php";
    // Verifier est ce que l'utilisateur est connecté
    if(!isset($_SESSION['email'])){
        header("location: http://localhost/mundia/Focus/");
    }
    // GET ID COURSE AND KNOW CONNECT WAY
    if(!isset($_POST['course_id_value']) && !isset($_GET['namecourse'])){
        header("location: http://localhost/mundia/Focus/mycourse.php");
    }else{
        if(isset($_POST['course_id_value'])){
            $id_course =  $_POST['course_id_value'];
        }else{
            $id_course = $_GET['namecourse'];
        }
    }
    // GET ID OF USER
    $con = mysqli_connect('127.0.0.1:3307','root','');
    if(!$con){
      echo 'Server NOT CONNECTED';
    }
    if(!mysqli_select_db($con,'focus')){
      echo 'DB NOT CONNECTED';
    }
    $email = $_SESSION['email'];
    $sql = "SELECT id_user FROM user where email='$email'";
    $res = mysqli_query($con, $sql);
    if(mysqli_num_rows($res) > 0){
      $row = mysqli_fetch_assoc($res);
    }
    $id =  $row['id_user'];
    // VERRIFER EST CE QUE CE COURS EST CREER PAR LA MEME USER
    $sql = "SELECT * FROM course where id_user='$id' and id_course='$id_course'";
    $res = mysqli_query($con, $sql);
    if(mysqli_num_rows($res) > 0){
    }else{
        header("location: http://localhost/mundia/Focus/mycourse.php");
    }
    // Get Course's Name
    $sql = "SELECT title FROM course where id_course='$id_course'";
    $res = mysqli_query($con, $sql);
    if(mysqli_num_rows($res) > 0){
      $row = mysqli_fetch_assoc($res);
    }
    $name_course = $row['title'];
    // Inserer Data_chap
    $sql1 = "SELECT name,description FROM chapter where id_course = '$id_course'";
    $res1 = mysqli_query($con, $sql1);
    $i = 1;
    //Insert Data sec
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Focus</title>
    <link rel="stylesheet" type="text/css" href="css/css_course.css"/>
    <link rel="stylesheet" type="text/css" href="css/css_section.css"/>
    <!--<link href="boot/css/bootstrap.min.css" rel="stylesheet"/>-->
    <link rel="shortcut icon" href="img/let.png"/>
    <script src="script/jquery-3.3.1.min.js"></script>
    <script type ="text/javascript" src="script/jquery.js"></script>
</head>
<body>
    <input type="text" name="id_crs_name" id="id_crs" hidden="hide" value="
        <?php 
            if(!isset($_POST['course_id_value'])){
                echo $_GET['namecourse'];
            }
            else{
                echo $_POST['course_id_value'];
            } 
        ?>"
    >
    <section id="google">
        <center> <legend id="title_legend"><?php echo ucfirst($name_course);?></legend> </center>
        <?php if (mysqli_num_rows($res1) > 0) 
        while ($row = mysqli_fetch_assoc($res1)){ ?>
            <fieldset id="field-<?php echo $i; ?>" class="fieldClass">
                <legend id="legend-<?php echo $i; ?>">Chapter <?php echo $i; ?></legend>
                <div id="section-<?php echo $i; ?>">
                    <div id="div1">
                        <span id="title_spn" class="unselectable"><?php echo "Title"; ?></span>
                        <input type="text" name="" id="input_title" value="<?php echo $row["name"] ;?>"> 
                    </div >
                    <div id="div2">
                        <span id="description_spn" class="unselectable">Description</span>
                        <textarea id="input_desc" ><?php echo $row["description"] ;?></textarea>
                    </div>
                    <?php 
                        $findchapter = "SELECT id_chapter from chapter where index_chap='$i'  and id_course='$id_course'";
                        $rqt_findChapter = mysqli_query($con,$findchapter);
                        if(mysqli_num_rows($rqt_findChapter) > 0){
                            $row_chap = mysqli_fetch_row($rqt_findChapter);
                        }
                        $id_chapter = $row_chap[0];
                        $nbr_sections = "SELECT COUNT(id_chapter) from video where id_chapter='$id_chapter'";
                        $rqt_nbr_sections = mysqli_query($con,$nbr_sections);
                        if(mysqli_num_rows($rqt_nbr_sections) > 0){
                            $row_sec = mysqli_fetch_row($rqt_nbr_sections);
                        }
                        $mx = $row_sec[0];
                        $intx = 1 ;
                        if($mx != 0)
                            while ($intx <= $mx) {
                                $toAddSection = "SELECT name from video where index_video='$intx' and id_chapter='$id_chapter'";$rqt_add_section = mysqli_query($con,$toAddSection);
                                if(!$rqt_add_section){
                                    echo "Sections problem";
                                }
                                if(mysqli_num_rows($rqt_add_section) > 0){
                                    $rowc = mysqli_fetch_row($rqt_add_section);
                                }
                                $video_sec = $rowc[0];
                    ?>
                    <div id="div3">
                        <span id="section_spn"  class="unselectable">Add Section <?php echo $intx;?></span>
                        <input type="text"  id="<?php if($intx < 10)echo"input_section_default";else echo"input_section_p10";?>"class="class_section" value="<?php echo $video_sec;?>">
                        <img src="img/Delete.png" id="img_dlt" class="unselectable">
                        <img src="img/a (2).png" id="img_add"  class="unselectable">
                    </div>
                    <?php $intx =  $intx + 1 ;} if($mx == 0){?>
                    <div id="div3">
                        <span id="section_spn"  class="unselectable">Add Section 1</span>
                        <input type="text"  id="input_section_default" class="class_section" >
                        <img src="img/Delete.png" id="img_dlt" class="unselectable">
                        <img src="img/a (2).png" id="img_add"  class="unselectable">
                    </div>
                    <?php }?>
                    <br class="unselectable" ">
                    <div id="div4">
                        <input type="button"  id="save_chap" value="Save">
                    </div>
                </div>
            </fieldset>
        <?php $i = $i + 1;}else{ ?>
            <fieldset id="field-1" class="fieldClass">
                <legend id="legend-1">Chapter 1</legend>
                <div id="section-1">
                    <div id="div1">
                        <span id="title_spn" class="unselectable">Title</span>
                        <input type="text" name="" id="input_title" value=""> 
                    </div >
                    <div id="div2">
                        <span id="description_spn" class="unselectable">Description</span>
                        <textarea id="input_dimg/iconfinder_6_-_Cross_1815573.pnge sc"></textarea>
                    </div>
                    <div id="div3">
                        <span id="section_spn"  class="unselectable">Add Section 1</span>
                        <input type="text"  id="input_section_default" class="class_section">
                        <img src="img/Delete.png" id="img_dlt" class="unselectable">
                        <img src="img/a (2).png" id="img_add"  class="unselectable">
                    </div>
                    <br class="unselectable" ">
                    <div id="div4">
                        <input type="button"  id="save_chap" value="Save">
                    </div>
                </div>
            </fieldset>
        <?php } ?>
        <br class="unselectable">
        <input type="button" name="nchapter" value="new chapter" id="save" class="">
    </section>
    <!-- poop -->
    <div class="popup-model" id="popup">
        <div class="popup-content">
            <img class="close_png unselectable" src="img/iconfinder_6_-_Cross_1815573.png" >
            <input type="hidden" name="for_id" id="popup-course-id">
            <center>
                <br><br>
                <span class="popup-title display-1"></span>  
                <div class="popup-video">
                    <form method="post" enctype="multipart/form-data">
                        <label>Select Video</label> 
                        <input name="UPLOAD_MAX_FILESIZE" value="20971520"  type="hidden"/>
                        <input type="file" name="file" id="my-file-v">
                        <br>
                        <!-- <progress  id="progress_vid" value="0" max="100"> -->
                    </form>
                </div>
                <!-- <div class="popup-ressource">
                    
                        <label>Select Ressources</label> 
                        <input name="UPLOAD_MAX_FILESIZE" value="20971520"  type="hidden"/>
                        <input type="file" name="file_r" id="my-file_r" />
                    
                </div> -->
                <input type="button" class="btn btn-success" id="popup-btn" value="Upload">
            </center>
        </div>
    </div>
</html>