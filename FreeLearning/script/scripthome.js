function function1(){
	document.getElementById("tb1").classList.remove("nohide");
	document.getElementById("tb1").classList.add("hide");
	document.getElementById("tb2").classList.remove("hide");
	document.getElementById("tb2").classList.add("nohide");
}
function function2(){
	document.getElementById("tb2").classList.remove("nohide");
	document.getElementById("tb2").classList.add("hide");
	document.getElementById("tb1").classList.remove("hide");
	document.getElementById("tb1").classList.add("nohide");
}
function click1(){
	window.location.href = 'http://localhost/mundia/FreeLearning/';
}