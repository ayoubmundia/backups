<?php
  $v_nom = strtolower($_POST['fullname']);
  $v_email = strtolower($_POST['email']);
  $v_password = md5($_POST['password']);
  // $v_password = $_POST['password'];
  $con = mysqli_connect('127.0.0.1:3307','root','AALaal11..@@');
  $url = 'http://localhost/mundia/Try?email='.$v_email.'&password='.$v_password;
  if(!$con){
    echo 'Server NOT CONNECTED';
  }
  if(!mysqli_select_db($con,'base_project')){
    echo 'DB NOT CONNECTED';
  }
  $sql = "INSERT INTO account(fullname,email,password) VALUES('$v_nom','$v_email','$v_password')";
  if(!mysqli_query($con,$sql))
  {
  	echo "$v_email"."$v_nom"."$v_password";
  }
  else
  {
    header("location: $url");
  }
