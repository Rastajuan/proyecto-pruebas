var reparacion = document.getElementById("cardsReparacion");
var mantenimiento = document.getElementById("cardsMantenimiento");
var restauracion = document.getElementById("cardsRestauracion");

var botReparacion = document.getElementById("botReparacion");
var botMantenimiento = document.getElementById("botMantenimiento");
var botRestauracion = document.getElementById("botRestauracion");

botReparacion.onclick = function () {
	//Cards
	reparacion.classList.remove("ocultarCard");
	reparacion.classList.add("mostrarCard");
	mantenimiento.classList.add("ocultarCard");
	restauracion.classList.add("ocultarCard");
	//Botones
	botReparacion.classList.remove("btn-light");
	botReparacion.classList.add("btn-warning");
	botMantenimiento.classList.remove("btn-warning");
	botMantenimiento.classList.add("btn-light");
	botRestauracion.classList.remove("btn-warning");
	botRestauracion.classList.add("btn-light");
};

botMantenimiento.onclick = function () {
        //Cards
	reparacion.classList.remove("mostrarCard");
	reparacion.classList.add("ocultarCard");
	restauracion.classList.remove("mostrarCard");
	restauracion.classList.add("ocultarCard");
	mantenimiento.classList.remove("ocultarCard");
	mantenimiento.classList.add("mostrarCard");
        //Botones
        botReparacion.classList.remove("btn-warning");
        botReparacion.classList.add("btn-light");
        botMantenimiento.classList.remove("btn-light");
        botMantenimiento.classList.add("btn-warning");
        botRestauracion.classList.remove("btn-warning");
        botRestauracion.classList.add("btn-light");

};

botRestauracion.onclick = function () {
        //Cards
	reparacion.classList.remove("mostrarCard");
	reparacion.classList.add("ocultarCard");
	mantenimiento.classList.remove("mostrarCard");
	mantenimiento.classList.add("ocultarCard");
	restauracion.classList.remove("ocultarCard");
	restauracion.classList.add("mostrarCard");
        //Botones
        botReparacion.classList.remove("btn-warning");
        botReparacion.classList.add("btn-light");
        botMantenimiento.classList.remove("btn-warning");
        botMantenimiento.classList.add("btn-light");
        botRestauracion.classList.remove("btn-light");
        botRestauracion.classList.add("btn-warning");
        
};
