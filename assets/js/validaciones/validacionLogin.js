
//El evento «DOMContentLoaded» asociado al objeto document sirve para detectar cuando el navegador ya ha procesado todos los elementos de la página, momento en el cual ya somos capaces de acceder al formulario con seguridad. Además, se asocia a este evento una función anónima que se encarga de capturar el evento submit del formulario y asociarle una función que se encargará de validar los datos introducidos por el usuario.
document.addEventListener("DOMContentLoaded", function (event) {
	document
		.getElementById("formulario")
		.addEventListener("submit", validacion);
});

//Función que se encarga de validar los datos introducidos por el usuario.
function validacion(e) {
	// e.preventDefault(); Esta linea corta el evento, hace que no lance el submitla f
	var msgError = document.getElementById("msgError");
	msgError.innerText = "";

	if (this.querySelector("[name=correo]").value == "") {
		console.log("Debes rellenar el campo email");
		msgError.innerText = "Debes rellenar el campo email";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	}

	if (!validarEmail(this.querySelector("[name=correo]").value))
	{
		console.log("El email no es válido");
		msgError.innerText = "Debes escribir un email válido ";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	}
	if (this.querySelector("[name=password]").value == "")
	{
		console.log("El campo password está vacío");
		msgError.innerText = "Debes rellenar el campo contraseña";
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
