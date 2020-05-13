<html>
	<head>
		<title>Login</title>
		<link
			rel ="stylesheet"
			type = "text/css"
			href = "css/index_css.css"
		>
		<link rel="shortcut icon" href="img/web-512.png" />
		<script src="script/js1.js"></script>
	</head>
	<body>
		<form action="php/index_recep.php" method="post" name="ffff">
			<center>
				<fieldset id="fieldset_login">
					<legend id="legend_login">Formulaire de connexion</legend>
					<div id="div1">
						<span>Login</span>
						<input type="text" placeholder="Username"name="text_in" id="text_login" onKeyPress="if (event.keyCode == 13) function4()" ></input>
					</div>
					<div id="hidediv1">
						<span class="hidespan" id="span1"></span>
						<!-- Username doit avoir au moins 6 caracters< -->
					</div>
					<div id="div2">
						<span>Mot de pass</span>
						<input type="password" placeholder="Password" name="pass_in" id="password_login" onKeyPress="if (event.keyCode == 13) function4()" ></input>
					</div>
					<div id="hidediv2">
						<span class="hidespan" id="span2"></span>
						<!-- Password doit avoir au moins 6 caracters -->
					</div>
					<div id="div3">
						<input type="button" value="Se Connecter" id="button_login" onclick="function1()"></input>
					</div>
					<div id="div4">
						<a id="a1" href="http://localhost/mundia/Project1_X/signup.php">S'inscrire</a>
						<a id="a2" href="http://localhost/mundia/Project1_X/forgetpassword.php">Mot de passe oublié</a>
					</div>
				</fieldset>
			</center>
		</form>
	</body>
</html>
