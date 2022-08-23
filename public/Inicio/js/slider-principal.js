const slider = document.querySelector("#slider");
let sliderSection = document.querySelectorAll(".slider_section");
let sliderSectionAnterior = sliderSection[sliderSection.length - 1];

const botonIzquierdo = document.querySelector("#boton_izquierdo");
const botonDerecho = document.querySelector("#boton_derecho");

slider.insertAdjacentElement('afterbegin', sliderSectionAnterior);

function Siguiente() {
    let sliderSectionPrimero = document.querySelectorAll(".slider_section")[0];
    slider.style.marginLeft = "-200%";
    slider.style.transition = "all 0.5s";
    setTimeout(function () {
        slider.style.transition = "none";
        slider.insertAdjacentElement('beforeend', sliderSectionPrimero);
        slider.style.marginLeft = "-100%";
    }, 500);
}

function Anterior() {
    let sliderSection = document.querySelectorAll(".slider_section");
    let sliderSectionUltimo = sliderSection[sliderSection.length - 1];
    slider.style.marginLeft = "0";
    slider.style.transition = "all 0.5s";
    setTimeout(function () {
        slider.style.transition = "none";
        slider.insertAdjacentElement('afterbegin', sliderSectionUltimo);
        slider.style.marginLeft = "-100%";
    }, 500);
}

botonDerecho.addEventListener('click', function () {
    Siguiente();
});

botonIzquierdo.addEventListener('click', function () {
    Anterior();
});

setInterval(function(){
    Siguiente()
}, 5000)