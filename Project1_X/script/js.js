function function2(){
	// document.forms["form_name"].submit();
	A1= document.getElementById("nom_signup").value;
	A2= document.getElementById("prenom_signup").value;
	A3= document.getElementById("email_signup").value;
	A4= document.getElementById("login_signup").value;
	A5= document.getElementById("password_signup").value;
	A6= document.getElementById("rpassword_signup").value;
  pivot = true;
	//Mot de Passe
	if(A5.length == 0 && A6.length == 0){
		document.getElementById("password_signup").classList.add("inp");
		document.getElementById("rpassword_signup").classList.add("inp");
		document.getElementById("hspan3").classList.remove("anormalspan");
		document.getElementById("hspan4").classList.remove("anormalspan");
    pivot = false;
	}
	else if(A5.length == 0 || A6.length == 0){
    pivot = false;
		if(A5.length == 0){
			document.getElementById("password_signup").classList.add("inp");
			document.getElementById("rpassword_signup").classList.remove("inp");
			document.getElementById("rpassword_signup").value="";
		}
		else{
			document.getElementById("password_signup").classList.remove("inp");
			document.getElementById("rpassword_signup").classList.add("inp");
		}
	}
	else{
		if(A5 != A6){
			document.getElementById("password_signup").classList.remove("inp");
			document.getElementById("rpassword_signup").classList.add("inp");
			document.getElementById("rpassword_signup").value="";
			document.getElementById("hspan4").classList.remove("anormalspan");
			document.getElementById("hspan3").classList.add("anormalspan");
      pivot = false;
		}
		else if(A5.length <= 6){
			document.getElementById("hspan3").classList.remove("anormalspan");
			document.getElementById("hspan4").classList.add("anormalspan");
			document.getElementById("password_signup").classList.add("inp");
			document.getElementById("rpassword_signup").classList.add("inp");
      pivot = false;
		}
		else{
			document.getElementById("password_signup").classList.remove("inp");
			document.getElementById("rpassword_signup").classList.remove("inp");
			document.getElementById("hspan4").classList.remove("anormalspan");
			document.getElementById("hspan3").classList.remove("anormalspan");
		}

	}
	//login
	 if(A4.length==0){
		document.getElementById("login_signup").classList.add('inp');
    pivot = false;
	}
	else{
		if(A4.length<=6){
			document.getElementById("login_signup").classList.add('inp');
			document.getElementById("sdiv5").classList.add('anormaldiv');
			document.getElementById("hspan2").classList.add('anormalspan');
			pivot = false;
		}else{
			document.getElementById("login_signup").classList.remove('inp');
			document.getElementById("sdiv5").classList.remove('anormaldiv');
			document.getElementById("hspan2").classList.remove('anormalspan');
		}
	}
	//NOM ET PRENOM
	if(A1.length ==0){
		document.getElementById("nom_signup").classList.add("inp");
    pivot = false;
	}else{
		document.getElementById("nom_signup").classList.remove("inp");
	}
	if(A2.length ==0){
		document.getElementById("prenom_signup").classList.add("inp");
    pivot = false;
	}else{
		document.getElementById("prenom_signup").classList.remove("inp");
	}
	//Email
	// var r2 = document.getElementById("email_signup").value;
	// var r1 = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	// if(r1.test(r2) == false){
	// 	document.getElementById("e:mail_signup").classList.add("inp");
  //   pivot = false;
	// 	// document.getElementById("email_signup").focus();
	// }
	// else{
	// 	document.getElementById("email_signup").classList.remove("inp");
	// }
  if(pivot){
    document.forms["form_name"].submit();
  }

}
function function3(){
	document.getElementById("button_signup").click();
}
function funny(){
	var r2 = document.getElementById("email_signup").value;
	var r1 = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(r1.test(r2) == false){
		alert("Hadchi mahuwach");
		document.getElementById("email_signup").focus();
		return false;
	}
}
