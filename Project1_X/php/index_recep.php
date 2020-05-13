<?php
  $var1 = $_POST['text_in'];
  $var2 = md5($_POST['pass_in']);
  $pivot = false ;
  $con = mysqli_connect('127.0.0.1:3307','root','AALaal11..@@');
  if(!$con){
    echo 'Server NOT CONNECTED';
  }
  if(!mysqli_select_db($con,'login')){
    echo 'DB NOT CONNECTED';
  }
  // $sql = "SELECT login,password FROM user ";
  $sql = "SELECT login,password FROM user Where login=$var1 and password=$var2";
  $res = mysqli_query($con, $sql);
  // $res = mysqli_query("Select login,password from user where login='$var1' and password='$var2'");
  if(mysqli_num_rows($res) ==1){
    echo "ues";
  }


  // if(mysqli_num_rows($res) > 0){
  //   while($row = mysqli_fetch_assoc($res)){
  //     // echo $row["login"] . "//" . $row["password"] ;
  //     if($row["login"] == $var1 && $row["password"] == $var2){
  //       echo "Successfully Connected" ;
  //       $pivot = true ;
  //     }
  //     // echo 'Login: ' . $row["login"]. ' Password: ' . $row["password"] ."<br/>" ;
  //   }
  // } else{
  //   echo "ZERO";
  // }
  // if($pivot == false){
  //   echo "Nothing Found" ;
  // }
  mysqli_close($con);
?>
