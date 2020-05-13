<?php
	session_start();
	session_destroy();
	$url = 'http://localhost/mundia/Focus' ;
	header("location: $url");