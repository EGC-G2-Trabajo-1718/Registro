function comprobarFecha(){
		mesInt = parseInt(document.getElementById("monthexpiration").value);
		anoInt = parseInt(document.getElementById("yearexpiration").value);
		fechaActual=new Date();
		mesAct= fechaActual.getMonth()+1;
		anoAct = fechaActual.getFullYear();
		if(anoInt<anoAct){
			alert("Debe poner una fecha posterior a la actual");
		}else if(anoInt==anoAct){
			if(mesInt<mesAct){
				alert("Debe poner una fecha posterior a la actual");
			}
		}
		
	}
	
function activarCodigo(){
	codigo = document.getElementById("code").value;
	precio = 890;
	if (codigo.length == 9){
		document.getElementById('card').style.display='none';
		precio = 0;
	}else{
		document.getElementById('card').style.display='block';
		precio = 890;
	}
	document.getElementById("precio").textContent= "El precio es de "+precio+" €";
}
