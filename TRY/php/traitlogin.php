<?php
  $var1 = strtolower($_POST['email']);
  $var2 = md5($_POST['password']);
  $pivot = false ;
  $con = mysqli_connect('127.0.0.1:3307','root','AALaal11..@@');
  $url1 = 'http://localhost/mundia/try';
  $url2 = 'http://localhost/mundia/try/cnx.php';
  if(!$con){
    echo 'Server NOT CONNECTED';
  }
  if(!mysqli_select_db($con,'base_project')){
    echo 'DB NOT CONNECTED';
  }
  $sql = "SELECT email,password FROM account Where email='$var1' and password='$var2'";
  $res = mysqli_query($con, $sql);
  if(!mysqli_num_rows($res)){
  	header("location: $url2?email=$var1");
  }
  else{
  	 header("location: $url1?email=$var1");
  }
  mysqli_close($con);
