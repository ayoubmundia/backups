<?php 
	// Session----------------------------------------------------
		session_start();
		session_destroy();
		session_unset();
		if(empty()){

		}
		if($_SERVER['REQUEST_METHODE'] == 'POST'){

		}else{
			echo 'ERROR : YOU CANT BE HERE';
		}
		// if session[something] exist
		if(isset($_SESSION['something'])){

		}
		// br
		echo '</pre>';
	// INCULDE---------------------------------------------------
		include "page.php";
		include_once "page.php"; //if alreade include it don't repeat 
		// if you make include twice you ll find error
		require "page.php"//require if they don't find file -> stop 
	// GET&POST---------------------------------------------------
		//passing data by url : GET
		//passing data without url : POST