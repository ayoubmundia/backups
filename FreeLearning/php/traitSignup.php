<?php
  $v_nom = strtolower($_POST['fullname']);
  $v_email = strtolower($_POST['email_signup']);
  $v_phone = $_POST['phone'];
  $v_password = md5($_POST['password_signup']);
  // $v_password = $_POST['password'];
  $con = mysqli_connect('127.0.0.1:3307','root','AALaal11..@@');
  $url = 'http://localhost/mundia/FreeLearning/';
  if(!$con){
    echo 'Server NOT CONNECTED';
  }
  if(!mysqli_select_db($con,'focus')){
    echo 'DB NOT CONNECTED';
  }
  $sql = "INSERT INTO user(fullname,phone,email,password) VALUES('$v_nom','$v_phone','$v_email','$v_password')";
  if(!mysqli_query($con,$sql))
  {
  	echo "$v_email"."$v_nom"."$v_password"."notinserted";
  }
  else
  {
    header("location: $url");
  }
