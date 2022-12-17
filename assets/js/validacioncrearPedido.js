

document.addEventListener("DOMContentLoaded", function (event) {
	document.getElementById("formulario").addEventListener("submit", validacion);
});

//Función que se encarga de validar los datos introducidos por el usuario.
function validacion(e) {
	var msgError = document.getElementById("msgError");
	msgError.innerText = "";

	//CAMPO SELECT

	//RECOGIDA INSTRUMENTO
	//Validación dirección de recogida

	//Validación numero dirección de recogida

	//Validación piso dirección de recogida

	//Validación código postal

	//Validación ciudad

	//Validación pais

	//ENVIO INSTRUMENTO
	//Validación dirección de recogida

	//Validación numero dirección de recogida

	//Validación piso dirección de recogida

	//Validación código postal

	//Validación ciudad

	//Validación pais

	//Validacin del email
	if (!validarEmail(this.querySelector("[name=usuario]").value)) {
		console.log("El email no es válido");
		msgError.innerText = "Debes escribir un email válido ";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	} //No es necesaria la validación de que el campo no esté vacío porque  un campo vacio no tiene el formato correcto de email

	//Validación de la contraseña
	if (this.querySelector("[name=nuevaContrasena]").value == "") {
		console.log("El campo nuevaContrasena está vacío");
		msgError.innerText = "Debes rellenar el campo Nueva contrasena";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	} else if (
		!validarContrasena(this.querySelector("[name=nuevaContrasena]").value)
	) {
		console.log("Formato incorrecto de contraseña");
		msgError.innerText =
			"Formato de contraseña incorrecto.\n Debe tener entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula. Puede tener otros símbolos.";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	}

	//Validación de la confirmación de la contraseña
	if (
		this.querySelector("[name=nuevaContrasena]").value !=
		this.querySelector("[name=repiteContrasena]").value
	) {
		console.log("Las contraseñas no coinciden");
		msgError.innerText = "Las contraseñas no coinciden";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	}

	return true; //la validacion ha sido correcta
}

// Función que se encarga de validar el email introducido por el usuario mediante una expresión regular.
function validarEmail(valor) {
	if (
		/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/i.test(
			valor
		)
	) {
		// alert("La dirección de email " + valor + " es correcta!.");
		return true;
	} else {
		// alert("La dirección de email es incorrecta!.");
		return false;
	}
}

// Funcion que valida la contraseña introducida por el usuario. En este caso, La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.Puede tener otros símbolos.
function validarContrasena(valor) {
	if (/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/i.test(valor)) {
		// alert("La contraseña es correcta!.");
		return true;
	} else {
		// alert("La contraseña  no tiene el formato correcto!.");
		return false;
	}
}
