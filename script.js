let total = 0;

// la podria declarar con id 
// lo voy a poder sumas por cada boton
const boton = document.getElementById("Boton");
const resultado = document.getElementById("Votos");

 boton.addEventListener("click", function() {
     total += 1; 
     //con textcontent 
     resultado.textContent = total;  
    });
   

    