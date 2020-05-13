 <?php
 $isTouch = isset($_GET['email']);
 	if ($isTouch) {
 		$var = $_GET['email'];
 	}
 ?>

 <html>
    <head>
	    <meta charset="utf-8">
	  	<title>Connexion</title>
	  	<link rel="stylesheet" href="css/style_c.css">
	    <link rel="shortcut icon" href="img/icon.png"/>
	   	<script src="script/scripthome.js"></script>
    </head>
    <body>	
	  	<form action="php/traitlogin.php" method="post" name="toLogin">
		  	<div >
				<table id="tb1" class="nohide">
					<tr>
						<td>
							<div>
								<img src="img/let.png" class="logocss" onclick="click1()">
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="Align">
								<img src="img/person.png">
							</div>
							<div class="Align">
								<input 
									type="text" 
									name="email_login" 
									placeholder="Email"
									value="<?=(isset($var))?$var:""?>">				
								</input>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="Align">
								<img src="img/icons_password-512.png">
							</div>
							<div class="Align">
								<input type="password" name="password_login" placeholder="Password"></input>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div>
								<input type="submit" name="Login" value="LOG IN" style='font-weight:bold;'></input>
							</div>
						</td>
					</tr>
					<tr>
						<div >
							<td>
								<span id="s1">
									Not a member?
								</span>
								<input type="button" id="s2"  onclick="function1()" value="Sign Up"></input>
							</td>
						</div>
					</tr>
				</table>
			</div>
		</form>
		<form action="php/traitsignup.php" method="post" name="toSignup">
			<div >
				<table id="tb2" class = "hide">
					<tr>
						<td>
							<div>
								<img src="img/let.png" class="logocss" onclick="click1()">
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="Align">
								<img src="img/person.png">
							</div>
							<div class="Align">
								<input 
									type="text" 
									name="fullname" 
									placeholder="Fullname">
								</input>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="Align">
								<img src="img/iconfinder_phone_326545.png">
							</div>
							<div class="Align">
								<input type="text" name="phone" placeholder="Phone"></input>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="Align">
								<img src="img/email.png">
							</div>
							<div class="Align">
								<input type="text" name="email_signup" placeholder="Email"></input>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="Align">
								<img src="img/icons_password-512.png">
							</div>
							<div class="Align">
								<input type="password" name="password_signup" placeholder="Password"></input>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="Align">
								<img src="img/icons_password-512.png">
							</div>
							<div class="Align">
								<input type="password" name="cpassword" placeholder="Confirm password"></input>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div>
								<input
									type="submit" 
									name="Signup" 
									value="SIGN UP" 
									style='font-weight:bold;'>
								 </input>
							</div>
						</td>
					</tr>
					<tr>
						<div >
							<td>
								<span id="s1">
									Already member?
								</span>
								<input 
									type="button" 
									name="Log" 
									id="s2"  
									onclick="function2()" 
									value="Log In">
								</input>
							</td>
						</div>
					</tr>
				</table>
			</div>
		</form>
	</body>

 </html>