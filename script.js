let total = 0;

// la podria declarar con id 
// lo voy a poder sumas por cada boton
const botones = document.querySelectorAll(".BotonVotar");
const resultado = document.getElementById("Votos");

botones.forEach(function(boton) {

boton.addEventListener("click", function() {

const tarjeta = boton.parentElement;
const resultado = tarjeta.querySelector(".Votos");

let votos = Number(resultado.textContent);

votos += 1;

resultado.textContent = votos;

            });

        });
