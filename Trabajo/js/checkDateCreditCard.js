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