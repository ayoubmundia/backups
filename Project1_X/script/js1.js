function function1(){
	// document.forms["ffff"].submit();
      A1= document.getElementById("text_login").value;
    	A2= document.getElementById("password_login").value;

    	if(A1.length <6 && A2.length<6){
    		document.getElementById("span1").innerHTML ="*Username doit avoir au moins 6 caracters";
    		document.getElementById("span2").innerHTML ="*Password doit avoir au moins 6 caracters";
    		document.getElementById("text_login").classList.add('inp');
    		document.getElementById("password_login").classList.add('inp');
    	}else if(A1.length <6 || A2.length<6){
    		if(A1.length <6){
    			document.getElementById("span1").innerHTML ="*Username doit avoir au moins 6 caracters";
    			document.getElementById("span2").innerHTML ="";
    			document.getElementById("text_login").classList.add('inp');
    			document.getElementById("password_login").classList.remove('inp');
    		}
    		else{
    			document.getElementById("span1").innerHTML ="";
    			document.getElementById("span2").innerHTML ="*Password doit avoir au moins 6 caracters ";
    			document.getElementById("text_login").classList.remove('inp');
    			document.getElementById("password_login").classList.add('inp');
    		}
    	}
    	else{
    		document.forms["ffff"].submit();
    	}
}
function function4(){
	document.getElementById("button_login").click();
}
