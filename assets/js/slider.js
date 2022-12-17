var indiceSlide = 1;
mostrarSlide(indiceSlide);

function siguienteSlide(n) {
	mostrarSlide((indiceSlide += n));
}

function slideActual(n) {
	mostrarSlide((indiceSlide = n));
}

function mostrarSlide(n) {
	var i;
	var slides = document.getElementsByClassName("slides"); //holt Elemente von HTML
	var circulos = document.getElementsByClassName("circulo");

	
	if (n > slides.length) {
		indiceSlide = 1;
	}

	
	if (n < 1) {
		indiceSlide = slides.length;
	}

	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";
	}

	for (i = 0; i < circulos.length; i++) {
		circulos[i].className = circulos[i].className.replace(" activo", "");
	}

	slides[indiceSlide - 1].style.display = "block";
	circulos[indiceSlide - 1].className += " activo";
}
