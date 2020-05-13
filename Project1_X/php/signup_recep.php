<?php
  $v_nom = $_POST['name_nom'];
  $v_prenom = $_POST['name_prenom'];
  $v_email = $_POST['name_email'];
  $v_login = $_POST['name_login'];
  $v_password = md5($_POST['name_password']);
  $con = mysqli_connect('127.0.0.1:3307','root','AALaal11..@@');
  $url = 'http://localhost/mundia/Project1_X/';
  if(!$con){
    echo 'Server NOT CONNECTED';
  }
  if(!mysqli_select_db($con,'login')){
    echo 'DB NOT CONNECTED';
  }
  $sql = "INSERT INTO user(nom,prenom,email,login,password)
  -- VALUES('$var1','$var2','$var3','$var4',MD5('$var5'))
  VALUES('$v_nom','$v_prenom','$v_email','$v_login','$v_password')";
  if(!mysqli_query($con,$sql)){
    echo 'not inserted';
  }else
  {
    header("location: $url");
  }
