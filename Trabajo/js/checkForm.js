function checkAll(){
	var chName = checkName();
	var chSurname = checkSurname();
	var chEmail = checkEmail();
	var chCode = checkCode();
	var res = "";
	if(chName!=""){
		res += chName + "\n";
	}
	if(chSurname!=""){
		res += chSurname + "\n";
	}
	if(chEmail!=""){
		res += chEmail + "\n";
	}
	if(chCode!=""){
		res += chCode + "\n";
	}
	
	if(res!=""){
		window.alert(res);
	}
}

function checkEmptyFields(field){
	if(field==""){
		return true;
	}
}

function checkName(){
	var name = document.getElementById("name");
	var mensaje = "";
	
	if(checkEmptyFields(name.value)){
		mensaje = "El campo 'Nombre' es obligatorio";
	}
	
	return mensaje;
}

function checkSurname(){
	var surname = document.getElementById("surname");
	var mensaje = "";
	
	if(checkEmptyFields(surname.value)){
		mensaje = "El campo 'Apellidos' es obligatorio";
	}
	
	return mensaje;
}


function checkEmail(){
	var email = document.getElementById("email");
	var mensaje = "";
	
	if(checkEmptyFields(email.value)){
		mensaje = "El campo 'Email' es obligatorio";
	}
	
	return mensaje;
}

function checkCode(){
	var code = document.getElementById("codigo");
	var exprCode = /(^$)|(^[aA-zZ]{6}[0-9]{3}$)/;
	var mensaje = "";
	
	if(!exprCode.test(code.value)){
		mensaje = "El código promocional es incorrecto";
	}
	
	return mensaje;
}
