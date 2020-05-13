<?php 
	session_start();
	$_SESSION['color'] = 'Red';
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>PAGE1</title>
</head>
<body>
	<form action="recep.php" method="post">
		<input type="text" name="login">
		<input type="text" name="in2">
		<input type="submit" name="" value="Enter">
	</form>
</body>
</html>