<?php
  session_start();
  $var1 = strtolower($_POST['email_login']);
  $var2 = md5($_POST['password_login']);
  $pivot = false ;
  $con = mysqli_connect('127.0.0.1:3307','root','AALaal11..@@');
  $url1 = 'http://localhost/mundia/FreeLearning';
  $url2 = 'http://localhost/mundia/FreeLearning/cnx.php';
  $_SESSION['email'] = $var1;
  $_SESSION['password']
  if(!$con){
    echo 'Server NOT CONNECTED';
  }
  if(!mysqli_select_db($con,'focus')){
    echo 'DB NOT CONNECTED';
  }
  $sql = "SELECT email,password FROM user Where email='$var1' and password='$var2'";
  $res = mysqli_query($con, $sql);
  if(!mysqli_num_rows($res)){
  	header("location: $url2?email=$var1");
  }
  else{
  	header("location: $url1");
  }
  mysqli_close($con);
