<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    session_start();
    $v_nom = strtolower($_POST['fullname']);
    $v_email = strtolower($_POST['email_signup']);
    $v_password = md5($_POST['password_signup']);
    $con = mysqli_connect('127.0.0.1:3307','root','');
    $url = 'http://localhost/mundia/Focus/';
    if(!$con){
      echo 'Server NOT CONNECTED';
    }
    if(!mysqli_select_db($con,'focus')){
      echo 'DB NOT CONNECTED';
    }
    $rqt = "SELECT email FROM user Where email='$v_email'";
    $ex_rqt = mysqli_query($con, $rqt);
    if($ex_rqt->num_rows !== 0){
      $_SESSION['fromsignup'] = $v_email;
      header("location: http://localhost/mundia/Focus/connexion.php");
    }
    else{
      $res = mysqli_query($con, "SELECT max(id_user) from user");
      if(mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_row($res);
      }
      $id = $row[0] + 1;
      $sql = "INSERT INTO user(id_user,fullname,email,password) VALUES('$id','$v_nom','$v_email','$v_password')";
      if(!mysqli_query($con,$sql))
      {
        echo "$v_email"."$v_nom"."$v_password"."notinserted";
      }
      else
      {
        $_SESSION['email'] = $v_email;
        $_SESSION['password'] = $v_password;
        header("location: $url");
      }
    }
  }
  else
  {
    header("location: http://localhost/mundia/Focus");
  }
 