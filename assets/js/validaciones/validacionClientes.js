//TODO FUNCIONANDO!!!!

document.addEventListener("DOMContentLoaded", function (event) {
	document.getElementById("formulario").addEventListener("submit", validacion);
});

//Función que se encarga de validar los datos introducidos por el usuario.
function validacion(e)
{
	// e.preventDefault(); Esta linea corta el evento, hace que no lance el submitla f
	var msgError = document.getElementById("msgError");
	msgError.innerText = "errores: ";

	//Validacion nombre (solo caracteres alfabéticos) y campo vacío
	if (this.querySelector("[name=nombre]").value == "") {
		console.log("El campo nombre está vacío");
		msgError.innerText = "Debes rellenar el campo nombre";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	}
	if (!validarNombre(this.querySelector("[name=nombre]").value)) {
		console.log("El campo nombre tiene un formato incorrecto");
		msgError.innerText =
			"El formato del campo nombre es incorrecto (solo caracteres alfabéticos)";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	}
	

	//Validacion apellidos (solo caracteres alfabéticos) y campo vacío
	if (this.querySelector("[name=apellidos]").value == "") {
		console.log("El campo apellidos está vacío");
		msgError.innerText = "Debes rellenar el campo apellidos";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	}
	if (!validarNombre(this.querySelector("[name=apellidos]").value)) {
		console.log("El campo apellidos tiene un formato incorrecto");
		msgError.innerText =
			"El formato del campo apellidos es incorrecto (solo caracteres alfabéticos)";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	}
	

	//Validacin del email
	if (!validarEmail(this.querySelector("[name=correo]").value)) {
		console.log("El email no es válido");
		msgError.innerText = "Debes escribir un email válido ";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	} //No es necesaria la validación de que el campo no esté vacío porque  un campo vacio no tiene el formato correcto de email

	//Validacion telefono (solo caracteres numéricos)
	if (!validarTelefono(this.querySelector("[name=telefono]").value)) {
		console.log("El campo telefono está vacío");
		msgError.innerText = "El campo telefono no admite caracteres no numéricos";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	} else if (this.querySelector("[name=telefono]").value == "") {
		console.log("El campo telefono está vacío");
		msgError.innerText = "Debes rellenar el campo telefono";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	} else if (this.querySelector("[name=telefono]").value.length < 9) {
		console.log("El campo telefono tiene menos de 9 caracteres");
		msgError.innerText = "El campo telefono tiene menos de 9 caracteres";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	}


	//Validación de la contraseña
	if (this.querySelector("[name=password]").value == "") {
		console.log("El campo password está vacío");
		msgError.innerText = "Debes rellenar el campo password";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	} else if (!validarContrasena(this.querySelector("[name=password]").value)) {
		console.log("Formato incorrecto de contraseña");
		msgError.innerText =
			"Formato de contraseña incorrecto.\n Debe tener entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula. Puede tener otros símbolos.";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	}



	return true; //la validacion ha sido correcta
}
// Función que se encarga de validar el email introducido por el usuario mediante una expresión regular.
function validarEmail(valor) {
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/i.test(valor)) {
		// alert("La dirección de email " + valor + " es correcta!.");
		return true;
	} else {
		// alert("La dirección de email es incorrecta!.");
		return false;
	}
}

// Funcion que valida la contraseña introducida por el usuario. En este caso, La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.Puede tener otros símbolos.
function validarContrasena(valor) {
	var minMaxLongitud = /^[\s\S]{8,32}$/,
		mayusculas = /[A-Z]/,
		minusculas = /[a-z]/,
		number = /[0-9]/;

	if (
		minMaxLongitud.test(valor) &&
		mayusculas.test(valor) &&
		minusculas.test(valor) &&
		number.test(valor)
	) {
		return true;
	}

	return false;
}


// Funcion que valida el nombre introducido por el usuario. En este caso, el nombre debe tener solo caracteres alfabéticos.
function validarNombre(valor) {
	if (
		/^([A-Za-zÑñÁáÉéÍíÓóÚú]+['\-]{0,1}[A-Za-zÑñÁáÉéÍíÓóÚú]+)(\s+([A-Za-zÑñÁáÉéÍíÓóÚú]+['\-]{0,1}[A-Za-zÑñÁáÉéÍíÓóÚú]+))*$/i.test(
			valor
		)
	) {
		// alert("El nombre es correcto!.");
		return true;
	} else {
		// alert("El nombre no tiene el formato correcto!.");
		return false;
	}
}

// Funcion que valida el telefono introducido por el usuario. En este caso, el telefono debe tener solo caracteres numéricos.
function validarTelefono(valor) {
	if (/^[0-9]*$/i.test(valor)) {
		// alert("El telefono es correcto!.");
		return true;
	} else {
		// alert("El telefono no tiene el formato correcto!.");
		return false;
	}
}
