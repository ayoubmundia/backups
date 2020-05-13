<html>
	<head>
		<title>SignUp</title>
		<link
			rel ="stylesheet"
			type = "text/css"
			href = "css/index_css.css"
		>
		<link rel="shortcut icon" href="img/web-512.png" />
		<script src="script/js.js"></script>
	</head>
	<body>
    <form action="php/signup_recep.php" method="post" name="form_name">
  		<center>
  			<fieldset id="fieldset_signup">
  				<legend id="legend_signup"><b>Formulaire d'inscription</b></legend>
  				<div id="sdiv1">
  					<span>Nom</span>
  					<input type="text"  name="name_nom" placeholder="Nom" class="s_input" id="nom_signup" onKeyPress="if (event.keyCode == 13) function3()" ></input>
  				</div>
  				<div id="sdiv2" class="normaldiv">
  					<span>Prenom</span>
  					<input type="text" name ="name_prenom" placeholder="Prenom" class="s_input" id="prenom_signup"  onKeyPress="if (event.keyCode == 13) function3()" ></input>
  				</div>
  				<div id="sdiv3" class="normaldiv">
  					<span>Email</span>
  					<input type="email" name="name_email" placeholder="Email" class="s_input" id="email_signup" onKeyPress="if (event.keyCode == 13) function3()" ></input>
  				</div>
  				<div id="hsdiv1">
  					<span id="hspan1" class="normalspan" ></span>
  				</div>
  				<div id="sdiv4"class="normaldiv">
  					<span>Login</span>
  					<input type="text" name="name_login" placeholder="Login" class="s_input" id="login_signup" onKeyPress="if (event.keyCode == 13) function3()" ></input>
  				</div>
  				<div id="hsdiv2">
  					<span id="hspan2"class="normalspan">*Login must be more than 6 characters</span>
  				</div>
  				<div id="sdiv5"class="normaldiv">
  					<span>Mot de passe</span>
  					<input type="password"  name = "name_password" placeholder="Mot de passe" class="s_input" id="password_signup" onKeyPress="if (event.keyCode == 13) function3()" ></input>
  				</div>
  				<div id="sdiv6"class="normaldiv">
  					<span>Confirmation mot de passe</span>
  					<input type="password" placeholder="Confirmer votre Mot de passe"  id="rpassword_signup" class="s_input" onKeyPress="if (event.keyCode == 13) function3()" ></input>
  				</div>
  				<div id="hsdiv3">
  					<span id="hspan3" class="normalspan">*Your Password and Conf Don't match</span>
  					<span id="hspan4" class="normalspan">*Password must be more than 6 characters</span>
  				</div>
  				<div id="sdiv7">
  					<input type="button" value="Sign UpP" id="button_signup" onclick="function2()" ></input>
  				</div>
  			</fieldset>
  		</center>
    </form>
	</body>
</html>
