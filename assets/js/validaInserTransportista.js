document.addEventListener("DOMContentLoaded", function (event) {
	document.getElementById("formulario").addEventListener("submit", validacion);
});

//Función que se encarga de validar los datos introducidos por el usuario.
function validacion(e) {
	// e.preventDefault(); Esta linea corta el evento, hace que no lance el submitla f
	var msgError = document.getElementById("msgError");
	msgError.innerText = "";

	//Validacion nombre  y campo vacío
	if (
		this.querySelector("[name=nombre]").value == "" ||
		this.querySelector("[name=nombre]").length == 0 ||
		this.querySelector("[name=nombre]").value.trim() == ""
	) {
		console.log("El campo nombre tiene un formato incorrecto");
		msgError.innerText = "El campo nombre no puede estar vacío ";
		e.preventDefault(); //para parar el submit
		return false; //buena practica porque devuelves true al final
	}

	return true; //la validacion ha sido correcta
}
