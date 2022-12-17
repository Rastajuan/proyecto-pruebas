document.addEventListener("DOMContentLoaded", function (event) {
	document.getElementById("formulario").addEventListener("submit", validacion);
});

//Función que se encarga de validar los datos introducidos por el usuario.
function validacion(e) {
	// e.preventDefault(); Esta linea corta el evento, hace que no lance el submitla f
	var msgError = document.getElementById("msgError");
	msgError.innerText = "";

	//Validacion nombre (solo caracteres alfabéticos) y campo vacío
	if (
		this.querySelector("[name=nombre]").value == "" ||
		this.querySelector("[name=nombre]").length == 0 ||
		this.querySelector("[name=nombre]").value.trim() == ""
	) {
		console.log("El campo nombre está vacío");
		msgError.innerText = "Debes rellenar el campo nombre";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	}
	/* if (this.querySelector("[name=nombre]").length < 2) {
		console.log("El nombre ha de tener al menos dos caracteres");
		msgError.innerText = "El nombre ha de tener al menos dos caracteres";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	} */
	if (!validarNombre(this.querySelector("[name=nombre]").value)) {
		console.log("El campo nombre tiene un formato incorrecto");
		msgError.innerText =
			"El formato del campo nombre es incorrecto (solo caracteres alfabéticos)";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	}

	//Validacion apellido (solo caracteres alfabéticos) y campo vacío
	if (
		this.querySelector("[name=apellidos]").value == "" ||
		this.querySelector("[name=apellidos]").length == 0 ||
		this.querySelector("[name=apellidos]").value.trim() == ""
	) {
		console.log("El campo apellidos está vacío");
		msgError.innerText = "Debes rellenar el campo apellidos";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	}
	/* if (this.querySelector("[name=nombre]").length < 2) {
		console.log("El nombre ha de tener al menos dos caracteres");
		msgError.innerText = "El nombre ha de tener al menos dos caracteres";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	} */
	if (!validarNombre(this.querySelector("[name=nombre]").value)) {
		console.log("El campo nombre tiene un formato incorrecto");
		msgError.innerText =
			"El formato del campo nombre es incorrecto (solo caracteres alfabéticos)";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	}
	//Validacin del email
	if (this.querySelector("[name=correo]").value == "") {
		console.log("El campo password está vacío");
		msgError.innerText = "Debes rellenar el campo email";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	}
	if (!validarEmail(this.querySelector("[name=correo]").value)) {
		console.log("El email no es válido");
		msgError.innerText = "Debes escribir un email válido ";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	} //No es necesaria la validación de que el campo no esté vacío porque  un campo vacio no tiene el formato correcto de email

	//Validacion apellidos (solo caracteres alfabéticos) y campo vacío
	if (
		this.querySelector("[name=nombre]").value == "" ||
		this.querySelector("[name=nombre]").length == 0 ||
		this.querySelector("[name=nombre]").value.trim() == ""
	) {
		console.log("El campo apellidos está vacío");
		msgError.innerText = "Debes rellenar el campo apellidos";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	}
	if (this.querySelector("[name=apellidos]").length < 2) {
		console.log("El apellido ha de tener al menos dos caracteres");
		msgError.innerText = "El apellido ha de tener al menos dos caracteres";
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

	//Validacion telefono (solo caracteres numéricos, longitud >9 y campo vacío)
	if (this.querySelector("[name=telefono]").value == "") {
		console.log("El campo telefono está vacío");
		msgError.innerText = "Debes rellenar el campo telefono";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	}
	if (!validarTelefono(this.querySelector("[name=telefono]").value)) {
		console.log("El campo telefono está vacío");
		msgError.innerText = "El campo telefono no admite caracteres no numéricos";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	}

	if (this.querySelector("[name=telefono]").value.length < 9) {
		console.log("El campo telefono tiene menos de 9 caracteres");
		msgError.innerText = "El campo telefono tiene menos de 9 caracteres";
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

// Funcion que valida el nombre introducido por el usuario. En este caso, el nombre debe tener solo caracteres alfabéticos.
function validarNombre(valor) {
	if (
		/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/i.test(
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
