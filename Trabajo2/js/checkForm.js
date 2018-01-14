function checkAll(){
	var chName = checkName();
	var chSurname = checkSurname();
	var chEmail = checkEmail();
	var res = "";
	var resBool = true;
	if(chName!=""){
		res += chName + "\n";
	}
	if(chSurname!=""){
		res += chSurname + "\n";
	}
	if(chEmail!=""){
		res += chEmail + "\n";
	}
	
	if(res!=""){
		resBool = false;
		window.alert(res);
	}
	return resBool;
}

function checkEmptyFields(field){
	if(field.trim()==""){
		return false;
	}
	return true;
}

function checkName(){
	var name = document.getElementById("name");
	var mensaje = "";
	if(!checkEmptyFields(name.value)){
		mensaje = "El campo 'Nombre' es obligatorio";
	}
	
	return mensaje;
}

function checkSurname(){
	var surname = document.getElementById("surname");
	var mensaje = "";
	
	if(!checkEmptyFields(surname.value)){
		mensaje = "El campo 'Apellidos' es obligatorio";
	}
	
	return mensaje;
}


function checkEmail(){
	var email = document.getElementById("email");
	var mensaje = "";
	
	if(!checkEmptyFields(email.value)){
		mensaje = "El campo 'Email' es obligatorio";
	}
	
	return mensaje;
}