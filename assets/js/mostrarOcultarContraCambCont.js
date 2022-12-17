var botonMostrar = document.getElementById("mostraOcultar"); 
var botonMostrar2 = document.getElementById("mostraOcultar2");
var botonMostrar3 = document.getElementById("mostraOcultar3");
var password = document.getElementById("contrasena");
var newPassword = document.getElementById("nuevaContrasena");
var repPassword = document.getElementById("repiteContrasena")
var icono = document.getElementsByClassName('bi'); // obtenemos el icono del botón. getElementsByClassName devuelve un array de elementos con la clase indicada

var bool = true; // boleano

//Funcion que muestra y oculta la contraseña mediante la clase "bi" de bootstrap
botonMostrar.onclick = () => {
	
	if (bool) {
		
		password.setAttribute("type", "text"); // cambiar atributo del input para mostrar contraseña
		icono[1].classList.remove("bi-eye-fill");
		icono[1].classList.add("bi-eye-slash-fill"); 

		bool = false;
	}
	else
	{
		password.setAttribute("type", "password"); // ocultamos la contraseña
		icono[1].classList.remove("bi-eye-slash-fill"); 
		icono[1].classList.add("bi-eye-fill"); 
		bool = true; 
	}
};

botonMostrar2.onclick = () => {

	if (bool) {
		
		newPassword.setAttribute("type", "text"); // cambiar atributo del input para mostrar contraseña
		icono[2].classList.remove("bi-eye-fill"); 
		icono[2].classList.add("bi-eye-slash-fill"); 
		bool = false;
	}
	else
	{
		newPassword.setAttribute("type", "password"); 
		icono[2].classList.remove("bi-eye-slash-fill"); 
		icono[2].classList.add("bi-eye-fill"); 
		bool = true; 
	}
};

botonMostrar3.onclick = () => {
		
	if (bool) {
		
		repPassword.setAttribute("type", "text"); // cambiar atributo del input para mostrar contraseña
		icono[3].classList.remove("bi-eye-fill"); 
		icono[3].classList.add("bi-eye-slash-fill"); 
		bool = false;
	}
	else
	{
		repPassword.setAttribute("type", "password"); 
		icono[3].classList.remove("bi-eye-slash-fill"); 
		icono[3].classList.add("bi-eye-fill"); 
		bool = true; 
	}
}
