let iconoHamburguesa = document.querySelector(".navbar .icono_hamburguesa");
let contenedorMenuLink = document.querySelector(".contenedor_menu_link");
let iconoCerrar = document.querySelector(".contenedor_menu_link .icono_cerrar");

iconoHamburguesa.onclick = function () {
  contenedorMenuLink.style.left = "0";
}

iconoCerrar.onclick = function () {
  contenedorMenuLink.style.left = "-100%";
}
