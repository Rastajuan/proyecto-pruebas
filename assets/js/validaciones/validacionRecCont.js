//TODO FUNCIONANDO!!!!

document.addEventListener("DOMContentLoaded", function (event) {
	document.getElementById("formulario").addEventListener("submit", validacion);
});

//Función que se encarga de validar los datos introducidos por el usuario.
function validacion(e) {
	
	var msgError = document.getElementById("msgError");
	msgError.innerText = "";

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
	} else if (!validarContrasena(this.querySelector("[name=nuevaContrasena]").value)) {
		console.log("Formato incorrecto de contraseña");
		msgError.innerText =
			"Formato de contraseña incorrecto";
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
