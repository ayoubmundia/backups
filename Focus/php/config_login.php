<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$email = strtolower($_POST['email_login']);
		$password = md5($_POST['password_login']);
		$con = mysqli_connect('127.0.0.1:3307','root','');
		$url = 'http://localhost/mundia/Focus' ;
		if(!$con){
		    echo 'Server NOT CONNECTED';
		}
		if(!mysqli_select_db($con,'focus')){
		    echo 'DB NOT CONNECTED';
		}
		$sql = "SELECT email,password FROM user Where email='$email' and password='$password'";
		$res = mysqli_query($con, $sql);
		if(!mysqli_num_rows($res)){
			$_SESSION['fromlogin'] = $_POST['email_login'] ;
		  	header("location: $url/connexion.php");
		}
		else{
			$_SESSION['email'] = $email;
			$_SESSION['password'] = $password;
		  	header("location: $url");
		}
		mysqli_close($con);
	}
	else
	{
		header("location: http://localhost/mundia/Focus");
	}

