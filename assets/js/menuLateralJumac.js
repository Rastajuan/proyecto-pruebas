//Colapsar y abrir menú
let toggle = document.querySelector('.toggle');
let navegacion = document.querySelector('.navigationJumac');
let panel = document.querySelector('.panel');

toggle.onclick = function()
{
    navegacion.classList.toggle('active');
    panel.classList.toggle('active');
}

//Añadir clase hovered a los items del menú lateral
let list = document.querySelectorAll('.navigationJumac li');
function activeLink(){
    list.forEach((item) =>
    item.classList.remove('hovered'));
    this.classList.add('hovered');
}
list.forEach((item) =>
item.addEventListener('mouseover', activeLink));